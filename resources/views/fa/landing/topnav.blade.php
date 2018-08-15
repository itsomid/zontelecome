

<nav class="navbar navbar-expand-lg fixed-top navbar-light main-topbar">
    @if(Request::url() !== url("/"))
    <a class="navbar-brand p-2" href="{{route('website/home')}}">
        <img src="/img/logo.svg">
    </a>
    @endif

    <div class="collapse_menu navbar-collapse_menu" id="myTopnav">
        <ul class="navbar-nav">
            @if(Request::url() !== url("/"))
                <li class="nav-item p-2">
                    <a  class="shopping__cart" href="{{route('website/cart')}}">
                        <img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle">
                        <img src="/img/shopping-cart.svg" width="21" height="24" style="position: absolute;left: 9px; top: 0px;">
                        @if(!empty(session('cart.item')))
                            <span>{{count(session('cart.item'))}}</span>
                        @else
                            <span>0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item p-2">

                    <a href="{{route('website/order/track')}}" class="btn btn__light">
                        پیگیری سفارش
                    </a>

                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/refill')}}" class="btn btn__primary">
                        <i class="fa fa-plus"></i> افزایش اعتبار
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            @else
                <li class="nav-item p-2">
                    <a  class="shopping__cart" href="{{route('website/cart')}}">
                        <img src="/img/shopping_circle.svg" width="40" height="40" class="shopping__cart__circle shadow-none">
                        <img src="/img/shopping-cart.svg" width="21" height="24" style="position: absolute;left: 9px; top: 0px;">
                        @if(!empty(session('cart.item')))
                            <span>{{count(session('cart.item'))}}</span>
                        @else
                            <span>0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item p-2">


                    <a href="{{route('website/order/track')}}" class="btn btn__light shadow-none" style="background-color: #202020 !important;">
                        پیگیری سفارش
                    </a>

                </li>
                <li class="nav-item p-2">
                    <a href="{{route('website/refill')}}" class="btn btn__primary shadow-none">
                        <i class="fa fa-plus"></i> افزایش اعتبار
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>

            @endif
        </ul>
    </div>
</nav>

<script>

    $(document).ready(function () {

        persian_numbers();
        // $('body').persiaNumber();

        $('.addbtn').click(function () {

           var name = $(this).attr('id');

            $.ajax({
                url: "{{route('website/order/cart/item')}}",
                type: "POST",
                data: {
                    name: name,
                    _token: "{{ csrf_token() }}"
                },
                error: function (data) {
                    console.log( data);
                },
                success: function (data) {

                    $('.nav-item span').text(data);
                }
            });

        });


    });
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "collapse_menu navbar-collapse_menu") {
            x.className += " responsive";
        } else {
            x.className = "collapse_menu navbar-collapse_menu";
        }
    }
    function persian_numbers(obj){

        if(typeof(obj) == 'string' && obj.length > 0){
            var Sobj = obj;
        }else{
            //all numbers in page will converted
            var Sobj = 'body';
        }

        var AobJ = $(Sobj);

        // AobJ.filter("*:not(iframe)").filter("div.desc-video").andSelf().contents().each(function() {
        AobJ.find("*:not(iframe)").contents().each(function() {

            /*skip iframe like youtube vimo etc.. because jquery this function cannot access iframe https: content  */
            if (this.nodeType === 3 && this.parentNode.localName != "style" && this.parentNode.localName != "script"  && this.parentNode.localName != "iframe" ) {

                if(
                    this.parentNode.getAttribute('class') == "order_id mt-4"
                    || this.parentNode.getAttribute('class') == "device_id mr-3 pt-4"
                    || this.parentNode.getAttribute('class') == "chart-number"
                    || this.parentNode.getAttribute('class') == "chart-label-text"
                    || this.parentNode.getAttribute('class') == "plan__size pt-3"
                    || this.parentNode.getAttribute('class') == "success__box"

                ) {
                    // console.log(this.parentNode);
                } else {

                    this.nodeValue = this.nodeValue.replace(this.nodeValue.match(/[0-9]*\.[0-9]+/), function(txt){
                        return txt.replace(/\./,',');
                    });
                    this.nodeValue = this.nodeValue.replace(/\d/g, function(v) {
                        return String.fromCharCode(v.charCodeAt(0) + 1584);
                    });

                }
            }
        });
    }
</script>