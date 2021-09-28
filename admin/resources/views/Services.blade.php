@extends('Layout.app')

@section('content')

    <div id="mainDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                     <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                     </tr>
                    </thead>
                    <tbody id="serviceTable">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="loaderDiv" class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5">

                <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}">
            </div>
        </div>
    </div>


    <div id="wrongDiv"  class="container d-none">
        <div class="row">
            <div class="col-md-12 text-center p-5">

                <h1>Something went wrong</h1>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div
        class="modal fade"
        id="deleteModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center p-3 ">
                    <h3 class="mt-5">Do you want to Delete?</h3>
                    <h5 id="serviceDeleteID"> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                        No
                    </button>
{{--                    <button data-id=" " id="serviceDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>--}}
                    <button  id="serviceDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>

                </div>
            </div>
        </div>
    </div>



    <!-- Edit  Modal -->
    <div
        class="modal fade"
        id="editModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center p-3 ">
                    <h3 class="mt-5">Update Your Services Data </h3>

                    <h5 id="serviceEditID"> </h5>

                    <input type="text" id="" class="form-control mb-4" placeholder="service Name" >
                    <input type="text" id="" class="form-control mb-4" placeholder="service Description" >
                    <input type="text" id="" class="form-control mb-4" placeholder="service Img link" >


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                     Cancel
                    </button>

                    <button  id="serviceEditConfirmID" type="button" class="btn btn-sm btn-danger">Save</button>

                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')

    <script type="text/javascript">

getServicesAllData();



//for services Table

function getServicesAllData() {

    axios.get('/getServicesData')
        .then(function(response) {
            if (response.status=200){
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#serviceTable').empty();

                var jsonServicesData = response.data;
                $.each(jsonServicesData, function(i, item) {
                    $('<tr>').html(
                        "<td> <img class='table-img' src=" + jsonServicesData[i].service_img + ">  </td>" +
                        "<th> " + jsonServicesData[i].service_name + "</th> " +
                        "<th> " + jsonServicesData[i].service_des + " </th> " +
                        "<td> <a class='servicesEditBtn' data-id="+ jsonServicesData[i].id+"  ><i class='fas fa-edit'></i></a> </td>>" +
                        "<td> <a  class='servicesDeleteBtn' data-toggle='modal' data-id="+ jsonServicesData[i].id+"  ><i class='fas fa-trash-alt'></i></a> </td>>"
                    ).appendTo('#serviceTable');
                });
//service table delete Icon Click
                $('.servicesDeleteBtn').click(function () {
                    let id= $(this).data('id');
                    // $('#serviceDeleteConfirmID').attr('data-id',id);
                    $('#serviceDeleteID').html(id);
                    $('#deleteModal').modal('show');
                })
//service Delete modal yes btn
                $('#serviceDeleteConfirmID').click(function () {
                    // let id=$(this).data('id');
                    let id=$('#serviceDeleteID').html();
                    ServiceDelete(id)
                })

                //service table Edit Icon Click
                $('.servicesEditBtn').click(function () {
                    let id= $(this).data('id');
                    $('#serviceEditID').html(id);
                    $('#editModal').modal('show');
                })





            }else
            {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }
        })
        .catch(function (error) {
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });
}


//Service Delete
function ServiceDelete(deleteID) {
    axios.post('/ServicesDelete',{id:deleteID})
        .then(function (response) {
            if(response.data==1){
                $('#deleteModal').modal('hide');
                toastr.success('Delete Success');

                getServicesAllData()
            }else {
                $('#deleteModal').modal('hide');
                toastr.error('Delete Fail');
                getServicesAllData()
            }
        })
        .catch(function (error) {

        });

}



    </script>



@endsection
