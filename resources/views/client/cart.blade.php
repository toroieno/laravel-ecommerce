

	@extends('client_layout.client')

    @section('title')
    Cart
    @endsection

    @section('content')

    <!-- start content -->

    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/cart2.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ</a></span> <span>Giỏ hàng</span></p>
              <h1 class="mb-0 bread">Giỏ hàng của tôi</h1>
            </div>
          </div>
        </div>
      </div>

      <section class="ftco-section ftco-cart">
              <div class="container">
                  <div class="row">
                  <div class="col-md-12 ftco-animate">
                      <div class="cart-list">
                          <table class="table">
                              <thead class="thead-primary">
                                <tr class="text-center">
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>Tên sản phẩm</th>
                                  <th>Giá sản phẩm</th>
                                  <th>Số lượng</th>
                                  <th>Tổng</th>
                                </tr>
                              </thead>
                              <tbody>
                                @if (Session::has('cart'))
                                @foreach ($products as $product)
                                <tr class="text-center">
                                  <td class="product-remove"><a href="{{url('/remove_from_cart/'.$product['product_id'])}}"><span class="ion-ios-close"></span></a></td>

                                  <td class="image-prod"><div class="img" style="background-image:url(/storage/product_images/{{$product['product_image']}});"></div></td>

                                  <td class="product-name">
                                      <h3>{{$product['product_name']}}</h3>
                                  </td>

                                  <td class="price">{{$product['product_price']}}</td>
                                  <form action="{{url('/update_qty/'.$product['product_id'])}}" method="POST">
                                     {{csrf_field()}}
                                    <td class="quantity">
                                          <div class="input-group mb-3">
                                          <input type="number" name="quantity" class="quantity form-control input-number" value="{{$product['qty']}}" min="1" max="100">
                                      </div>
                                      <input type="submit" class="btn btn-success" value="Xác nhận">
                                    </td>
                                  </form>




                                  <td class="total">${{$product['qty']*$product['product_price']}}</td>
                                </tr><!-- END TR-->

                                @endforeach
                                @else
                                @if (Session::has('status'))
                                <div class="alert alert-success">
                                  {{Session::get('status')}}
                                </div>
                                @endif
                                @endif


                              </tbody>
                            </table>
                        </div>
                  </div>
              </div>
              <div class="row justify-content-end">
                  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                      <div class="cart-total mb-3">
                          <h3>Mã giảm giá</h3>
                          <p>Nhập mã phiếu giảm giá của bạn nếu bạn có</p>
                            <form action="#" class="info">
                    <div class="form-group">
                        <label for="">Mã giảm giá</label>
                      <input type="text" class="form-control text-left px-3" placeholder="">
                    </div>
                  </form>
                      </div>
                      <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Áp dụng</a></p>
                  </div>
                  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                      <div class="cart-total mb-3">
                          <h3>Ước tính vận chuyển và thuế</h3>
                          <p>Nhập địa chỉ nhận hàng của bạn để nhận ước tính vận chuyển</p>
                            <form action="#" class="info">
                    <div class="form-group">
                        <label for="">Tỉnh/Thành phố</label>
                      <input type="text" class="form-control text-left px-3" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="country">Quận/Huyện</label>
                      <input type="text" class="form-control text-left px-3" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="country">Thôn/Xã/Phường</label>
                      <input type="text" class="form-control text-left px-3" placeholder="">
                    </div>
                  </form>
                      </div>
                      <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Ước tính</a></p>
                  </div>
                  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                      <div class="cart-total mb-3">
                          <h3>Tổng</h3>
                          <p class="d-flex">
                              <span>Tiền sản phẩm</span>
                              <span>{{Session::has('cart')? number_format(Session::get('cart')->totalPrice)
                                :null}} đ</span>
                          </p>
                          <p class="d-flex">
                              <span>Phí vận chuyển</span>
                              <span>{{ null }} đ</span>
                          </p>
                          <p class="d-flex">
                              <span>Giảm giá</span>
                              <span>{{ null }} đ</span>
                          </p>
                          <hr>
                          <p class="d-flex total-price">
                              <span>Tổng tiền</span>
                              <span>{{Session::has('cart')? number_format(Session::get('cart')->totalPrice)
                                :null}} đ</span>
                          </p>
                      </div>
                      <p><a href="{{url('/checkout')}}" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
                  </div>
              </div>
              </div>
          </section>

      {{-- end content --}}
      @endsection

      @section('scripts')
      <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){

		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
	</script>

@endsection
