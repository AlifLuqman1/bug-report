@extends('bug-report.layouts.testLayout')

<head>
    <title>User Progress</title>
</head>
@section('content')

<form id="form" class="form" method="POST"
        action="{{ url('/report/edit/' . $bugReportApplication->id) }}" accept-charset="UTF-8"
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
            @include ('bug-report.user.formshowprogress', ['formMode' => 'edit'])
        </div>

    </form>

@endsection
