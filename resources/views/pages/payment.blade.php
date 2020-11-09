@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Payment Method</li>
				</ol>
            </div>

            <div class="register-req">
                    <P><b>Total Payment</b></P>
            </div>
		</div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="col-sm-12">
        <div class="total_area">
        <?php 
            $content = Cart::content();
        ?>
        <ul>
            <li>Sub Total <span>{{Cart::subtotal()}}</span></li>
            <li>Tax <span>{{Cart::tax()}}</span></li>
            <li>Shipping Cost <span>Free</span></li>
            <li>Total <span>{{Cart::total()}}</span></li>
        </ul>
        </div>
    </div>
</section>
    
<section id="do_action">
	<div class="container col-sm-12">
		<div class="register-req">
            <P><b>Payment Method</b></P>
        </div>

        <div class="col-sm-12">
            <div>
            <form action="{{url('/placed-order')}}" method="post">
                {{ csrf_field() }}
                <ul class="col-sm-3">
                    <li><input type="radio" name="payment_method" value="cash_on_delivery"> <hr> <img src="{{URL::to('frontend/images/cash-on-delivery.jpeg')}}" style="height: 160px; width:170px;"> <br><br> <b> Cash On Delivey </b></li>
                </ul>
                <ul class="col-sm-3">
                    <li><input type="radio" name="payment_method" value="debit_card"> <hr> <img src="{{URL::to('frontend/images/debitcard.jpg')}}" style="height: 160px; width:170px;"> <br><br> <b> Debit Card </b></li>
                </ul>
                <ul class="col-sm-3">
                    <li><input type="radio" name="payment_method" value="bkash"> <hr> <img src="{{URL::to('frontend/images/bkash.jpg')}}" style="height: 160px; width:170px;"> <br><br> <b> Bkash </b></li>
                </ul>
                <ul class="col-sm-3">
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                    <input type="submit" class="btn btn-default" value="Done">    
                </ul>
            </form>
            </div>      
        </div>
	</div>
</section>

@endsection