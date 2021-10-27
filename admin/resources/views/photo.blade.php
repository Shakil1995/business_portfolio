@extends('Layout.app')
{{-- @extends('tital','Ph') --}}

@section('content')






<div  class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <button  id="addPhotoID" class="  btn btn-sm my-3 btn-danger" >Add New </button>

        </div>
    </div>

    <div class="row photoRow">

    </div>
    
    <button class="btn btn-sm btn-primary" id="LoadMoreBtn"> Load More </button>

</div>



{{--<div id="mainDivPhoto" class="container-fluid">--}}
{{--    <div class="row photoRow">--}}

{{--    </div>--}}
{{--    <button class="btn btn-primary" id="LoadMoreBtn"> Load More</button>--}}

{{--</div>--}}






    <!-- Photo Add Modal -->
    <div class="modal fade  " id="addPhotoModal" data-mdb-backdrop="static" 
     data-mdb-keyboard="false" tabindex="-1"  aria-labelledby="staticBackdropLabel"  aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content  ">

                <div class=" " >
                    <img  class="imgPreView pb-3" id="imgPreView"  src="{{asset('images/defult_image.png')}}" alt=""  srcset="">
                    <div class="">
                        <input class=""  id="imgInput" type="file" >
                        <button class="btn btn-success"  id="saveImage"  >Save Photo</button>

                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">

  $('#addPhotoID').click(function () {

      $('#addPhotoModal').modal('show');
  });


$('#imgInput').change(function(){
    var reader=new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload=function(event){
        let ImgSourse=  event.target.result;
        $('#imgPreView').attr('src',ImgSourse);
    }
});

$('#saveImage').on('click',function () {

    var PhotoFile=  $('#imgInput').prop('files')[0];
    var formData=new FormData();
    formData.append('photo',PhotoFile);

    $('#saveImage').html("  <div class='spinner-border spinner-border-sm' role='status' ></div> ");

    axios.post("/photoSave",formData) .then(function (response) {
        if(response.status ==200 && response.data==1){
        $('#saveImage').html("yes");
            toastr.success('Photo Upload Success');
            window.location.href="/photo";
        }else{
            toastr.error('Photo Upload Fail');
            window.location.href="/photo";
        }
    }).catch(function (error) {
        toastr.error('Photo Upload Fail e');
        window.location.href="/photo";
    });

});
  LoadPhoto();
function LoadPhoto() {
    axios.get("/photoJSON").then(function (response) {
let JSONPhotoData=response.data;
        // console.log(JSONPhotoData);
        $.each(JSONPhotoData, function(i, item) {
            $(" <div class='col-md-3 p-1' >").html(
                "<img data-id="+item['id']+"  class='imgOnRow' src="+item['photo_location'] +">"
            ).appendTo('.photoRow');
    });
    }).catch(function (error) {
    });
}


// $('#LoadMoreBtn').on('click',function(){
//     let loadMoreBtn=$(this);
//   let firstImgID=  $(this).closest('div').find('img').data('id');
//     LoadById(firstImgID,loadMoreBtn)
// })


//  ImgId=0;
//     function LoadById(firstImgId,loadMoreBtn) {
//  ImgId=ImgId+2;
// let photoID=ImgId+firstImgId;

//     // let URL="/photoJSONByID/{id}"+photoID;


//   // loadMoreBtn.html("<div class='spinner-border spinner-border-sm' role='status'></div>")
//         axios.get('/photoJSONByID/{id}+photoID')
//             .then(function (response) {
//                 console.log(response.data);
//             loadMoreBtn.html("Load More");
//             $.each(response.data, function(i, item) {

//                 $(" <div class='col-md-3 p-1' >").html(
//                     "<img data-id="+item['id']+"  class='imgOnRow' src="+item['photo_location'] +">"
//                 ).appendTo('.photoRow');
//             });
//             toastr.error('this is wrong internal');
//         }).catch(function (error) {
//             toastr.error('this is wrong');

//         });

//     }


</script>
@endsection


@section('css')
    <style type="text/css">
        .imgPreView{
            width: 100%;
            height: 300px;
            border: none;
            margin-top: 3px;
            background: #a7a7a7;
        }
        .imgOnRow{
            border: none !important;
            width: 100%;
            height: 200px;
            object-fit: cover;

        }

    </style>
@endsection

