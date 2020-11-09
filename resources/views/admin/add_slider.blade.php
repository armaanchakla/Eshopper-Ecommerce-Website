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
				<li>
					<i class="icon-edit"></i>
					<a href="{{url('/add-slider')}}">Add Slider</a>
				</li>
			</ul>

			<p class="alert-success">
				<?php
				$slider_with_image = Session::get('slider_with_image');

				if ($slider_with_image) {
					echo $slider_with_image;
					Session::put('slider_with_image',null);
				}
				?>
			</p>

			<p class="alert-danger">
				<?php
				$slider_without_image = Session::get('slider_without_image');

				if ($slider_without_image) {
					echo $slider_without_image;
					Session::put('slider_without_image',null);
				}
				?>
			</p>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider Here</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">slider Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file">
							  </div>
                            </div>  
                            
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	<input type="checkbox" name="publication_status" value="1">
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add slider</button>
							  <button type="reset" class="btn" onclick="window.location='{{URL::to('/add-slider')}}'">Cancel</button>
							</div>

						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->


@endsection