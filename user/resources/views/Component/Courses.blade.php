<div class=" section-marginTop text-center m-5">
    <h1 class="section-title">কোর্স সমূহ </h1>
    <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>


 <div class="row">

     
       @foreach ( $coursesData as $coursesData )
           
  
        <div class="col-md-4  thumbnail-container ">
                <img   src="{{$coursesData->courses_img}}" alt="Avatar" class="thumbnail-image ">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> {{$coursesData->courses_name}} </h1>
                    <h1 class="thumbnail-subtitle">{{$coursesData->courses_des}} </h1>
                    <h1 class="thumbnail-subtitle">{{$coursesData->course_fee}} </h1>
                    <a target="_blank" href="{{$coursesData->course_link}}" class="normal-btn btn">শুরু করুন</a>
                </div>
        </div>
        @endforeach
      
        
    </div> 

    {{-- <div id="one"  class="owl-carousel mb-4 owl-theme">
        @foreach ( $coursesData as $coursesData )
            
        
                  
                        <div class="item m-1 card">
                            <div class="text-center">
                                <img class="w-100 h-100" src="{{$coursesData->courses_img}}" alt="Card image cap">
                                <h5 class="service-card-title mt-4">{{$coursesData->courses_name}}</h5>
                                <h6 class="service-card-subTitle p-0 m-0">{{$coursesData->courses_des}} </h6>
                                <button class="normal-btn-outline mt-2 mb-4 btn">বিস্তারিত</button>
                            </div>
                        </div>
                        @endforeach    
                      
                    </div> --}}



</div>