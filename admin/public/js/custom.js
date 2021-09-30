
function getCourseData() {
    axios.get('/getCourseData')
        .then(function (response) {
            if(response.status=200){
                $('#mainDivCourses').removeClass('d-none');
                $('#loaderDivCourses').addClass('d-none');

                let courseData=response.data;
                $.each(courseData,function (i,item) {
                    $('<tr>').html(
                        "<td> <img class='table-img' src=" + courseData[i].	courses_img + ">  </td>" +
                        "<th> " + courseData[i].courses_name + "</th> " +
                        "<th> " + courseData[i].course_fee + " </th> " +
                        "<th> " + courseData[i].course_totalclass + " </th> " +
                        "<th> " + courseData[i].course_totalenroll	 + " </th> " +
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
                    // $('#serviceDeleteConfirmID').attr('data-id',id);
                    // $('#courserDeleteID').html(id);
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

   var CourseName=  $('#CourseNameId').val();
    var CourseDes=    $('#CourseDesId').val();
    var CourseFee=   $('#CourseFeeId').val();
    var CourseEnroll=   $('#CourseEnrollId').val();
    var CourseClass=   $('#CourseClassId').val();
    var CourseLink=   $('#CourseLinkId').val();
    var CourseImg=   $('#CourseImgId').val();

    CourseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg)


})

//Each Services Add Details
function CourseAdd(CourseName,CourseDes,CourseFee,CourseEnroll,CourseClass,CourseLink,CourseImg) {
    if(CourseName.length==0) {
        toastr.error('Course Name is Empty !');
    }else if (CourseDes.length==0){
        toastr.error('Course Description is Empty !');
    }else if (CourseFee.length==0){
        toastr.error('Course Fee is Empty !');
    }else if (CourseEnroll.length==0){
        toastr.error('Course Enroll is Empty !');
    }else if (CourseClass.length==0){
        toastr.error('Course Class is Empty !');
    }else if (CourseLink.length==0){
        toastr.error('Course Link is Empty !');
    }else if (CourseImg.length==0){
        toastr.error('Course Img is Empty !');
    }

    else {
        $('#CourseAddConfirmBtn').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
        axios.post('/CourseAdd',{
            courses_name:courseName,
            courses_des:courseDes,
            course_fee:courseFee,
            course_totalenroll:courseEnroll,
            course_totalclass:courseClass,
            course_link:courseLink,
            courses_img:courseImg,
        })
            .then(function (response) {
                $('#CourseAddConfirmBtn').html("Save");
                if (response.status==200){
                    if(response.data==1){
                        $('#addCourseModal').modal('hide');
                        toastr.success('Courses Add Success');
                        getCourseData()
                    }else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('Service Add Fail');
                        getCourseData()
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
