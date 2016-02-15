@section('title','top Domains')
@extends('layouts.default')

@section('content')
	<div style="width: 100%">
		<canvas id="topDomain_chart"></canvas>
	</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('components/Chart.js/Chart.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/topDomain.js') }}"></script>

@endsection