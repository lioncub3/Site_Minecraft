var $id_category = 1,
    $offset = 3,
    $show = 3,
    $page = 0,
    $total_posts_in_category = 0;

$(document).ready(function (){
    morePosts();

    function getSectionClass(n)
    {
        switch (n)
        {
            case 1: return '.one';
            case 2: return '.two';
            case 3: return '.three';
            case 4: return '.four';
        }
    }

    $('.category-selector').click(function()
    {
        var click_section = $(this).data('category');

        if(+click_section === $id_category)
            return;

        var sectionToHide = $('.part' + getSectionClass($id_category));
        sectionToHide.fadeOut(200);

        var sectionToShow = $('.part' + getSectionClass(click_section));
        sectionToShow.fadeIn(200);

        $id_category = click_section;

        // REMOVE FRAMES
        $('.article').removeClass('fire');
        $('.bad-ideas').removeClass('fire');
        $('.history').removeClass('fire');
        $('.text-block').removeClass('fire');
        $('.bdr').addClass('removeTrans');

        $('#blogView').hide();
        $offset = 3;

        //openBlogCategory($id_category);
    });

    function morePosts() {
        $('#btn_more_blog').click(function () {
            $.ajax({
                url: '/site/more-posts?' + $.param({id_category: $id_category}),
                type: 'POST',
                data: {
                    page: $page + 1,
                    show: $show
                },
                dataType: "json",
                success: function (response) {
                    $("#blogContainer").append(response.html);
                    $page = +response.page;

                    if($page * $show >= $total_posts_in_category)
                        $("#btn_more_blog").hide();
                }
            });
        });
    }

// MODIFYING GALLARYS
    var i;
    for (i = 0; i < 4; i++){
        lightGallery(document.getElementById('lightgallery-' + i), {
            galleryId: i + 1,
            mode: 'lg-slide',
            width: '85%',
            zoom: false,
            fullScreen: true,
            autoplay: false,
            preload: 3,
            download: false
        });
    }

    var sub_gallery = document.getElementsByClassName('sub_gallery');

    var i;
    for (i = 0; i < sub_gallery.length; i++){
        lightGallery(sub_gallery[i], {
            galleryId: 4,
            mode: 'lg-slide',
            width: '85%',
            zoom: false,
            fullScreen: true,
            autoplay: false,
            preload: 3,
            download: false
        });
    }

// CHANGE IMAGE ATTR ON RESIZING WIDTH WINDOW
    // if($(window).width() < 576) {
    //   $( "#respons-1" ).attr('src', 'images/gallary/gallary1.jpg');
    //   $( "#respons-2" ).attr('src', 'images/gallary/gallary2.jpg');
    //   $( "#respons-3" ).attr('src', 'images/gallary/gallary3.jpg');
    // }

    // $(window).resize(function(){
    //   if($(window).width() < 576) {
    //     $( "#respons-1" ).attr('src', 'images/gallary/gallary1.jpg');
    //     $( "#respons-2" ).attr('src', 'images/gallary/gallary2.jpg');
    //     $( "#respons-3" ).attr('src', 'images/gallary/gallary3.jpg');
    //   } else{
    //     $( "#respons-1" ).attr('src', 'images/gallary/gallary1_sq.jpg');
    //     $( "#respons-2" ).attr('src', 'images/gallary/gallary2_sq.jpg');
    //     $( "#respons-3" ).attr('src', 'images/gallary/gallary3_sq.jpg');
    //   }
    // });

// CAROUSEL
    $('.carousel').carousel({
        interval: false
    });

// When the user clicks on the scroll-up button, scroll to the top of the document
    $('.back-to-top').click(function () {
        $("html, body").stop().animate({scrollTop: 0}, 500, 'swing');
        return false;
    });

// When the user clicks on the contact-us button
    $('.contact-link').click(function () {
        $('body, html').animate({scrollTop: $('body').height()}, 500, 'swing');
        return false;
    });
// When the user clicks on the navigations buttons
    $('#services-nav').click(function () {
        $('html, body').animate({scrollTop: $('#carouselExampleIndicators').offset().top + $('#carouselExampleIndicators').height()}, 500, 'swing');
        return false;
    });

    $('#blog-nav').click(function () {
        $('html, body').animate({scrollTop: $('.blog').offset().top}, 500, 'swing');
        return false;
    });

    $('#about-us-nav').click(function () {
        $('html, body').animate({scrollTop: $('.team').offset().top}, 500, 'swing');
        return false;
    });

    $('#contacts-nav').click(function () {
        $('body, html').animate({scrollTop: $('body').height() - document.documentElement.clientHeight}, 700, 'swing');
    });


// FRAMES ANIMATION LOGIK
    $(window).scroll(function () {

        var bottomWindow = $(this).scrollTop() + $(this).height();
        var bottomArticle = $('.article').not(':hidden').offset().top + $('.article').not(':hidden').height();
        var heightToFooter = $('footer').offset().top;
        var backToTop = $(this).scrollTop() < 600 || bottomWindow - heightToFooter > 299;

        backToTop ? $('.back-to-top').stop().fadeTo(1000, 0) : $('.back-to-top').stop().fadeTo(1000, 1);

        $('.bdr').removeClass('removeTrans');

        if (bottomWindow >= bottomArticle) {
            $('.article').addClass('fire').addClass('removeTrans');
        }
        // if (bottomWindow >= ($('.bad-ideas').offset().top + $('.bad-ideas').height())) {
        //     $('.bad-ideas').addClass('fire');
        // }
        if (bottomWindow >= ($('.history').offset().top + $('.history').height())) {
            $('.history').addClass('fire');
        }
        // TEXT BLOCKS
        // if ($('.tb-1').offset().top > 0 && bottomWindow >= ($('.tb-1').not(':hidden').offset().top + $('.tb-1').not(':hidden').height() + 100)) {
        //     $('.tb-1').addClass('fire');
        // }
        // if ($('.tb-2').offset().top > 0 && bottomWindow >= ($('.tb-2').not(':hidden').offset().top + $('.tb-2').not(':hidden').height() + 100)) {
        //     $('.tb-2').addClass('fire');
        // }
        // if ($('.tb-3').offset().top > 0 && bottomWindow >= ($('.tb-3').not(':hidden').offset().top + $('.tb-3').not(':hidden').height() + 100)) {
        //     $('.tb-3').addClass('fire');
        // }
        // if ($('.tb-4').offset().top > 0 && bottomWindow >= ($('.tb-4').not(':hidden').offset().top + $('.tb-4').not(':hidden').height() + 100)) {
        //     $('.tb-4').addClass('fire');
        // }
        // if ($('.tb-5').offset().top > 0 && bottomWindow >= ($('.tb-5').not(':hidden').offset().top + $('.tb-5').not(':hidden').height() + 100)) {
        //     $('.tb-5').addClass('fire');
        // }
        // if ($('.tb-6').offset().top > 0 && bottomWindow >= ($('.tb-6').not(':hidden').offset().top + $('.tb-6').not(':hidden').height() + 100)) {
        //     $('.tb-6').addClass('fire');
        // }
    });
});
