@extends('Layout.app')

@section('content')


    <div id="mainDivCourses" class="container d-none ">
        <div class="row">
            <div class="col-md-12 p-5">

                <button  id="addNewCourseBtnID" class="  btn btn-sm my-3 btn-danger" >Add New </button>
                <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Free</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Enroll</th>
                        <th class="th-sm">Details</th>
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


    <div id="loaderDivCourses" class="container">
        <div class="row">
            <div class="col-md-12 text-center p-5">

                <img class="loading-icon m-5" src="{{asset('images/loder.svg')}}">
            </div>
        </div>
    </div>


    <div id="wrongDivCourses"  class="container d-none">
        <div class="row">
            <div class="col-md-12 text-center p-5">

                <h1>Something went wrong</h1>
            </div>
        </div>
    </div>




    <!-- Course Delete Modal -->
    <div
        class="modal fade"
        id="deleteCourseModal"
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
                    <button  id="courseDeleteConfirmBtnID" type="button" class="btn btn-sm btn-danger">yes</button>

                </div>
            </div>
        </div>
    </div>






    {{--    update course modal--}}


    <div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <h5 class="modal-title">Update all  Course</h5> 
                    <h5 id="courserupdateID">   </h5>
                    <div id="courseEditForm" class="container d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="courseUpdateNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                <input id="courseUpdateDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                <input id="courseUpdateFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                <input id="courseUpdateEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="courseUpdateClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">
                                <input id="courseUpdateLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
                                <input id="courseUpdateImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
                            </div>
                        </div>
                    </div>

                    <img id="CourseEditLoader" class="loading-icon m-5" src="{{asset('images/loder.svg')}}">
                    <h1 id="CourseEditWrong" class="d-none" >Something went wrong</h1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
                </div>
            </div>
        </div>
    </div>









    {{--    Add course modal--}}


    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New  Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="courseAddNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                <input id="courseAddDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                <input id="courseAddFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                <input id="courseAddEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="courseAddClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">
                                <input id="courseAddLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
                                <input id="courseAddImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="courseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
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
                $('#mainDivCourses').removeClass('d-none');
                $('#loaderDivCourses').addClass('d-none');
                $('#course_Table').empty();
                let courseData=response.data;
                $.each(courseData,function (i,item) {
                    $('<tr>').html(
                        "<td> <img class='table-img' src=" + courseData[i].	courses_img + ">  </td>" +
                        "<th> " + courseData[i].courses_name + "</th> " +
                        "<th> " + courseData[i].courses_fee + " </th> " +
                        "<th> " + courseData[i].courses_totalclass + " </th> " +
                        "<th> " + courseData[i].courses_totalenroll	 + " </th> " +
                        "<td> <a  ><i class='fas fa-eye'></i></a> </td>>" +
                        "<td> <a class='courseUpdateBtn' data-toggle='modal' data-id="+ courseData[i].id+" ><i class='fas fa-edit'></i></a> </td>>" +
                        "<td> <a class='courseDeleteBtn' data-toggle='modal' data-id="+ courseData[i].id+"  ><i class='fas fa-trash-alt'></i></a> </td>>"
                    ).appendTo('#course_Table');
                });

//Course table delete Icon Click
                $('.courseDeleteBtn').click(function () {
                    let id= $(this).data('id');
                   
                    // $('#serviceDeleteConfirmID').attr('data-id',id);
                    $('#courserDeleteID').html(id);
                    $('#deleteCourseModal').modal('show');
                })
//Course table update Icon Click
                $('.courseUpdateBtn').click(function () {
                    let id = $(this).data('id');         
                  $('#courserupdateID').html(id);      
                    CourseUpdateDetails(id);       
                   $('#updateCourseModal').modal('show');
                })

            }
            else {
                $('#loaderDivCourses').addClass('d-none');
                $('#wrongDivCourses').removeClass('d-none');

            }

        })
        .catch(function (error) {
            $('#loaderDivCourses').addClass('d-none');
            $('#wrongDivCourses').removeClass('d-none');
        });

}


//Course Delete Confirm yes Btn

$('#courseDeleteConfirmBtnID').click(function () {
var id=$('#courserDeleteID').html();
    courseDelete(id);
})


