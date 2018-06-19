

<nav class="navbar navbar-expand-lg fixed-top navbar-light main-topbar">
    <a class="navbar-brand p-2" href="{{route('website/home')}}">
        <img src="/img/logo.svg">
    </a>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item p-2">
                <a  class="shopping__cart" href="{{route('website/cart')}}">
                    <img src="/img/shopping_circle.svg" width="40" height="40" style="">
                    <img src="/img/shopping-cart.svg" width="21" height="24" style="position: absolute;left: 9px; top: -15px;">
                    @if(!empty(session('cart.item')))
                        <span>{{count(session('cart.item'))}}</span>
                    @else
                        <span>0</span>
                    @endif
                </a>
            </li>
            <li class="nav-item p-2">
                <a href="{{route('website/order/track')}}" class="btn btn__light">
                    Track Order
                </a>
            </li>
            <li class="nav-item p-2">
                <a href="{{route('website/refill')}}" class="btn btn__primary">
                    <i class="fa fa-plus"></i> Refill Balance
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>

    $(document).ready(function () {


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
</script>