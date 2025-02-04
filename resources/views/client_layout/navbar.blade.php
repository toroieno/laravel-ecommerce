<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">035-910-8306</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">trien.nv195934@sis.hust.edu.vn</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">Quản trị dự án CNTT &amp; Nhóm 3</span>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">T5 - Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Trang chủ</a></li>
          <li class="nav-item active"><a href="{{url('/shop')}}" class="nav-link">Cửa hàng</a></li>

          <li class="nav-item cta cta-colored"><a href="{{url('/cart')}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{Session::has('cart')?
          Session::get('cart')->totalQty:0}}]</a></li>

              @if(Session::has('client'))
              <li class="nav-item active"><a href="{{url('/logout')}}" class="nav-link"><span class="fa fa-user"></span>Đăng xuất</a></li>
                @else
                <li class="nav-item active"><a href="{{url('/login')}}" class="nav-link"><span class="fa fa-user"></span>Đăng nhập</a></li>
                @endif
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
