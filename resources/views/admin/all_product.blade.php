@extends('admin_layout')
@section('admin_content')

			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/admin-dashboard')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{url('/all-product')}}">All Product</a></li>
			</ul>

			<p class="alert-danger">
				<?php
				$message_product_delete = Session::get('message_product_delete');

				if ($message_product_delete) {
					echo $message_product_delete;
					Session::put('message_product_delete',null);
				}
				?>
			</p>

			<p class="alert-success">
				<?php
				$product_with_image = Session::get('product_with_image');

				if ($product_with_image) {
					echo $product_with_image;
					Session::put('product_with_image',null);
				}
				?>
			</p>

			<p class="alert-danger">
				<?php
				$product_without_image = Session::get('product_without_image');

				if ($product_without_image) {
					echo $product_without_image;
					Session::put('product_without_image',null);
				}
				?>
			</p>

			<p class="alert-success">
				<?php
				$message_product_active = Session::get('message_product_active');

				if ($message_product_active) {
					echo $message_product_active;
					Session::put('message_product_active',null);
				}
				?>
			</p>

			<p class="alert-danger">
				<?php
				$message_product_inactive = Session::get('message_product_inactive');

				if ($message_product_inactive) {
					echo $message_product_inactive;
					Session::put('message_product_inactive',null);
				}
				?>
			</p>

			<div class="row-fluid sortable">		
				<div class="box span12">

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Product List</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product ID</th>
								  <th>Product Name</th>
								  <th>Category Name</th>
								  <th>Brand Name</th>
								  {{-- <th>Product Short Description</th>
								  <th>Product Long Description</th> --}}
								  <th>Product Price</th>
								  <th>Product Image</th>
								  <th>Product Size</th>
								  <th>Product Color</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>

						@foreach($all_product_info as $v_product)
						  <tbody>
							<tr>
								<td> {{$v_product->product_id}} </td>
								<td class="center">{{$v_product->product_name}}</td>
								<td class="center">{{$v_product->category_name}}</td>
								<td class="center">{{$v_product->brand_name}}</td>
								{{-- <td class="center">{{$v_product->product_short_description}}</td>
								<td class="center">{{$v_product->product_long_description}}</td> --}}
								<td class="center">{{$v_product->product_price}} Tk</td>
								<td>
								<img src="{{URL::to($v_product->product_image)}}" style="height: 100px; width: 140px;">
								</td> 
								<td class="center">{{$v_product->product_size}}</td>
								<td class="center">{{$v_product->product_color}}</td>

								<td class="center">
									@if($v_product->publication_status == 1)
										<span class="label label-success">Active</span>
									@else
										<span class="label label-danger">Inactive</span>
									@endif
								</td>

								<td class="center">
									@if($v_product->publication_status == 1)
										<a class="btn btn-danger" href="{{URL::to('/inactive-product/'.$v_product->product_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{URL::to('/active-product/'.$v_product->product_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<br>
									<a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<br>
									<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
						  </tbody>
						@endforeach

					  </table>            
					</div>

				</div><!--/span-->	
			</div><!--/row-->


@endsection