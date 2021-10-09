@extends('bug-report.layouts.adminlayout')

<head>
    <title>Admin 1 Notify New Report</title>
</head>
@section('content')

    <div class="">

        <h2>Choose Table View</h2>
        <p>Open the dropdown menu and select table name which to be view</p>

        <div class="btn-group dropright">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Choose Table Option
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" id="tableList" onclick="myFunctionNew()">New Report</a>
                <a class="dropdown-item" id="tableList" onclick="myFunctionChecked()">Checked Report</a>
                <a class="dropdown-item" id="tableList" onclick="myFunctionReturn()">Return Report</a>
            </div>
        </div>

    </div>



    <div class="tablenews" id="divTableNew">
        <br><br>
        <h3>New Report</h3>
        <br><br>

        <table class="table table-hover" id="tablenew">
            <thead class="" style="background:#040041">
                <tr class="text-lg-center">
                    <th scope="col">No.</th>
                    <th scope="col">Reported By</th>
                    <th scope="col">Siri No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">System</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data) > 0)
                    <?php $count = 1; ?>
                    @foreach ($data as $item)
                        <tr class="text-lg-center" id="tableNew1" style="font-size: 14px">
                            <td scope="row"><strong>{{ $count }}</strong></td>
                            {{-- <td>{{ optional($item->bugReportApplicationReportedBy)->full_name }}</td> --}}
                            <td>{{ $item->reported_by }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->bugReportApplicationSection->section }}</td>
                            <td>{{ $item->bugReportApplicationCategory->category }}</td>
                            <td>
                                <span class="bg-primary font-weight-normal" style="padding:5px; color:#f3f5f9">
                                    {{ $item->bugReportApplicationStatus->status }}
                                </span>

                            </td>
                            <td> <a href="{{ url('admin1notify/' . $item->id . '/edit') }}" title="Edit">
                                    <button type="button" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil-alt"></i>View</button>
                                </a></td>
                        </tr>
                        <?php $count = $count + 1; ?>
                    @endforeach

                @else
                    <p>No data found</p>
                @endif


            </tbody>

        </table>

    </div>
    <div class="tablecheckeds" id="divTableChecked" style="display: none">
        <br><br>
        <h3>Checked Report</h3>
        <br><br>

        <table class="table table-hover" id="tablenew">
            <thead class="" style="background:#040041">
                <tr class="text-lg-center">
                    <th scope="col">No.</th>
                    <th scope="col">Reported By</th>
                    <th scope="col">Siri No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">System</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($checkedData) > 0)
                    <?php $count = 1; ?>
                    @foreach ($checkedData as $item)
                        <tr class="text-lg-center" id="tableNew1" style="font-size: 14px">
                            <td scope="row"><strong>{{ $count }}</strong></td>
                            <td>{{ $item->reported_by }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->bugReportApplicationSection->section }}</td>
                            <td>{{ $item->bugReportApplicationCategory->category }}</td>
                            <td>
                                @if ($item->status == 2)
                                    <span class="bg-primary font-weight-normal" style="padding:5px; color:#f3f5f9">
                                        {{ $item->bugReportApplicationStatus->status }}
                                    </span>

                                @elseif ($item->status == 3)
                                    <span class="bg-danger font-weight-normal" style="padding:5px; color:#f3f5f9">
                                        {{ $item->bugReportApplicationStatus->status }}
                                    </span>

                                @endif
                            </td>
                            <td> <a href="{{ url('admin1notify/' . $item->id . '/edit') }}" title="Edit">
                                    <button type="button" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil-alt"></i>View</button>
                                </a></td>
                        </tr>
                        <?php $count = $count + 1; ?>
                    @endforeach

                @else
                    <p>No data found</p>
                @endif


            </tbody>

        </table>

    </div>

    <div class="tablereturns" id="divTableReturn" style="display: none">
        <br><br>
        <h3>Return Report from Admin2</h3>
        <br><br>

        <table class="table table-hover" id="tablenew">
            <thead class="" style="background:#040041">
                <tr class="text-lg-center">
                    <th scope="col">No.</th>
                    <th scope="col">Reported By</th>
                    <th scope="col">Siri No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">System</th>
                    <th scope="col">Issue</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($returnData) > 0)
                    <?php $count = 1; ?>
                    @foreach ($returnData as $item)
                        <tr class="text-lg-center" id="tableNew1" style="font-size: 14px">
                            <td scope="row"><strong>{{ $count }}</strong></td>
                            <td>{{ $item->reported_by }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->bugReportApplicationSection->section }}</td>
                            <td>{{ $item->bugReportApplicationCategory->category }}</td>
                            <td>
                                <span class="bg-danger font-weight-normal" style="padding:5px; color:#f3f5f9">
                                    {{ $item->bugReportApplicationStatus->status }}
                                </span>
                            </td>
                            <td> <a href="{{ url('admin1notify/' . $item->id . '/edit') }}" title="Edit">
                                    <button type="button" class="btn btn-sm btn-warning"><i
                                            class="fa fa-pencil-alt"></i>View</button>
                                </a></td>
                        </tr>
                        <?php $count = $count + 1; ?>
                    @endforeach

                @else
                    <p>No data found</p>
                @endif


            </tbody>

        </table>
    </div>

    {{-- -------------------------- Java Script -------------------------- --}}

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > 1)
                });
            });
        });

    </script>

    <script>
        function myFunctionNew() {
            var x = document.getElementById("divTableNew");
            var y = document.getElementById("divTableChecked");
            var z = document.getElementById("divTableReturn");
            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";
                z.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }

    </script>

    <script>
        function myFunctionChecked() {
            var y = document.getElementById("divTableChecked");
            var x = document.getElementById("divTableNew");
            var z = document.getElementById("divTableReturn");
            if (y.style.display === "none") {
                y.style.display = "block";
                x.style.display = "none";
                z.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }

    </script>

    <script>
        function myFunctionReturn() {
            var z = document.getElementById("divTableReturn");
            var y = document.getElementById("divTableChecked");
            var x = document.getElementById("divTableNew");
            if (z.style.display === "none") {
                z.style.display = "block";
                x.style.display = "none";
                y.style.display = "none";
            } else {
                z.style.display = "block";
            }
        }

    </script>

@endsection
