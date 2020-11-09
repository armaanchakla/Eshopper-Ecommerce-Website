@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php 
                    $content = Cart::content();
                    // echo "<pre>";
                    // print_r($content);    
                    // echo "</pre>";
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
                    </thead>
                    
					<tbody>
                        <?php
                        foreach($content as $v_content){ ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_content->options->image)}}" style="height: 80px; width:80px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$v_content->price}}</p>
                            </td>
                            
                        <form action="{{(URL::to('/update-to-cart'))}}" method="post">
                            {{ csrf_field() }}
							<td class="cart_quantity">
								<div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                    <input type="hidden" name="rowId" value="{{$v_content->rowId}}">
                                    <input class="btn btn-sm btn-default" type="submit" name="submit" value="update">
								</div>
                            </td>
                            </form>
                            
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->subtotal}}</p>
							</td>
							<td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>

							<?php  
							$customer_id = Session::get('customer_id');
							$shipping_id = Session::get('shipping_id');
                            ?>

							<?php if ($customer_id != NULL && $shipping_id == NULL){ ?>  
								<li><a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Checkout</a></li>
							<?php }elseif($customer_id != NULL && $shipping_id != NULL){ ?>
								<li><a class="btn btn-default check_out" href="{{URL::to('/payment')}}">Checkout</a></li>
							<?php }else{ ?>
								<li><a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Checkout</a></li>
							<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</section>

@endsection