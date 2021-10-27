@extends('Layout.app')

@section('content')




<div id="mainDiv" class="container d-none ">
    <div class="row">
        <div class="col-md-12 p-5">
            <button  id="addNewBlogBtnID" class="  btn btn-sm my-3 btn-danger" >Add New </button>

            <table id="blogDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                 <tr>
                    <th class="th-sm">Tital</th>
                    <th class="th-sm">Full Description </th>
                    <th class="th-sm">Time</th>
                    <th class="th-sm">Edit</th>
                    <th class="th-sm">Delete</th>
                 </tr>
                </thead>
                <tbody id="BlogTableID">

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


 <!-- Blog Delete Modal -->
 <div
 class="modal fade"
 id="deleteBlogModal"
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
             <h5 id="blogDeleteID"> </h5>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                 No
             </button>
             {{--                    <button data-id=" " id="serviceDeleteConfirmID" type="button" class="btn btn-sm btn-danger">yes</button>--}}
             <button  id="BlogDeleteConfirmBtnID" type="button" class="btn btn-sm btn-danger">yes</button>

         </div>
     </div>
 </div>
</div>

  <!--Blod  Add   Modal -->
  <div
  class="modal fade"
  id="blogAddModal"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="staticBackdropLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-body text-center p-3 ">
              <h3 class="mt-5 mb-4">Add  New Blog Data </h3>


              <div id="blogAddForm" class="w-100 ">
                  <input id="blogTitalAddId" type="text" id="" class="form-control mb-4" placeholder="Blog Name" >

                  <textarea id="blogDesAddId" type="text" id=""  rows="5" cols="33" class="form-control mb-4" placeholder="Blog Description" ></textarea>
                  <input id="blogTimeAddId" type="date" id="" class="form-control mb-4" placeholder="" >

                  <div class="col-md-12"> 
                      <div  class="col-md-6" >
                        <input id="blogImgAddId" type="file" id="" class="form-control mb-4" placeholder="Blog Img " >
                        <img id="imgPreView" style="width: 100px;height:100px" src="" alt="" srcset=""> 
                       
                      </div>
                     
                     
                  </div>

                  
              </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"> Cancel </button>

              <button  id="BlogAddConfirmID" type="button" class="btn btn-sm btn-danger">Add</button>

          </div>
      </div>
  </div>
</div>

@endsection


@section('script')


    <script type="text/javascript"> 
getBlogAllData();

 function getBlogAllData() {

    axios.get('/GetBlogData')
        .then(function(response) {
            console.log(response);
            if (response.status == 200) {
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#BlogTableID').empty();
        var blogData = response.data;
        
            $.each(blogData, function(i, item) {
                $('<tr>').html(
                    "<th> " + blogData[i].blog_tital + "</th> " +
                    "<th> " + blogData[i].blog_des + " </th> " +
                    "<th> " + blogData[i].blog_date	 + " </th> "   +
                    "<td> <a class='blogUpdateBtn' data-toggle='modal' data-id="+ blogData[i].id+" ><i class='fas fa-edit'></i></a> </td>>" +
                        "<td> <a class='blogDeleteBtn' data-toggle='modal' data-id="+ blogData[i].id+"  ><i class='fas fa-trash-alt'></i></a> </td>>"            
                ).appendTo('#BlogTableID');
            });
             //Blog table delete Icon Click
             $('.blogDeleteBtn').click(function() {
                    let id = $(this).data('id');
                    // console.log(id);
                    // $('#ProjectDeleteConfirmID').attr('data-id',id);
                    $('#blogDeleteID').html(id);
                    $('#deleteBlogModal').modal('show');
                })

            //Blog table Add Icon Click
            $('#addNewBlogBtnID').click(function() {
                    let id = $(this).data('id');
                    // $('#projectDeleteID').html(id);
                    $('#blogAddModal').modal('show');
                })    
        }
            else {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }
        })
    .catch(function(error) {
        $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
    })
}

//blog Delete modal yes btn
$('#BlogDeleteConfirmBtnID').click(function() {
        let id = $('#blogDeleteID').html();
 BlogDelete(id)
    })

    //Blog Delete
    function BlogDelete(deleteID) {
    $('#BlogDeleteConfirmBtnID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");
    axios.post('/BlogDelete', { id: deleteID })
        .then(function(response) {
            $('#BlogDeleteConfirmBtnID').html("yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteBlogModal').modal('hide');
                    toastr.success('Delete Success');

                    getBlogAllData();
                } else {
                    $('#deleteBlogModal').modal('hide');
                    toastr.error('Delete Fail');
                    getBlogAllData();
                }
            } else {
                $('#deleteBlogModal').modal('hide');
                toastr.error('Something Went Wrong  !');
            }
        })
        .catch(function(error) {
            $('#deleteBlogModal').modal('hide');
            toastr.error('Something Went Wrong  !');
        });
}


$('#blogImgAddId').change(function(){
    var reader=new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload=function(event){
        let ImgSourse=  event.target.result;
        $('#imgPreView').attr('src',ImgSourse);
    }
});


$('#BlogAddConfirmID').on('click',function () {
    let blogTitalAdd = $('#blogTitalAddId').val();
    let blogDesAdd = $('#blogDesAddId').val();
    let blogTimeAdd = $('#blogTimeAddId').val();

var PhotoFile=  $('#blogImgAddId').prop('files')[0];
var formData=new FormData();
formData.append('photo',PhotoFile);

alert(blogTitalAdd);
alert(blogDesAdd);
alert(blogTimeAdd);
console.log(formData);

$('#BlogAddConfirmID').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");

axios.post("/AddBlog",formData) .then(function (response) {
    if(response.status ==200 && response.data==1){
    $('#BlogAddConfirmID').html("yes");
        toastr.success('Photo Upload Success');
        // window.location.href="/photo";
    }else{
        toastr.error('Photo Upload Fail');
        // window.location.href="/photo";
    }
}).catch(function (error) {
    toastr.error('Photo Upload Fail e');
    // window.location.href="/photo";
});

});


</script>



@endsection