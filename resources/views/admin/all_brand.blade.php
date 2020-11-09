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
				<li><a href="{{url('/all-brand')}}">All Brand</a></li>
			</ul>

			<p class="alert-danger">
				<?php
				$message_brand_delete = Session::get('message_brand_delete');

				if ($message_brand_delete) {
					echo $message_brand_delete;
					Session::put('message_brand_delete',null);
				}
				?>
			</p>

			<p class="alert-success">
				<?php
				$message_brand_update = Session::get('message_brand_update');

				if ($message_brand_update) {
					echo $message_brand_update;
					Session::put('message_brand_update',null);
				}
				?>
			</p>

			<p class="alert-success">
				<?php
				$message_brand_active = Session::get('message_brand_active');

				if ($message_brand_active) {
					echo $message_brand_active;
					Session::put('message_brand_active',null);
				}
				?>
			</p>

			<p class="alert-danger">
				<?php
				$message_brand_inactive = Session::get('message_brand_inactive');

				if ($message_brand_inactive) {
					echo $message_brand_inactive;
					Session::put('message_brand_inactive',null);
				}
				?>
			</p>

			<div class="row-fluid sortable">		
				<div class="box span12">

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Brand List</h2>
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
								  <th>Brand ID</th>
								  <th>Brand Name
								  <th>Brand Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>

						@foreach($all_brand_info as $v_brand)
						  <tbody>
							<tr>
								<td> {{$v_brand->brand_id}} </td>
								<td class="center">{{$v_brand->brand_name}}</td>
								<td class="center">{{$v_brand->brand_description}}</td>

								<td class="center">
									@if($v_brand->publication_status == 1)
										<span class="label label-success">Active</span>
									@else
										<span class="label label-danger">Inactive</span>
									@endif
								</td>

								<td class="center">
									@if($v_brand->publication_status == 1)
										<a class="btn btn-danger" href="{{URL::to('/inactive-brand/'.$v_brand->brand_id)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" href="{{URL::to('/active-brand/'.$v_brand->brand_id)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									
									<a class="btn btn-info" href="{{URL::to('/edit-brand/'.$v_brand->brand_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" href="{{URL::to('/delete-brand/'.$v_brand->brand_id)}}" id="delete">
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