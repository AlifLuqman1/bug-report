@extends('bug-report.layouts.generallayout')

<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <title>Bootstrap Example</title> --}}

</head>

<body>

    <head>
        <title>First Page</title>
    </head>
    @section('content')

        {{-- <div class="row">
            <div class="col-lg-6">
                <!--begin::Card-->
                <div class="card card-custom text-lg-center"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <div class="card-header" style="background:#4b4276">
                        <div class="card-title">
                            <h3 class="card-label">Introduction <small>about the system</small></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <img src=" {{ asset('bugreportlogo.png') }} " alt="bugreportlogo" width="500" height="200"
                            style="margin-top:-20px; padding-right:20px">
                        <h5 style="margin-top: -15px">Bug Report</h5><br>
                        <p>Bug report is a system that work as a platform for the user to report any inquiries regarding to
                            any system.</p>

                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-6" style="margin-top:auto; margin-bottom:auto;">
                <!--begin::Card-->
                <div class="card card-custom text-lg-center"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <div class="card-header" style="background:#4b4276">
                        <div class="card-title">
                            <h3 class="card-label">Option <small>selection</small></h3>
                        </div>
                    </div>
                    <div class="card-body text-lg-center">

                        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                            <div class="innercontent" style="display: flex">
                                <img src=" {{ asset('development.png') }} " alt="development" width="70" height="70"
                                    style="padding: 4px">
                                <p class=" text-lg-left"
                                    style="margin-top: auto; margin-bottom:auto; font-size:18px; margin-left:15px; margin-right:0px; width:200px">
                                    System Improvements</p>
                                <a href="{{ url('/report/create') }}"
                                    style="margin-top:auto; margin-bottom:auto;"><button type="button"
                                        class="btn btn-primary"
                                        style="margin: 8px; border-radius: 8px; padding-left:15px; background:#4b4276"><i
                                            class="fas fa-arrow-right"></i></button></a>
                            </div>

                            <div class="innercontent" style="display: flex">
                                <img src=" {{ asset('error.png') }} " alt="development" width="70" height="70"
                                    style="padding: 5px">
                                <p class=" text-lg-left"
                                    style="margin-top: auto; margin-bottom:auto; font-size:18px; margin-left:15px; margin-right:0px; width:200px">
                                    System Error</p>
                                <a href="{{ url('http://127.0.0.1:8000/create2') }}"
                                    style="margin-top:auto; margin-bottom:auto;"><button type="button"
                                        class="btn btn-primary"
                                        style="margin: 8px; border-radius: 8px; padding-left:15px; margin-top: auto; margin-bottom:auto; background:#4b4276"><i
                                            class="fas fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>

        </div> --}}

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-custom text-lg-center"
                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <button type="button" class="btn btn-primary" style="margin:20px"><a
                            href="/report" style="color: aliceblue">
                            User</button></a>
                    <button type="button" class="btn btn-primary"
                        style="margin:20px; background:#040041"><a href="/admin1notify"  style="color: aliceblue">Admin</button></a>
                </div>
            </div>
        </div>


        <br>

        {{-- @if (count($items) > 0)
            @foreach ($items as $data)
                <div class="well">
                    <h3><a href="/report/{{$data->id}}">{{ $data->reported_by }}</a></h3>
                    <small>Submitted on {{$data->created_at}}</small>
                </div>
            @endforeach
            {{$items->links()}}
        @else
            <p>No data found</p>
        @endif --}}

    @endsection
