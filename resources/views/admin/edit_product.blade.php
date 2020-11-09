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
					<a href="{{url('/edit-product',$product_info->product_id)}}">Edit Product</a>
				</li>
			</ul>

			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product Here</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-product',$product_info->product_id)}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_name" value="{{$product_info->product_name}}" >
							  </div>
                            </div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Category Name</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
									<option> {{$product_info->category_name}} </option>
								  </select>
								</div>
                            </div>
                            
                            <div class="control-group">
								<label class="control-label" for="selectError3">Brand Name</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
									<option> {{$product_info->brand_name}} </option>
								  </select>
								</div>
                            </div>

                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_short_description" rows="3">
									{{$product_info->product_short_description}}
								</textarea>
							  </div>
                            </div>
                            
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_long_description" rows="3">
									{{$product_info->product_long_description}}
								</textarea>
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_price" value="{{$product_info->product_price}}" >
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file" value="{{$product_info->product_image}}">
							  </div>
                            </div> 

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_size" value="{{$product_info->product_size}}" >
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_color" value="{{$product_info->product_color}}" >
							  </div>
                            </div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save</button>
							  <button type="reset" class="btn" onclick="window.location='{{URL::to('/all-product')}}'">Cancel</button>
							</div>

						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->


@endsection