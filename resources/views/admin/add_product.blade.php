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
					<a href="{{url('/add-product')}}">Add Product</a>
				</li>
			</ul>

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
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product Here</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_name" >
							  </div>
                            </div>   
                            
                            <div class="control-group">
								<label class="control-label" for="selectError3">Category Name</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
                                    <option>Select Category</option>

                                    <?php
									$all_published_category = DB::table('tbl_category')
									                        ->where('publication_status', 1)
                                                            ->get();
                                    foreach ($all_published_category as $v_category) { 
									?>
									
									<option value="{{$v_category->category_id}}"> {{$v_category->category_name}} </option>
									
									<?php } ?>
									
								  </select>
								</div>
                            </div>
                              
                            <div class="control-group">
								<label class="control-label" for="selectError3">Brand Name</label>
								<div class="controls">
								  <select id="selectError3" name="brand_id">
									<option>Select Brand</option>

									<?php
                                    $all_published_brand = DB::table('tbl_brand')
                                                            ->where('publication_status', 1)
                                                            ->get();
                                    foreach ($all_published_brand as $v_brand) {     
									?>
									
									<option value="{{$v_brand->brand_id}}"> {{$v_brand->brand_name}} </option>
									
                                    <?php } ?>

								  </select>
								</div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_short_description" rows="3"></textarea>
							  </div>
                            </div>
                            
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_price" >
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
                            </div>  
                            
                            <div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_size" >
							  </div>
                            </div>

                            <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="product_color" >
							  </div>
                            </div>
                            
                            <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
							  	<input type="checkbox" name="publication_status" value="1">
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn" onclick="window.location='{{URL::to('/add-product')}}'">Cancel</button>
							</div>

						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->


@endsection