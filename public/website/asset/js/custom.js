$(document).ready(function() {
    var layers = $(window);
    var page = $('html, body');
    

    $('.news_slider_active').owlCarousel({
        loop: true,
        margin: 25,
        nav: false,
        navText: ["<i class='fal fa-long-arrow-left'></i>", "<i class='fal active fa-long-arrow-right'></i>"],
        smartSpeed: 900,
        responsive: {
            0: {
                items: 1,
                margin:5,
                stagePadding: 25,
            },
            576:{
                items: 1,
                stagePadding: 70,
            },
            768: {
                items: 2
            },
            1000: {
                items: 2,
                stagePadding: 120,
            },
            1200:{
                items: 1,
                stagePadding: 150,
            },
            1340:{
                items: 2,
                stagePadding: 30,
                margin: 10,
            },
            1401:{
                items: 2,
                stagePadding: 70,
                margin: 10, 
            },
            1541:{
                items: 2,
                stagePadding: 120, 
            },
        }
    })

    $('.feater_main_slider_active').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        smartSpeed: 900,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1,
            }
        }
    })


    


    var owl = $('.news_slider_active');
    owl.owlCarousel();
    $('#slide_next').click(function() {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#slide_prev').click(function() {
        owl.trigger('prev.owl.carousel', [800]);
    })


    var owl2 = $('.feater_main_slider_active');
    owl2.owlCarousel();
    $('#slide_next_feater').click(function() {
        owl2.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('#slide_prev_feater').click(function() {
        owl2.trigger('prev.owl.carousel', [800]);
    })




    //mobile header function
    $('.menutoggle').on('click',function(){
        $('#mobile_toggle_link_wrapper').toggleClass('active');
    })

    $('.menu_close_sidebar').on('click',function(){
        $('#mobile_toggle_link_wrapper').toggleClass('active');
    })

     

    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');
      
      
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass('show');
        });
      
      
        return false;
      });




      // call our plugin
      var Nav = new hcOffcanvasNav('#main-nav', {
        disableAt: false,
        customToggle: '.toggle',
        levelSpacing: 40,
        navTitle: '',
        levelTitles: true,
        levelTitleAsBack: false,
        labelClose: false,
        width: 320,
        labelClose:'Close The Menu'
        
      });


      // this header top fix scroll
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#header-area').addClass("animated slideInDown fix");
            } else {
                $('#header-area').removeClass("animated slideInDown fix");
            }
        });

        // this header top fix scroll
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#mobile_header').addClass("animated slideInDown fix");
            } else {
                $('#mobile_header').removeClass("animated slideInDown fix");
            }
        });






});