@extends('bug-report.layouts.adminlayout')

<head>
    <title>Admin 2 View Report</title>
</head>
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-custom">

                <div class="card card-custom">
                    <div class="card-header" style="background-color: #040041;">
                        <h3 class="card-title" style="color: #ffffff">
                            Report Information
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form>
                        @if ($bugReportApplication->status == 6 || $bugReportApplication->status == 7 || $bugReportApplication->status == 8)
                            <div class="card-body">
                                {{-- @foreach ($bugReportApplication as $item) --}}
                                <div class="form-group">
                                    <label>Section : </label>
                                    <textarea class="form-control" readonly id="section"
                                        rows="1">{{ $bugReportApplication->bugReportApplicationSection->section }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sub-section : </label>
                                    <textarea class="form-control" readonly id="sub_section"
                                        rows="1">{{ $bugReportApplication->BugReportApplicationSubSection->sub_section }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Selected Issue : </label>
                                    <textarea class="form-control" readonly id="category"
                                        rows="1">{{ $bugReportApplication->bugReportApplicationCategory->category }}</textarea>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="problem">Problem / Comment : </label>
                                    <textarea class="form-control" readonly id="user_comment"
                                        rows="4">{{ $bugReportApplication->user_comment }}</textarea>
                                </div>
                                <br>
                                <p>Click button below to view full size file : </p>
                                <br>
                                {{-- <button type="reset" class="btn btn-primary mr-2"
                                onClick="window.open('http://localhost/brlogin');">View File</button> --}}
                                <button type="button" class="btn btn-primary mr-2"
                                    onClick="window.open('{{ url('admin1notify/' . $bugReportApplication->id . 'show/') }}');">Full fize</button>
                                <br>
                                <br>
                                <img style="width:100%" src="/storage/attachments/{{ $bugReportApplication->attachment }}">
                                {{-- IMG-20211006-WA0002_1633575677.jpg --}}

                                <br>
                                <br>

                                <div class="form-group mb-1">
                                    <label for="admin1_comment">Comment from Admin 1 </label>
                                    <textarea class="form-control" id="admin1_comment"
                                        rows="7">{{ $bugReportApplication->admin1_comment }}</textarea>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="unit_comment">Comment from Unit </label>
                                    <textarea class="form-control" id="unit_comment"
                                        rows="7">{{ $bugReportApplication->unit_comment }}</textarea>
                                </div>
                            </div>
                        @else

                            <div class="card-body">
                                {{-- @foreach ($bugReportApplication as $item) --}}
                                <div class="form-group">
                                    <label>Section : </label>
                                    <textarea class="form-control" readonly id="section"
                                        rows="1">{{ $bugReportApplication->bugReportApplicationSection->section }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sub-section : </label>
                                    <textarea class="form-control" readonly id="sub_section"
                                        rows="1">{{ $bugReportApplication->BugReportApplicationSubSection->sub_section }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Selected Issue : </label>
                                    <textarea class="form-control" readonly id="category"
                                        rows="1">{{ $bugReportApplication->bugReportApplicationCategory->category }}</textarea>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="problem">Problem / Comment : </label>
                                    <textarea class="form-control" readonly id="user_comment"
                                        rows="4">{{ $bugReportApplication->user_comment }}</textarea>
                                </div>
                                <br>
                                <p>Click button below to view full size file : </p>
                                <br>
                                {{-- <button type="reset" class="btn btn-primary mr-2"
                                onClick="window.open('http://localhost/brlogin');">View File</button> --}}
                                <button type="button" class="btn btn-primary mr-2"
                                    onClick="window.open('{{ url('admin1notify/' . $bugReportApplication->id . 'show/') }}');">Full fize</button>
                                <br>
                                <br>
                                <img style="width:100%" src="/storage/attachments/{{ $bugReportApplication->attachment }}">
                                {{-- IMG-20211006-WA0002_1633575677.jpg --}}

                                <br>
                                <br>

                                <div class="form-group mb-1">
                                    <label for="admin1_comment">Comment from Admin 1 </label>
                                    <textarea class="form-control" id="admin1_comment"
                                        rows="7">{{ $bugReportApplication->admin1_comment }}</textarea>
                                </div>
                            </div>
                        @endif

                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-custom">

                <div class="card card-custom">
                    <div class="card-header" style="background-color: #040041;">
                        <h3 class="card-title" style="color: #ffffff">
                            Admin 2 Fields
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>

                    @endif

                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>

                    @endif

                    <form id="form" class="form" method="POST"
                        action="{{ url('admin2notify/' . $bugReportApplication->id) }}" accept-charset="UTF-8"
                        class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="card-body">
                            {{-- <x-alerts.alert type="danger" :condition="$errors->any()">
                                <p><span class="font-weight-boldest">Please review the errors.</span></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }} </li>
                                    @endforeach
                                </ul>
                            </x-alerts.alert> --}}
                            @include ('bug-report.admin.formadmin2', ['formMode' => 'edit'])
                        </div>

                    </form>

                </div>
            </div>
            <!--end::Card-->
        </div>

    </div>

@endsection
