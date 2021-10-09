@extends('bug-report.layouts.adminlayout')

<head>
    <title>Check User Report Progress</title>
</head>
@section('content')

    <div class="table-responsive-lg">

        <table class="table table-hover" id="tablenew">
            <thead class="" style="background:#040041">
                <tr class="text-lg-center" style="text-color: #">
                    <th scope="col">No.</th>
                    <th scope="col">Reported By</th>
                    <th scope="col">Siri No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Section</th>
                    <th scope="col">Sub-section</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Status</th>
                    <th scope="col">Progress</th>
                </tr>
            </thead>
            <tbody>
                @if (count($items) > 0)
                    <?php $count = 1; ?>

                    @foreach ($items as $item)
                        {{-- @if ($item->reported_by == auth()->user()->username) --}}


                        <tr class="text-lg-center" id="tableNew1" style="font-size: 14px" data-toggle="modal"
                            data-target="#popupmessage">
                            <td scope="row"><strong>{{ $count }}</strong></td>
                            <td>{{ $item->reported_by }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->bugReportApplicationSection->section }}</td>
                            <td>{{ $item->bugReportApplicationSubSection->sub_section }}</td>
                            <td>{{ $item->bugReportApplicationCategory->category }}</td>
                            {{-- <td>{{ $item->bugReportApplicationStatus->status }}</td> --}}
                            <td>
                                @if ($item->status == 1 || $item->status == 2 || $item->status == 4 || $item->status == 6)
                                    <span class="bg-primary font-weight-normal" style="padding:5px; color:#f3f5f9">
                                        {{ $item->bugReportApplicationStatus->status }}
                                    </span>

                                @elseif (($item->status == 3) || ($item->status == 5) || ($item->status == 7))
                                    <span class="bg-danger font-weight-normal" style="padding:5px; color:#f3f5f9">
                                        {{ $item->bugReportApplicationStatus->status }}
                                    </span>
                                @elseif ($item->status == 8)
                                    <span class="bg-success font-weight-normal" style="padding:5px; color:#f3f5f9">
                                        {{ $item->bugReportApplicationStatus->status }}
                                    </span>

                                @endif

                            </td>

                            <td> <a href="{{ url('admin/progress/' . $item->id . '/edit') }}" title="Edit">
                                    <button type="button" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil-alt"></i>View</button>
                                </a></td>

                        </tr>
                        <?php $count = $count + 1; ?>
                        {{-- @endif --}}
                    @endforeach

                @else
                    <p>No data found</p>
                @endif




                {{-- @endif --}}
                {{-- @endif --}}
                {{-- @endif --}}
                {{-- @endforeach --}}


            </tbody>

        </table>

    </div>
@endsection
