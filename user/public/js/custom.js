// Owl Carousel Start..................

$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});

// Owl Carousel End..................


$('#contactSendBtnID').click(function () {

   var contactName= $('#contactNameID').val();
    var contactMobile= $('#contactMobileID').val();
    var contactEmail= $('#contactEmailID').val();
    var contactMeg= $('#contactMegID').val();


    sendContact(contactName,contactMobile,contactEmail,contactMeg);


});



// contact send js

function sendContact(contact_name,contact_phone,contact_email,contact_meg ) {

    if(contact_name.length==0){
        // toastr.error('Your Name is Empty !');

        setTimeout(function () {
            $('#contactSendBtnID').html('Your Name is Empty');
        },1000)
    }else if (contact_phone.length==0){
        // toastr.error('Your Mobile is Empty !');
        $('#contactSendBtnID').html('Your Mobile is Empty');
    }else if (contact_email.length==0){
        // toastr.error('Your Email is Empty !');
        $('#contactSendBtnID').html('Your Email is Empty');
    }else if (contact_meg.length==0){
        // toastr.error('Your Massage  is Empty !');
        $('#contactSendBtnID').html('Your Massage is Empty');
    }else {

    }

    axios.post('/contactSend',{
        contact_name:contact_name,
        contact_phone:contact_phone,
        contact_email:contact_email,
        contact_meg:contact_meg,
    })
        .then(function (response) {
            alert(response.data);



        }).catch(function () {

    })

}




