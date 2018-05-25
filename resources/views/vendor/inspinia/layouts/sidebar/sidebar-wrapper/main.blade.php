<div class="sidebar-collapse">

  <ul class="nav metismenu" style="padding-left:0px;padding: 33px 25px;">
    <li >
      <div class="dropdown profile-element text-center">
        <span>
           <img class="m-b" src="/img/logo.svg" width="60%" alt="">
        </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="clear">
            <span class="block m-t-xs">
              <span style="font-family: BloggerSans;font-size: 16px;color: #949494">{{Auth::user()->email}}<b class="caret"></b></span>
            </span>

          </span>
        </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
          <li>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
            <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          </li>
        </ul>
      </div>

    </li>
  </ul>

  <ul class="nav metismenu" id="side-menu" style="padding-left:0px;">
    <li id="home" >
      <a  href="{{route('panel')}} " ><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
    </li>
    <li id="product">
      <a href="{{route('panel/product')}}"><i class="fa fa-align-justify"></i> <span class="nav-label">Products</span> </a>
    </li>
    <li id="order">
      <a href="{{route('panel/get/allorder')}}"><i class="fa fa-align-justify"></i> <span class="nav-label">Orders</span> </a>
    </li>
    <li id="refill">
      <a href=""><i class="fa fa-align-justify"></i> <span class="nav-label">Refill</span> </a>
    </li>
    <li id="payment">
      <a href=""><i class="fa fa-align-justify"></i> <span class="nav-label">Payments</span> </a>
    </li>
    <li id="setting">
      <a href=""><i class="fa fa-align-justify"></i> <span class="nav-label">Settings</span> </a>
    </li>

  </ul>

  <script>
      $(document).ready(function () {
          $(".metismenu li").removeClass("active");
              $('#home').addClass('active');
      });
  </script>

</div>
