@extends('admin.layout')

@section('content')
	This is dashboard
	{{Auth::user()->name}}
@endsection