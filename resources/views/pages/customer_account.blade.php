@extends('layout')
@section('content')

<div class="register-req">
	<P><b>Customer Name:</b> {{ Session::get('customer_name') }}</P>
</div>

@endsection