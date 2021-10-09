<div class="progressContentt3" id="progressContent3">
    {{-- @foreach ($data as $item) --}}
        <h5>Siri No : {{ $bugReportApplication->id }}</h5>
        <br><br><br>
        <div class="col-sm-12 text-center" style="display: flex">
            <div class="rounded mx-auto d-block">
                <img src=" {{ asset('usercheck.png') }} " alt="step1" class="img-responsive" width="60"
                    height="60" />
                <p>Report Submitted</p>
            </div>
            <div class="rounded mx-auto d-block">
                <img src=" {{ asset('firststep.png') }} " alt="step2" class="img-responsive" width="60"
                    height="60" />
                <p>Admin1 Verification</p>
            </div>
            <div class="rounded mx-auto d-block">
                <img src=" {{ asset('firststep.png') }} " alt="step3" class="img-responsive" width="60"
                    height="60" />
                <p>Admin2 Verification</p>
            </div>
            <div class="rounded mx-auto d-block">
                <img src=" {{ asset('firststep.png') }} " alt="step4" class="img-responsive" width="60"
                    height="60" />
                <p>Unit Verification</p>
            </div>
            <div class="rounded mx-auto d-block">
                <img src=" {{ asset('finalstep.png') }} " alt="step1" class="img-responsive" width="60"
                    height="60" />
                <p>Report Completed</p>
            </div>
        </div>

        <br>

        <div class="progress">

            @if ( $bugReportApplication->status == 1)
                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 10%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 2)
                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 32%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 3)
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 32%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 4)
                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 52%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 5)
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 52%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 6)
                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 72%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 7)
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 72%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>

            @elseif ( $bugReportApplication->status == 8)
                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%"
                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            @endif
            {{-- <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 80%"
                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div> --}}
            
        </div>
        <br><br>
    {{-- @endforeach --}}
</div>
<br>

<div class="row">
    <div class="col-lg-6">
        <!--begin::Card-->
        <div class="card card-custom">

            <div class="card card-custom">
                <div class="card-header" style="background-color: #040041;"> {{--style="background-color: #040041--}}
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
                    <div class="card-body">

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
                            <textarea class="form-control" id="user_comment"
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


                    </div>

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
                        Admin Fields
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
                    <div class="card-body">

                        <div class="form-group">
                            <label for="department_comment">Comment from Admin1 :</label>
                            <textarea class="form-control" id="admin1_comment"
                                rows="7">{{ $bugReportApplication->admin1_comment }}</textarea>
                                <small>Submitted on {{$bugReportApplication->admin1_commented_at}}</small>
                        </div>

                        <div class="form-group mb-1">
                            <label for="section_comment">Comment from Admin2 :</label>
                            <textarea class="form-control" id="admin2_comment"
                                rows="7">{{ $bugReportApplication->admin2_comment }}</textarea>
                                <small>Submitted on {{$bugReportApplication->admin2_commented_at}}</small>
                        </div>

                        <div class="form-group mb-1">
                            <label for="unit_comment">Comment from Unit :</label>
                            <textarea class="form-control" id="unit_comment"
                                rows="7">{{ $bugReportApplication->unit_comment }}</textarea>
                                <small>Submitted on {{$bugReportApplication->unit_commented_at}}</small>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!--end::Card-->
    </div>

</div>
