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
            <li><a href="{{url('/all-slider')}}">All Slider</a></li>
        </ul>

        <p class="alert-danger">
            <?php
            $message_slider_delete = Session::get('message_slider_delete');

            if ($message_slider_delete) {
                echo $message_slider_delete;
                Session::put('message_slider_delete',null);
            }
            ?>
        </p>

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

        <p class="alert-success">
            <?php
            $message_slider_active = Session::get('message_slider_active');

            if ($message_slider_active) {
                echo $message_slider_active;
                Session::put('message_slider_active',null);
            }
            ?>
        </p>

        <p class="alert-danger">
            <?php
            $message_slider_inactive = Session::get('message_slider_inactive');

            if ($message_slider_inactive) {
                echo $message_slider_inactive;
                Session::put('message_slider_inactive',null);
            }
            ?>
        </p>

        <div class="row-fluid sortable">		
            <div class="box span12">

                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>All Slider List</h2>
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
                                <th>Slider ID</th>
                                <th>Slider Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                    @foreach($all_slider_info as $v_slider)
                        <tbody>
                        <tr>
                            <td>{{$v_slider->slider_id}}</td>
                            <td>
                            <img src="{{URL::to($v_slider->slider_image)}}" style="height: 150px; width: 300px;">
                            </td> 

                            <td class="center">
                                @if($v_slider->publication_status == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>

                            <td class="center">
                                @if($v_slider->publication_status == 1)
                                    <a class="btn btn-danger" href="{{URL::to('/inactive-slider/'.$v_slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>  
                                    </a>
                                @endif

                                <a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}" id="delete">
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