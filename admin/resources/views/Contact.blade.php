
@extends('Layout.app')

@section('content')



<div id="mainDiv" class="container d-none ">
    <div class="row">
        <div class="col-md-12 p-5">

            <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                 <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Phone</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">Massage</th>
                    <th class="th-sm">View</th>
                    <th class="th-sm">Delete</th>
                 </tr>
                </thead>
                <tbody id="contactTable">

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
        id="contactDeleteModal"
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
                    <h5 id="contactDeleteID"> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                        No
                    </button>
{{--                    <button data-id=" " id="serviceDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>--}}
                    <button  id="contactDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>

                </div>
            </div>
        </div>
    </div>










@endsection





@section('script')

    <script type="text/javascript">

getContactAllData();




function getContactAllData() {

    axios.get('/getContactData')
        .then(function(response) {
            if (response.status=200){
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#contactTable').empty();

                var jsonContactData = response.data;
                $.each(jsonContactData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonContactData[i].contact_name + "  </td>" +
                        "<th> " + jsonContactData[i].contact_phone + "</th> " +
                        "<th> " + jsonContactData[i].contact_email + " </th> " +
                        "<th> " + jsonContactData[i].contact_meg + " </th> " +
                        "<td> <a  ><i class='fa fa-eye '></i></a> </td>>" +
                        "<td> <a   class='contactDeleteBtn' data-toggle='modal' data-id="+ jsonContactData[i].id+"  ><i class='fa fa-trash text-center'></i></a> </td>>"
                    ).appendTo('#contactTable');
                });
// service table delete Icon Click
                $('.contactDeleteBtn').click(function () {
                    let id= $(this).data('id');
                    $('#contactDeleteID').html(id);
                    $('#contactDeleteModal').modal('show');
                })

//service table Edit Icon Click
                // $('.servicesEditBtn').click(function () {
                //     let id= $(this).data('id');
                //     $('#serviceEditID').html(id);
                //     ServiceUpdateDetails(id);
                //     $('#editModal').modal('show');
                // })

            $('#serviceDataTable').dataTable({"order":false});
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
$('#contactDeleteConfirmID').click(function () {
            // let id=$(this).data('id');
            let id=$('#contactDeleteID').html();
            ContactDelete(id)
            alert(ContactDelete)
        })
//Service Delete
function ContactDelete(deleteID) {
    $('#contactDeleteConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
    axios.post('/ContactDelate',{id:deleteID})
        .then(function (response) {
            $('#contactDeleteConfirmID').html("yes");
            if (response.status==200){
                if(response.data==1){
                    $('#contactDeleteModal').modal('hide');
                    toastr.success('Delete Success');

                    getContactAllData();

                }else {
                    $('#contactDeleteModal').modal('hide');
                    toastr.error('Delete Fail');
                    getContactAllData();

                }

            }else {
                $('#contactDeleteModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            }
        })
        .catch(function (error) {
            $('#contactDeleteModal').modal('hide');
            toastr.error('Something Went Wrong  !');
        });
}




</script>



@endsection
