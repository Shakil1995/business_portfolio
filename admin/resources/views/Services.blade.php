@extends('Layout.app')

@section('content')

    <div id="mainDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5">
                <button  id="addNewBtnID" class="  btn btn-sm my-3 btn-danger" >Add New </button>

                <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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

                    <div id="serviceEditForm" class="w-100 d-none">
                        <input id="serviceNameId" type="text" id="" class="form-control mb-4" placeholder="service Name" >
                    <input id="serviceDesId" type="text" id="" class="form-control mb-4" placeholder="service Description" >
                    <input id="serviceImgId" type="text" id="" class="form-control mb-4" placeholder="service Img link" >
                    </div>

                    <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('images/loder.svg')}}">


                    <h1 id="serviceEditWrong" class="d-none" >Something went wrong</h1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                     Cancel
                    </button>

                    <button  id="serviceEditConfirmID" type="button" class="btn btn-sm btn-danger">Update</button>

                </div>
            </div>
        </div>
    </div>



    <!-- Add   Modal -->
    <div
        class="modal fade"
        id="addModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center p-3 ">
                    <h3 class="mt-5 mb-4">Add  New Services Data </h3>


                    <div id="serviceAddForm" class="w-100 ">
                        <input id="serviceNameAddId" type="text" id="" class="form-control mb-4" placeholder="service Name" >
                        <input id="serviceDesAddId" type="text" id="" class="form-control mb-4" placeholder="service Description" >
                        <input id="serviceImgAddId" type="text" id="" class="form-control mb-4" placeholder="service Img link" >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> Cancel </button>

                    <button  id="serviceAddConfirmID" type="button" class="btn btn-sm btn-danger">Add</button>

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

//service table Edit Icon Click
                $('.servicesEditBtn').click(function () {
                    let id= $(this).data('id');
                    $('#serviceEditID').html(id);
                    ServiceUpdateDetails(id);
                    $('#editModal').modal('show');
                })

            $('#serviceDataTable').dataTable();
            $('.dataTables_length').addClass('bs-select');

            }

            else
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

//service Delete modal yes btn
        $('#serviceDeleteConfirmID').click(function () {
            // let id=$(this).data('id');
            let id=$('#serviceDeleteID').html();
            ServiceDelete(id)
        })
//Service Delete
function ServiceDelete(deleteID) {
    $('#serviceDeleteConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
    axios.post('/ServicesDelete',{id:deleteID})
        .then(function (response) {
            $('#serviceDeleteConfirmID').html("yes");
            if (response.status==200){
                if(response.data==1){
                    $('#deleteModal').modal('hide');
                    toastr.success('Delete Success');

                    getServicesAllData()
                }else {
                    $('#deleteModal').modal('hide');
                    toastr.error('Delete Fail');
                    getServicesAllData()
                }

            }else {
                $('#deleteModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            }
        })
        .catch(function (error) {
            $('#deleteModal').modal('hide');
            toastr.error('Something Went Wrong  !');
        });
}

//Each Services Update Details
function ServiceUpdateDetails(detailsID) {
    axios.post('/CourserDetails',{
        id:detailsID
    })
        .then(function (response) {
                   if(response.status==200){
                       $('#serviceEditForm').removeClass('d-none');
                       $('#serviceEditLoader').addClass('d-none');
                       var jsonData=response.data;
                       $('#serviceNameId').val(jsonData[0].service_name);
                       $('#serviceDesId').val(jsonData[0].service_des);
                       $('#serviceImgId').val(jsonData[0].service_img);
                   }
                   else {
                       $('#serviceEditLoader').addClass('d-none');
                       $('#serviceEditWrong').removeClass('d-none');
                   }
        })
        .catch(function (error) {
            $('#serviceEditLoader').addClass('d-none');
            $('#serviceEditWrong').removeClass('d-none');

        });
}

//service update  modal yes btn
$('#serviceEditConfirmID').click(function () {
    let id=$('#serviceEditID').html();
    let name=$('#serviceNameId').val();
    let des=$('#serviceDesId').val();
    let img=$('#serviceImgId').val();
    ServiceUpdate(id,name,des,img);
})

//Each Services Update Details
function ServiceUpdate(serviceID,serviceName,serviceDes,serviceImg) {
    if(serviceName.length==0) {
       toastr.error('Service Name is Empty !');
    }else if (serviceDes.length==0){
       toastr.error('Service Description is Empty !');
    }else if (serviceImg.length==0){
       toastr.error('Service Images is Empty !');
    }else {
       $('#serviceEditConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
        axios.post('/ServicesUpdate',{
            id:serviceID,
            name:serviceName,
            des:serviceDes,
            img:serviceImg
        })
            .then(function (response) {
                $('#serviceDeleteConfirmID').html("yes");
                if (response.status==200){
                    if(response.data==1){
                        $('#editModal').modal('hide');
                        toastr.success('Update Success');

                        getServicesAllData()
                    }else {
                        $('#editModal').modal('hide');
                        toastr.error('Update Fail');
                        getServicesAllData()
                    }
                }
                else {
                    $('#editModal').modal('hide');
                    toastr.error('Something Went Wrong  !');
                }
            })
            .catch(function (error) {
                $('#editModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            });
    }
}


//Service Add new btn Click

      $('#addNewBtnID').click(function () {

            $('#addModal').modal('show');
       })


//Service Add Method


//service update  modal yes btn
$('#serviceAddConfirmID').click(function () {
    let name=$('#serviceNameAddId').val();
    let des=$('#serviceDesAddId').val();
    let img=$('#serviceImgAddId').val();
    ServiceAdd(name,des,img);
})


//Each Services Add Details
function ServiceAdd(serviceName,serviceDes,serviceImg) {
    if(serviceName.length==0) {
        toastr.error('Service Name is Empty !');
    }else if (serviceDes.length==0){
        toastr.error('Service Description is Empty !');
    }else if (serviceImg.length==0){
        toastr.error('Service Images is Empty !');
    }else {
        $('#serviceAddConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
        axios.post('/ServicesAdd',{
            name:serviceName,
            des:serviceDes,
            img:serviceImg
        })
            .then(function (response) {
                $('#serviceAddConfirmID').html("Save");
                if (response.status==200){
                    if(response.data==1){
                        $('#addModal').modal('hide');
                        toastr.success('Service Add Success');

                        getServicesAllData()
                    }else {
                        $('#addModal').modal('hide');
                        toastr.error('Service Add Fail');
                        getServicesAllData()
                    }
                }
                else {
                    $('#addModal').modal('hide');
                    toastr.error('Something Went Wrong  !');
                }
            })
            .catch(function (error) {
                $('#addModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            });
    }

}

    </script>



@endsection
