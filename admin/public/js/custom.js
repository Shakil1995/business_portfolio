function getProjectAllData() {

    axios.get('/getProjectData')
        .then(function(response) {
            if (response.status = 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#projectTable').empty();

                var projectData = response.data;
                $.each(projectData, function(i, item) {
                    $('<tr>').html(
                        "<td> <img class='table-img' src=" + projectData[i].project_img + ">  </td>" +
                        "<th> " + projectData[i].project_name + "</th> " +
                        "<th> " + projectData[i].project_des + " </th> " +
                        "<th> " + projectData[i].project_Link + " </th> " +
                        "<td> <a class='projectUpdateBtn' data-id=" + projectData[i].id + "  ><i class='fas fa-edit'></i></a> </td>>" +
                        "<td> <a  class='projectDeleteBtn' data-toggle='modal' data-id=" + projectData[i].id + "  ><i class='fas fa-trash-alt'></i></a> </td>>"
                    ).appendTo('#projectTable');
                });
                //Project table delete Icon Click
                $('.projectDeleteBtn').click(function() {
                    let id = $(this).data('id');
                    // $('#ProjectDeleteConfirmID').attr('data-id',id);
                    $('#projectDeleteID').html(id);
                    $('#projectModal').modal('show');
                })


                //Project table Update Icon Click
                $('.projectUpdateBtn').click(function() {
                    let id = $(this).data('id');
                    ProjectUpdateDetails(id)
                    $('#projectUpdateID').html(id);
                    $('#projectUpdateModal').modal('show');
                })


                //Project table Add Icon Click
                $('#addNewProjectBtnID').click(function() {
                    let id = $(this).data('id');
                    $('#projectDeleteID').html(id);
                    $('#projectAddModal').modal('show');
                })
                $('#projectDataTable').dataTable();
                $('.dataTables_length').addClass('bs-select');

            } else {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');
        });
}



//service Delete modal yes btn
$('#projectDeleteConfirmID').click(function() {
        // let id=$(this).data('id');
        let id = $('#projectDeleteID').html();
        projectDelete(id)
    })
    // Service Delete
function projectDelete(deleteID) {
    $('#projectDeleteConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
    axios.post('/ProjectDelete', { id: deleteID })
        .then(function(response) {
            $('#projectDeleteConfirmID').html("yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#projectModal').modal('hide');
                    toastr.success('Delete Success');

                    getProjectAllData()
                } else {
                    $('#projectModal').modal('hide');
                    toastr.error('Delete Fail');
                    getProjectAllData()
                }
            } else {
                $('#projectModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            }
        })
        .catch(function(error) {
            $('#projectModal').modal('hide');
            toastr.error('Something Went Wrong  !');
        });
}





//Project modal yes btn
$('#projectAddConfirmID').click(function() {
    let projectNameAdd = $('#projectNameAddId').val();
    let projectDesAdd = $('#projectDesAddId').val();
    let projectLinkAdd = $('#projectLinkAddId').val();
    let projectImgAdd = $('#projectImgAddId').val();
    projectAdd(projectNameAdd, projectDesAdd, projectLinkAdd, projectImgAdd);
})



//Each Project Add Details
function projectAdd(projectName, projectDes, projectLink, projectImg) {
    if (projectName.length == 0) {
        toastr.error('project Name is Empty !');
    } else if (projectDes.length == 0) {
        toastr.error('project Description is Empty !');
    } else if (projectLink.length == 0) {
        toastr.error('project Link is Empty !');
    } else if (projectImg.length == 0) {
        toastr.error('Project Images is Empty !');
    } else {
        $('#projectAddConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
        axios.post('/ProjectAdd', {
                project_name: projectName,
                project_des: projectDes,
                project_Link: projectLink,
                project_img: projectImg,
            })
            .then(function(response) {
                $('#projectAddConfirmID').html("Save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#projectAddModal').modal('hide');
                        toastr.success('Project Add Success');

                        getProjectAllData()
                    } else {
                        $('#projectAddModal').modal('hide');
                        toastr.error('Project Add Fail');
                        getProjectAllData()
                    }
                } else {
                    $('#projectAddModal').modal('hide');
                    toastr.error('Something Went Wrong  !');
                }
            })
            .catch(function(error) {
                $('#projectAddModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            });
    }

}


//Each Project Update Details
function ProjectUpdateDetails(detailsID) {
    axios.post('/ProjectDetail', {
            id: detailsID
        })
        .then(function(response) {
            if (response.status == 200) {
                $('#projectUpdateForm').removeClass('d-none');
                $('#projectUpdateLoader').addClass('d-none');
                var jsonData = response.data;
                $('#projectUpdateNameId').val(jsonData[0].project_name);
                $('#projectUpdateDesId').val(jsonData[0].project_des);
                $('#projectUpdateLinkId').val(jsonData[0].project_Link);
                $('#projectUpdateImgId').val(jsonData[0].project_img);

            } else {
                $('#projectUpdateLoader').addClass('d-none');
                $('#projectUpdateWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#projectUpdateLoader').addClass('d-none');
            $('#projectUpdateWrong').removeClass('d-none');

        });
}



//Project update  modal yes btn
$('#projectUpdateConfirmID').click(function() {
    let id = $('#projectUpdateID').html();
    let ProjectUpdateName = $('#projectUpdateDesId').val();
    let ProjectUpdateDes = $('#projectUpdateDesId').val();
    let ProjectUpdateLink = $('#projectUpdateLinkId').val();
    let ProjectUpdateImg = $('#projectUpdateImgId').val();
    ProjectUpdate(id, ProjectUpdateName, ProjectUpdateDes, ProjectUpdateLink, ProjectUpdateImg);
})



//Each Project Update Details
function ProjectUpdate(projectUpdateID, projectUpdateName, projectUpdateDes, projectUpdateLink, projectUpdateImg) {
    if (projectUpdateName.length == 0) {
        toastr.error('project Name is Empty !');
    } else if (projectUpdateDes.length == 0) {
        toastr.error('Project Description is Empty !');
    } else if (projectUpdateLink.length == 0) {
        toastr.error('Project Link is Empty !');
    } else if (projectUpdateImg.length == 0) {
        toastr.error('Project Images is Empty !');
    } else {
        $('#projectUpdateConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
        axios.post('/ProjectUpdate', {
                id: projectUpdateID,
                project_name: projectUpdateName,
                project_des: projectUpdateDes,
                project_Link: projectUpdateLink,
                project_img: projectUpdateImg
            })
            .then(function(response) {
                $('#projectUpdateConfirmID').html("yes");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#projectUpdateModal').modal('hide');
                        toastr.success('Update Success');

                        getProjectAllData()
                    } else {
                        $('#projectUpdateModal').modal('hide');
                        toastr.error('Update Fail');
                        getProjectAllData()
                    }
                } else {
                    $('#projectUpdateModal').modal('hide');
                    toastr.error('Something Went Wrong  !');
                }
            })
            .catch(function(error) {
                $('#projectUpdateModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            });
    }
}