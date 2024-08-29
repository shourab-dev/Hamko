@extends('layouts.AuthLayout')
@section('title', 'Dashboard')
@section('content')
<h3>welcome to our dashboard {{ auth()->user()->name }}</h3>
@endsection