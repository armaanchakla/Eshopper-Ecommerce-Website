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
        <li><a href="{{url('/all-category')}}">Manage Order</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Order List</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

            @foreach($all_order_info as $v_order)
                <tbody>
                    <tr>
                        <td> {{$v_order->order_id}} </td>
                        <td class="center">{{$v_order->customer_name}}</td>
                        <td class="center">{{$v_order->product_name}}</td>
                        <td class="center">{{$v_order->product_price}}</td>
                        <td class="center">{{$v_order->product_sales_quantity}}</td>
                        <td class="center">{{$v_order->order_total}}</td>
                        <td class="center">{{$v_order->order_status}}</td>

                        {{-- <td class="center">
                            @if($v_category->publication_status == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">Inactive</span>
                            @endif
                        </td> --}}

                        <td class="center">
                            {{-- @if($v_category->publication_status == 1) --}}
                                {{-- <a class="btn btn-danger" href="{{URL::to('/inactive-category')}}">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a> --}}
                            {{-- @else --}}
                                {{-- <a class="btn btn-success" href="{{URL::to('/active-category/'.$v_category->category_id)}}">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a> --}}
                            {{-- @endif --}}
                            
                            <a class="btn btn-info" href="{{URL::to('/view-order/'.$v_order->order_id)}}">
                                <i class="halflings-icon white view"></i>  
                            </a>
{{-- 
                            <a class="btn btn-danger" href="{{URL::to('/delete-category')}}" id="delete">
                                <i class="halflings-icon white trash"></i> 
                            </a> --}}
                        </td>
                    </tr>
                </tbody>
            @endforeach
            </table>            
        </div>
    </div>	
</div>

@endsection