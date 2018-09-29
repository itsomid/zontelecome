<nav>
    <div class="sidenav">
        <div class="logo">
            <img src="img/logo.svg">
        </div>
        <div class="menu_content">
            <span class="menu_link  menu_nav" href="#up" id="up">
                <i class="fa fa-angle-up navigator" ></i>
            </span>
            @foreach($products as $key=>$product)
            <a class="menu_link menu_product" id="product_{{$key+1}}" href="#{{$key+1}}">
                <div class="parent_product">
                    @if($product->slug != "zonfi-v2-global-modem")
                        <img src="{{$product->main_image_url}}" width="153" height="153" class="menu_product_img">
                    @else
                        <img src="{{$product->main_image_url}}" width="153" height="153" class="menu_product_img menu_product_img_v2">
                    @endif
                    <img src="/img/circle-line.svg" width="153" height="125.5" id="img1" class="circle_product">
                </div>
                <h3 class="menu_title pt-1">{{$product->title}}</h3>
            </a>

            @endforeach

            <span class="menu_link " href="#down" id="down">
                <i class="fa fa-angle-down navigator" ></i>
            </span>
        </div>

    </div>
</nav>
<script>
    $(document).ready(function () {

        if (screen.width >= 1200) {

            var scrollPos = $(document).scrollTop() + 500;
            $('.circle_product').css('opacity', 0);


            $('.menu_content a').each(function () {

                var refElement = $($(this).attr("href"));

                if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                    $('.circle_product').css('opacity', 0);
                    $(this).find('.circle_product').css('opacity', 1);
                    $(this).find('.product_description').css('opacity', 1);
                    $(this).find('.menu_title').css('color', '#FFC506');
                    $(this).addClass('active');
                    // $('html,body').scrollTop(0);
                    $('html, body').stop().animate({
                        scrollTop: $(refElement).offset().top - 100
                    }, 250, 'swing', function () {
                        $(document).on("scroll", onScroll);
                    });
                }
                else {
                    $('html, body').stop().animate({scrollTop: 0});
                }
            });

            $(document).on("scroll", onScroll);

            $('#up').click(function (e) {
                e.preventDefault();
                $(document).off("scroll");
                var cur_id = $('.menu_product.active').attr('id');
                var first_id = $('.menu_product').first().attr('id');

                if (cur_id === first_id) {

                    var next_id = $('.menu_product').last().attr('id');
                    var next_href = $('.menu_product').last().attr('href');
                    $('a.menu_link').removeClass('active');
                    $('#' + next_id).addClass('active');

                }
                else {

                    var next_id = $('.menu_product.active').prev().attr('id');
                    var next_href = $('.menu_product.active').prev().attr('href');
                    $('a.menu_link').removeClass('active');
                    $('#' + next_id).addClass('active');

                }

                $('.menu_content a').each(function () {

                    $('.circle_product').css('opacity', 0);
                    $('.menu_title').css('color', 'white');
                });


                $('#' + next_id).find('.circle_product').css('opacity', 1);
                $('.product_description').css('opacity', 1);
                $('#' + next_id).find('.menu_title').css('color', '#FFC506');

                $('.btn__more').css('opacity', 1);
                $('html, body').stop().animate({
                    scrollTop: $(next_href).offset().top - 100
                }, 1000, 'swing', function () {
                    $(document).on("scroll", onScroll);
                });
            });
            $('#down').click(function (e) {

                e.preventDefault();
                $(document).off("scroll");
                var cur_id = $('.menu_product.active').attr('id');
                var last_id = $('.menu_product').last().attr('id');

                if (cur_id === last_id) {

                    var next_id = $('.menu_product').first().attr('id');
                    var next_href = $('.menu_product').first().attr('href');
                    $('a.menu_link').removeClass('active');
                    $('#' + next_id).addClass('active');

                }
                else {

                    var next_id = $('.menu_product.active').next().attr('id');
                    var next_href = $('.menu_product.active').next().attr('href');
                    $('a.menu_link').removeClass('active');
                    $('#' + next_id).addClass('active');

                }

                $('.menu_content a').each(function () {

                    $('.circle_product').css('opacity', 0);
                    $('.menu_title').css('color', '');

                });


                $('#' + next_id).find('.circle_product').css('opacity', 1);
                $('.product_description').css('opacity', 1);
                $('#' + next_id).find('.menu_title').css('color', '#FFC506');

                $('btn__more').css('opacity', 1);
                $('html, body').stop().animate({
                    scrollTop: $(next_href).offset().top - 100
                }, 1000, 'swing', function () {
                    $(document).on("scroll", onScroll);
                });
            });

            $('.menu_content a').click(function (e) {
                e.preventDefault();
                $(document).off("scroll");
                var linkHref = $(this).attr("href");

                // var idElement = linkHref.substr(linkHref.indexOf("#"));


                $('.menu_content a').each(function (e) {
                    $('.circle_product').css('opacity', 0);
                    $('.menu_title').css('color', '');

                    $('a.menu_link').removeClass('active');
                });
                $(this).addClass('active');

                $(this).find('.circle_product').css('opacity', 1);
                $('.product_description').css('opacity', 1);
                $(this).find('.menu_title').css('color', '#FFC506');
                $(this).find('.menu_subtitle').css('color', '#FFC506');
                $('.btn__more').css('opacity', 1);
                $('html, body').stop().animate({
                    scrollTop: $(linkHref).offset().top - 100
                }, 1000, 'swing', function () {
                    $(document).on("scroll", onScroll);
                });

            });
        }

    });

    function onScroll(event) {

        var scrollPos = $(document).scrollTop() + 100;

        $('.menu_content a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            var targetHeight = refElement.outerHeight();

            var offset = ($(window).scrollTop() + 100) - refElement.offset().top,
                windowHeight = $(window).height();

            if (offset >= -(windowHeight) && offset <= 0) {

                // section entering the viewport
                opacity = 1 - Math.abs(offset / (windowHeight - 700));
                opacity2 = 1 - Math.abs(offset / (windowHeight - 600));
                $(refElement).find('.product_description').css('opacity', opacity);

                $(refElement).find('.btn__more').css('opacity', opacity);
                $(this).find('.circle_product').css('opacity', opacity2);

                // console.log("opacity" + $(this).find('.circle_product').css('opacity'));
                if ($(this).find('.circle_product').css('opacity') >= 0.01) {

                    $(this).find('.menu_title').css('color', '#FFC506');
                    $('.menu_product').removeClass('active');
                    $(this).addClass('active');
                    // $(refElement).find('.main_product').animate({top:"-70px"});
                }
                else {
                    // $(refElement).find('.main_product').animate({top:"-25px"});
                }


                var s = $(document).scrollTop() - $(refElement).find('.main_product').offset().top;

                // console.log("s === " + s);


                // console.log("VARED" + refElement.attr("id"));

            } else if (offset > 0 && offset <= windowHeight) {
                //section leaving the viewport
                if ($(this).next().hasClass('active'))
                {
                    $(this).removeClass( 'active');
                }
                opacity = (1 - (offset / (windowHeight+3000)));
                opacity2 = (1 - (offset / (windowHeight - 700)));
                // console.log("kharej" + refElement.attr("id"), opacity);
                $(refElement).find('.product_description').css('opacity', opacity);
                $(refElement).find('.btn__more').css('opacity', opacity);
                if ($(this).find('.circle_product').css('opacity') <= 0.01) {
                    $('.menu_title').css('color', '');
                    $('.menu_product').removeClass('active');
                    $(this).addClass('active');
                }
                else {
                    $(this).find('.menu_title').css('color', '#FFC506');

                }

                $(this).find('.circle_product').css('opacity', opacity2);

            }

            //
            // if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            //
            // }
            // else {
            //
            // }

        });
    }
</script>
