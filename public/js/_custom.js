
(function($) {
    "use strict"; // Start of use strict
  
    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: (target.offset().top - 56)
          }, 1000, "easeInOutExpo");
          return false;
        }
      }
    });
  
    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
      $('.navbar-collapse').collapse('hide');
    });
  
    // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
      target: '#mainNav',
      offset: 56
    });
  
  })(jQuery); // End of use strict


  ScrollReveal().reveal('.menu', { delay: 100 });

//   $(document).ready(function(){
    
//     $('#currentLocation').change(function(){
//       if(this.checked)
//         {
//           $('#countrySelect').hide();
//           $('#citySelect').hide();
//         }
            

//   });
//   $('#anotherLocation').change(function(){
//     if(this.checked)
//       {
//         $('#countrySelect').show();
//         $('#citySelect').show();        
//       }
// });
//   });

  function get_val(sel) {
    alert(sel.value);
      $.ajax({
        url: "/assistant-settings/country?" + sel.value,
        
        method  : 'get',
        data    : {
          country  : country,
        },
        headers:
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result){
        // $("#div1").html(result);
      }});
  }


  $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});