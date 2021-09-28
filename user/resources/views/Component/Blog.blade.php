
<div class=" section-marginTop text-center m-5">
    <h1 class="section-title">সাম্প্রতিক ব্লগ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
    <div class="row">

@foreach ( $blogsData as $blogsData )
    

        <div class="col-md-3 text-center  p-2 ">
            <div class="card">
                <img class="w-100" src="{{$blogsData->blog_meg}}" alt="Card image cap">
                <div class="w-100 p-4">
                    <h5 class="blog-card-title text-justify  mt-2">{{$blogsData->blog_tital}} </h5>
                    <h6 class="blog-card-subtitle text-justify p-0 ">{{$blogsData->blog_des}}</h6>
                    <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> {{$blogsData->blog_date}}</h6>
                    <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                </div>
            </div>
        </div>

        @endforeach

      
    </div>
</div>