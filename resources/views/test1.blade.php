@extends('layouts.testLayout')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
    <p>This is my body content.</p>
@stop

@section('content2')
    <p>This is my content.</p>
@stop

@section('content3')
@parent
@stop