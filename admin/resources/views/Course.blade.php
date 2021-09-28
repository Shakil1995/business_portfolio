@extends('Layout.app')

@section('content')


    <div id="mainDiv" class="container d-none ">
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
                    <tbody id="course_Table">

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




    <!-- Course Delete Modal -->
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
                    <h5 id="courserDeleteID"> </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                        No
                    </button>
                    {{--                    <button data-id=" " id="serviceDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>--}}
                    <button  id="courseDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>

                </div>
            </div>
        </div>
    </div>









@endsection







@section('script')

    <script type="text/javascript">

        getCourseData();

        function getCourseData() {
axios.get('/getCourseData')
            .then(function (response) {
                if(response.status=200){
                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');

                    let courseData=response.data;
                    $.each(courseData,function (i,item) {
                        $('<tr>').html(
                            "<td> <img class='table-img' src=" + courseData[i].	courses_img + ">  </td>" +
                            "<th> " + courseData[i].courses_name + "</th> " +
                            "<th> " + courseData[i].courses_des + " </th> " +
                            "<td> <a  ><i class='fas fa-edit'></i></a> </td>>" +
                            "<td> <a class='courseDeleteBtn' data-toggle='modal' data-id="+ courseData[i].id+"  ><i class='fas fa-trash-alt'></i></a> </td>>"
                ).appendTo('#course_Table');
                    });
//service table delete Icon Click
                    $('.courseDeleteBtn').click(function () {
                        let id= $(this).data('id');
                        // $('#serviceDeleteConfirmID').attr('data-id',id);
                        $('#courserDeleteID').html(id);
                        $('#deleteModal').modal('show');
                    })


                    //Course Delete modal yes btn
                    $('#courseDeleteConfirmID').click(function () {
                        // let id=$(this).data('id');
                        let id=$('#courserDeleteID').html();
                        CourseDelete(id)
                    })


                }
                else {
                    $('#loaderDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');

                }

            })
            .catch(function (error) {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            });

        }



        //Course Delete
        function CourseDelete(deleteID) {
            axios.post('/CourserDelete',{id:deleteID})
                .then(function (response) {
                    if(response.data==1){
                        alert('success');
                        // $('#deleteModal').modal('hide');
                        // toastr.success('Delete Success');
                        //
                        // getCourseData()
                    }else {
                        alert('fail');
                        // $('#deleteModal').modal('hide');
                        // toastr.error('Delete Fail');
                        // getCourseData()
                    }
                })
                .catch(function (error) {

                });

        }

    </script>



@endsection
