@extends('bug-report.layouts.testLayout')

<head>
    <title>Admin 1 Notify New Report</title>
</head>
@section('content')

<div>
<img style="width:100%" src="/storage/attachments/{{$bugReportApplication->attachment}}">
</div>

@endsection