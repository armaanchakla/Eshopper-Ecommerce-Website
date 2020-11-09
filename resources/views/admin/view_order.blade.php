@extends('admin_layout')
@section('admin_content')

	<div id="content" class="span10">
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">View Order</a></li>
            </ul>

            <div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>Customer Name</th>
									  <th>Mobile Number</th>                                        
								  </tr>
                              </thead>  
                               
							  <tbody>
								<tr>
                                    @foreach ($order_by_id as $v_order)
                                        
                                    @endforeach
									<td>{{$v_order->customer_name}}</td>
									<td>{{$v_order->mobile_number}}</td>
								</tr>                     
							  </tbody>
						 </table>   
					</div>
				</div>
				
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
                                      <th>Shipping Name</th>
                                      <th>Shipping Email</th>
									  <th>Shipping Address</th>
                                      <th>Mobile Number</th>
	                                       
								  </tr>
                              </thead>   
                              
							  <tbody>
								<tr>
                                    @foreach ($order_by_id as $v_order)
                                        
                                    @endforeach
									<td>{{$v_order->shipping_first_name.$v_order->shipping_last_name}}</td>
									<td>{{$v_order->shipping_email}}</td>
                                    <td>{{$v_order->shipping_address}}</td>
                                    <td>{{$v_order->shipping_mobile_number}}</td>
								</tr>				                      
							  </tbody>
						 </table>  	 
					</div>
				</div>
			</div>
		
			<div class="row-fluid sortable">
				<div class="box span12">

					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Product Details</h2>
                    </div>
                    
					<div class="box-content">
						<table class="table">

							  <thead>
								  <tr>
									  <th>Order ID</th>
									  <th>Product Name</th>
									  <th>Product Price</th>
                                      <th>Product Sales Quantity</th>  
                                      <th>Product Sub Total</th>                                         
								  </tr>
                              </thead>   
                              
							  <tbody>
                                @foreach($order_by_id as $v_order)
								<tr>
									<td>{{$v_order->order_id}}</td>
									<td>{{$v_order->product_name}}</td>
									<td>{{$v_order->product_price}}</td>
                                    <td>{{$v_order->product_sales_quantity}}</td>
                                    <td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
                                </tr>
                                @endforeach
                              </tbody>
                              
                              <tfoot>
                                <tr>
                                    <td colspan="4">Total with vat: </td>
                                    <td><strong> {{$v_order->order_total}} Tk </strong></td>
                                </tr>
                              </tfoot>
                              
                         </table>                        
                    </div>
                    
				</div>
			</div>	

	</div>

@endsection