$('#testimonial').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots: true,
  autoplay:true,
  autoplayTimeout:5000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
});

$('#portfolioSlider').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots: true,
  autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:2
      }
  }
});

$('#achiveslider').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots: true,
  autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:2
      }
  }
});

$('#blog').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots: true,
  autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:3
      }
  }
});

$('#bannerContent').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  dots: false,
  autoplay:true,
  autoplayTimeout:2000,
  autoplayHoverPause:true,
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

  // Add event handler for mouseover on the second to last li element
  $('.ruby-menu-mega-blog-nav li:not(:first-child)').mouseover(function() {
    // Add a class to the ul to apply styles to the first li element
    $('.ruby-menu-mega-blog-nav').addClass('hovered');
    $('.ruby-menu-mega-blog-nav > li:first-child > a').removeClass('triangle');

});

// Reset styles when not hovering over the second to last li element
$('.ruby-menu-mega-blog').mouseout(function() {
    $('.hovered').removeClass('hovered');
    $('.ruby-menu-mega-blog-nav > li:first-child > a').addClass('triangle');

});
// $(".ruby-menu-mega-blog").hover(
//     function () {
//       $('.addMenuVisibility').addClass("menuVisibility");
//     },
//     // function () {
//     //   $('.addMenuVisibility').removeClass("menuVisibility");
//     // }
//   );

$(document).ready(function() {
    $('.outline-cards-carousel').owlCarousel({
        margin: 15,
        responsive: {
            0: {
                items: 1,
            },
            500: {
                items: 2
            },
            700: {
                items: 3,
            },
            1000: {
                items: 4,
            },
            1200: {
                items: 5
            }
        },
    });

    $('.portfolio-carousel').owlCarousel({
        loop: false,
        margin: 20,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            390: {
                items: 1.4,
            },
            500: {
                items: 2,
            },
            1000: {
                items: 4.5,
            }
        },
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        autoplaySpeed: 1500
    });

    $('.case-studies-carousel').owlCarousel({
        margin: 15,
        responsiveClass: true,
        dots:false,
        nav:true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4
            }
        }
    });

    $('.testimonial-carousel').owlCarousel({
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
            },
            1000: {
                items: 5
            }
        },
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        autoplaySpeed: 3000
    });

    $('.blogs-carousel').owlCarousel({
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 4
            }
        },
    });
    // portfolio-custom-navigations
    $('.portfolio-custom-nav .owl-prev').click(function() {
        $('.portfolio-carousel').trigger('prev.owl.carousel');
    });
    $('.portfolio-custom-nav .owl-next').click(function() {
        $('.portfolio-carousel').trigger('next.owl.carousel');
    });

    // testimonial-custom-navigations
    $('.testimonial-custom-nav .owl-prev').click(function() {
        $('.testimonial-carousel').trigger('prev.owl.carousel');
    });
    $('.testimonial-custom-nav .owl-next').click(function() {
        $('.testimonial-carousel').trigger('next.owl.carousel');
    });

    // Initialize glightbox for lightbox functionality
    const lightbox = GLightbox({
        selector: '[data-glightbox="project-gallery"]',
        touchNavigation: true,
        descPosition: 'right',
        zoomable:false,
        onOpen: () => {
            $('body').addClass('glightbox-open');
        },
        onClose: () => {
            $('body').removeClass('glightbox-open');
        }
    });

    

    var numColumns = $('#nineGridLayout .row').children().length;
    var threshold = 6;
    if (numColumns > threshold) {
        $('#showMoreBtn').removeClass('d-none');
        $('.row > .grid-item:gt(' + (threshold - 1) + ')').hide();
        $('#showMoreBtn').click(function() {
            $('.row > .grid-item:gt(' + (threshold - 1) + ')').toggle();
            $(this).text(function(i, text) {
                return text === "Show More" ? "Show Less" : "Show More";
            });
        });
    }

    $(".image-slider").owlCarousel({
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    // const lightbox = GLightbox({
    //     selector: '.glightbox'
    // });

    //Contact form
  
    $('.formSubmit').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Serialize the form data
        var formData = new FormData(this);
        
        // Send AJAX request
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "/mail",
            data: formData,
            processData: false,  // Prevent jQuery from processing the data
            contentType: false,  // Prevent jQuery from setting contentType
            success: function(response) {
                if(response['message']){
                    toastr.success(response['message']);
                }else{
                    toastr.error(response['error']);
                }
                // window.location.replace("/admin/case-study");  
            },
            error: function(xhr, status, error) {
                // Handle errors
                var a = JSON.parse(xhr.responseText);
                console.log(a);
                toastr.error(a.message);
                console.error(xhr.responseText);
            }
        });
    });


});

  

  
  