//Course Delete
function courseDelete(deleteID) {
    $('#courseDeleteConfirmBtnID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
    axios.post('/CourseDelete',{
        id:deleteID
    })
        .then(function (response) {
            $('#courseDeleteConfirmBtnID').html("yes");
            if (response.status==200){
                if(response.data==1){
                    $('#deleteCourseModal').modal('hide');
                    toastr.success('Delete Success');

                    getCourseData()
                }else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Fail');
                    getCourseData()
                }

            }else {
                $('#deleteCourseModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            }
        })
        .catch(function (error) {
            $('#deleteCourseModal').modal('hide');
            toastr.error('Something Went Wrong  !');
        });
}


//Course Add Modal open

$('#addNewCourseBtnID').click(function () {
    $('#addCourseModal').modal('show');

});



//Coursse modal yes btn
$('#courseAddConfirmBtn').click(function() {
    let courseNameAdd = $('#courseAddNameId').val();
    let courseDesAdd = $('#courseAddDesId').val();
    let courseAddFee = $('#courseAddFeeId').val();
    let courseAddEnroll = $('#courseAddEnrollId').val();
    let courseAddClass = $('#courseAddClassId').val();
    let courseAddLink = $('#courseAddLinkId').val();
    let courseAddImg = $('#courseAddImgId').val();
    AddCourse(courseNameAdd, courseDesAdd, courseAddFee, courseAddEnroll,courseAddClass,courseAddLink,courseAddImg);
})



//Each Project Add Details
function AddCourse(courseName, courseDes,courseFee,courseEnroll,courseClass courseLink, courseImg) {
    if (courseName.length == 0) {
        toastr.error('Course Name is Empty !');
    } else if (courseDes.length == 0) {
        toastr.error('Course Description is Empty !');
    } else if (courseFee.length == 0) {
        toastr.error('Course Fee is Empty !');
    } else if (courseEnroll.length == 0) {
        toastr.error('Course Enroll is Empty !');
    }
    else if (courseClass.length == 0) {
        toastr.error('Course Class is Empty !');
    } 
    else if (courseLink.length == 0) {
        toastr.error('Course Link is Empty !');
    } 
    else if (courseImg.length == 0) {
        toastr.error('Course Img is Empty !');
    }  else {
        $('#courseAddConfirmBtn').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
        axios.post('/CourseAdd', {
            courses_name: courseName,
            courses_des: courseDes,
            courses_fee: courseFee,
            courses_totalenroll	: courseEnroll,
            courses_totalclass	: courseClass,
            courses_link: courseLink,
            courses_img: courseImg,
            })
            .then(function(response) {
                $('#courseAddConfirmBtn').html("Save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#addCourseModal').modal('hide');
                        toastr.success('Project Add Success');

                        getCourseData();
                    } else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('Project Add Fail');
                        getCourseData();
                    }
                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.error('Something Went Wrong  !');
                }
            })
            .catch(function(error) {
                $('#addCourseModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            });
    }

}








//Each Course Update Details
function CourseUpdateDetails(detailsID) {
    axios.post('/CourserDetails', {
            id: detailsID
        })
        .then(function(response) {
            if (response.status == 200) {
                $('#courseEditForm').removeClass('d-none');
                $('#CourseEditLoader').addClass('d-none');
                var jsonData = response.data; 
                $('#courseUpdateNameId').val(jsonData[0].courses_name);
                $('#courseUpdateDesId').val(jsonData[0].courses_des);
                $('#courseUpdateFeeId').val(jsonData[0].courses_fee);
                $('#courseUpdateEnrollId').val(jsonData[0].courses_totalenroll);
                $('#courseUpdateClassId').val(jsonData[0].courses_totalclass);
                $('#courseUpdateLinkId').val(jsonData[0].courses_link);
                $('#courseUpdateImgId').val(jsonData[0].courses_img);
               
            } else {
                $('#CourseEditLoader').addClass('d-none');
                $('#CourseEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#CourseEditLoader').addClass('d-none');
            $('#CourseEditWrong').removeClass('d-none');

        });
}







    </script>



@endsection
