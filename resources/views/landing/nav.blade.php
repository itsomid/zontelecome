<nav>
    <div class="sidenav">
        <div class="logo">
            <img src="img/logo.svg">
        </div>
        <div class="menu_content">
            <div class="menu_link menu_nav" href="#up">
                <i class="fa fa-angle-up" style="font-size: 80px"></i>
            </div>
            <a class="menu_link" href="#1">
                <div class="parent_product">
                    <img src="img/modem.png" width="153" height="125.5" class="menu_product">
                    <img src="img/circle-line.svg" width="153" height="125.5" id="img1" class="circle_product">
                </div>
                <h3 class="menu_title">Zonetelecom Modem</h3>
                <h6 class="menu_subtitle">
                    WorldWide Anten
                </h6>
            </a>
            <a class="menu_link" href="#2">
                <div class="parent_product">
                    <img src="img/sim.png" width="153" height="125.5" class="menu_product">
                    <img src="img/circle-line.svg" width="153" height="125.5" id="img2" class="circle_product">
                </div>
                <h3 class="menu_title">Zontelecom Sim1</h3>
                <h6 class="menu_subtitle">
                    WorldWide Anten
                </h6>
            </a>
            <a class="menu_link" id="menu3" href="#3">
                <div class="parent_product">
                    <img src="img/router.png" width="153" height="125.5" class="menu_product">
                    <img src="img/circle-line.svg" width="153" height="125.5" id="img3" class="circle_product">
                </div>
                <h3 class="menu_title">Zonetelecom Modem</h3>
                <h6 class="menu_subtitle">
                    WorldWide Anten
                </h6>
            </a>
            <div class="menu_link" href="#down">
                <i class="fa fa-angle-down" style="font-size: 80px"></i>
            </div>
        </div>

    </div>
</nav>
<script>
    $(document).ready(function () {
        var scrollPos = $(document).scrollTop() + 100;
        $('.circle_product').css('opacity', 0);

        $('.menu_content a').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));

            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                $('.circle_product').css('opacity', 0);
                $(this).find('.circle_product').css('opacity', 1);
                $(this).find('.menu_title').css('color', '#FFC506');
                $(this).find('.menu_subtitle').css('color', '#FFC506');

            }
        });
        $(document).on("scroll", onScroll);


        $('.menu_content a').click(function (e) {
            e.preventDefault();
            $(document).off("scroll");
            var linkHref = $(this).attr("href");
            var idElement = linkHref.substr(linkHref.indexOf("#"));


            $('.menu_content a').each(function (e) {
                $('.circle_product').css('opacity', 0);
                $('.menu_title').css('color', '');
                $('.menu_subtitle').css('color', '');
            });
            $(this).find('.circle_product').css('opacity', 1);
            $('.product_description').css('opacity', 1);
            $(this).find('.menu_title').css('color', '#FFC506');
            $(this).find('.menu_subtitle').css('color', '#FFC506');
            $('button').css('opacity', 1);
            $('html, body').stop().animate({
                scrollTop: $(idElement).offset().top - 100
            }, 1000, 'swing', function () {
                $(document).on("scroll", onScroll);
            });
        });

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

                $(refElement).find('button').css('opacity', opacity);
                $(this).find('.circle_product').css('opacity', opacity2);
                console.log("opacity" + $(this).find('.circle_product').css('opacity'));
                if ($(this).find('.circle_product').css('opacity') >= 0.01) {

                    $(this).find('.menu_title').css('color', '#FFC506');
                    $(this).find('.menu_subtitle').css('color', '#FFC506');

                    // $(refElement).find('.main_product').animate({top:"-70px"});
                }
                else {
                    // $(refElement).find('.main_product').animate({top:"-25px"});
                }


                var s = $(document).scrollTop() - $(refElement).find('.main_product').offset().top;

                console.log("s === " + s);


                console.log("VARED" + refElement.attr("id"));

            } else if (offset > 0 && offset <= windowHeight) {
                //section leaving the viewport

                opacity = (1 - (offset / (windowHeight)));
                opacity2 = (1 - (offset / (windowHeight - 700)));
                console.log("kharej" + refElement.attr("id"), opacity);
                $(refElement).find('.product_description').css('opacity', opacity);
                $(refElement).find('button').css('opacity', opacity);
                if ($(this).find('.circle_product').css('opacity') <= 0.01) {
                    $('.menu_title').css('color', '');
                    $('.menu_subtitle').css('color', '');


                }
                else {
                    $(this).find('.menu_title').css('color', '#FFC506');
                    $(this).find('.menu_subtitle').css('color', '#FFC506');

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
