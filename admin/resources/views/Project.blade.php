
@extends('Layout.app')

@section('content')


    <div id="mainDiv" class="container ">
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
                    <tbody id="projectTable">

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

@endsection



@section('script')

    <script type="text/javascript">
        getProjectAllData()



        function getProjectAllData() {

            axios.get('/getProjectData')
                .then(function(response) {
                    if (response.status=200){
                        $('#mainDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');
                        $('#serviceTable').empty();

                        var projectData = response.data;
                        $.each(projectData, function(i, item) {
                            $('<tr>').html(
                                "<td> <img class='table-img' src=" + projectData[i].project_img + ">  </td>" +
                                "<th> " + projectData[i].project_name + "</th> " +
                                "<th> " + projectData[i].project_des + " </th> " +
                                "<td> <a class='servicesEditBtn' data-id="+ projectData[i].id+"  ><i class='fas fa-edit'></i></a> </td>>" +
                                "<td> <a  class='servicesDeleteBtn' data-toggle='modal' data-id="+ projectData[i].id+"  ><i class='fas fa-trash-alt'></i></a> </td>>"
                            ).appendTo('#projectTable');
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



    </script>



@endsection
