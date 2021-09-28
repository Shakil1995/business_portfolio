<div class=" section-marginTop text-center  m-5">
    <div class="row d-flex justify-content-center">
            <div class="col-md-6 text-center">
            <div id="two" class="owl-carousel mb-4 owl-theme">
                    @foreach ( $userReviewData as $userReviewData )
                <div class="item m-1 text-center ">
                        <img class="review-img text-center" src="{{$userReviewData->user_meg}}" alt="Card image cap">
                        <h5 class="service-card-title mt-3">{{$userReviewData->user_name}} </h5>
                        <h6 class="service-card-subTitle p-0 m-0">{{$userReviewData->user_review_meg}}</h6>
                </div>
                @endforeach    
            </div>
           
        </div>
    </div>
</div>

