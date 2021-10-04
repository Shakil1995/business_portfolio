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
                    <h5 class="modal-title">Update all  Course</h5> <br>
                    <h5 id="courserEditID"> Edit ID:   </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
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
                                <input id="CourseAddNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                <input id="CourseAddDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                <input id="CourseAddFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                <input id="CourseAddEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="CourseAddClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">
                                <input id="CourseAddLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
                                <input id="CourseAddImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
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
                        "<td> <a class='courseUpdateBtn' ><i class='fas fa-edit'></i></a> </td>>" +
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
                    let id= $(this).data('id');
                    $('#courserEditID').html(id);
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


//Course Add Confirm yes Btn

$('#addNewCourseBtnID').click(function () {
    $('#addCourseModal').modal('show');

});


//Course Add

$('#CourseAddConfirmBtn').click(function () {

   var CourseName=  $('#CourseAddNameId').val();
    var CourseDes=    $('#CourseAddDesId').val();
    var CourseFee=   $('#CourseAddFeeId').val();
    var CourseEnroll=   $('#CourseAddEnrollId').val();
    var CourseClass=   $('#CourseAddClassId').val();
    var CourseLink=   $('#CourseAddLinkId').val();
    var CourseImg=   $('#CourseAddImgId').val();

    AddCourse(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg);


})


//Each Services Add Details
function AddCourse(CourseAddName,CourseAddDes,CourseAddFee,CourseAddEnroll,CourseAddClass,CourseAddLink,CourseAddImg){
    if(CourseAddName.length==0) {
        toastr.error('Course Name is Empty !');
    }else if (CourseAddDes.length==0){
        toastr.error('Course Description is Empty !');
    }else if (CourseAddFee.length==0){
        toastr.error('Course Fee is Empty !');
    }else if (CourseAddEnroll.length==0){
        toastr.error('Course Enroll is Empty !');
    }else if (CourseAddClass.length==0){
        toastr.error('Course Class is Empty !');
    }else if (CourseAddLink.length==0){
        toastr.error('Course Link is Empty !');
    }else if (CourseAddImg.length==0){
        toastr.error('Course Img is Empty !');
    }
    else {
     
        $('#CourseAddConfirmBtn').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
     
        axios.post('/CourseAdd',{
            courses_name:CourseAddName,
            courses_des:courseAddDes,
            courses_fee :courseAddFee,
            courses_totalenroll:courseAddEnroll,
            courses_totalclass:courseAddClass,
            courses_link :courseAddLink,
            courses_img:courseAddImg,
        })
            .then(function (response) {
                $('#CourseAddConfirmBtn').html("Save");
                if (response.status==200){
                    if(response.data==1){
                        $('#addCourseModal').modal('hide');
                        toastr.success('Courses Add Success');
                        getCourseData();
                    }else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('Service Add Fail');
                        getCourseData();
                    }
                }
                else {
                    $('#addCourseModal').modal('hide');
                    toastr.error('Something Went Wrong  !');
                }
            })
            .catch(function (error) {
                $('#addCourseModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            });
    }

}






// //Course update Confirm yes Btn

// $('#CourseUpdateConfirmBtn').click(function () {
// var id=$('#courserDeleteID').html();
// CourseUpdateDetails(id);
// })


//Each Course Update Details

// function CourseUpdateDetails(detailsID) {
//     axios.get('/CourserDetails',{
//         id:detailsID
//     })
//         .then(function (response) {
//              if(response.status==200){
//                 $('#courseEditForm').removeClass('d-none');
//                 $('#CourseEditLoader').addClass('d-none');
//                 var jsonData=response.data;

//                 $('#CourseUpdateNameId').val(jsonData[0].courses_name);
//                 $('#CourseUpdateDesId').val(jsonData[0].courses_des);
//                 $('#CourseUpdateFeeId').val(jsonData[0].courses_fee);
//                 $('#CourseUpdateEnrollId').val(jsonData[0].courses_totalenroll	);
//                 $('#CourseUpdateClassId').val(jsonData[0].courses_totalclass);
//                 $('#CourseUpdateLinkId').val(jsonData[0].courses_link);
//                 $('#CourseUpdateImgId').val(jsonData[0].courses_img);
//             }
//             else {
//                 $('#CourseEditLoader').addClass('d-none');
//                 $('#CourseEditWrong').removeClass('d-none');
//             }
//         })
//         .catch(function (error) {
//             $('#CourseEditLoader').addClass('d-none');
//             $('#CourseEditWrong').removeClass('d-none');

//         });
// }


//Each Services Update Details
function CourseUpdateDetails(detailsID) {
    axios.post('/ServicesDetail',{
        id:detailsID
    })
        .then(function (response) {
                   if(response.status==200){
                       $('#courseEditForm').removeClass('d-none');
                       $('#CourseEditLoader').addClass('d-none');
                       var jsonData=response.data;
                       $('#courseUpdateNameId').val(jsonData[0].service_name);
                       $('#courseUpdateDesId').val(jsonData[0].service_des);
                       $('#courseUpdateFeeId').val(jsonData[0].service_img);
                       $('#courseUpdateEnrollId').val(jsonData[0].service_name);
                       $('#courseUpdateClassId').val(jsonData[0].service_des);
                       $('#courseUpdateLinkId').val(jsonData[0].service_img);
                       $('#courseUpdateImgId').val(jsonData[0].service_img);
                   }
                   else {
                       $('#CourseEditLoader').addClass('d-none');
                       $('#CourseEditWrong').removeClass('d-none');
                   }
        })
        .catch(function (error) {
            $('#CourseEditLoader').addClass('d-none');
             $('#CourseEditWrong').removeClass('d-none');

        });
}










    </script>



@endsection
