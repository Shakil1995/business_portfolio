
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
                    CourseDelete(id);
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



//Course Delete
function CourseDelete(deleteID) {
    axios.post('/CourserDelete',{id:deleteID})
        .then(function (response) {

            if(response.data==1){
                // alert('success');
                $('#deleteModal').modal('hide');
                toastr.success('Delete Success');

                getCourseData()
            }else {
                // alert('fail');
                $('#deleteModal').modal('hide');
                toastr.error('Delete Fail');
                getCourseData()
            }
        })
        .catch(function (error) {

        });

}
