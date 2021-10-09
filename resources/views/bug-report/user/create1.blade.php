@extends('bug-report.layouts.testLayout')

<head>
    <title>Second Page - 1</title>
</head>
@section('content')
    <div class="row" style="margin:10px">
        <div class="card card-custom col-xs-12 col-md-12 col-sm-12 col-lg-12"
            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding-top:20px">
            <!--begin::Card-->
            <form action="/report/create" method="POST" enctype="multipart/form-data" class="form" id="form">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6" style="padding-right: 15px">
                        <label for="reported_by">Name</label>
                        <input type="text" name="reported_by" id="reported_by" class="form-control form-control-fvio"
                            placeholder="Mr. / Mrs." value="{{ old('reported_by') }}">
                        @error('reported_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group col-md-6" style="padding-left: 15px">
                        <label for="eamil">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="abc123@gmail.com" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" style="padding-right: 15px">
                        <label for="section">Page / Section</label>
                        <select name="section" id="section" class="form-control">
                            {{-- <option selected>Choose...</option>
                            <option value="User Login">User Login</option>
                            <option value="User Registration">User Registration</option>
                            <option value="User Profile">User Profile</option>
                            <option>...</option> --}}


                            <option data-tokens="" value="">{{ __('-') }}</option>
                            @foreach ($parameters['bugReportApplicationSection'] as $res => $value)
                                <option data-tokens="{{ $value }}" value="{{ $res }}"
                                    {{ $res == old('section') ? 'selected' : (isset($bugReportApplication->section) ? ($res == $bugReportApplication->section ? 'selected' : '') : '') }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted"><small>{{ __('Please select section') }}</small></span>
                @error('section')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                    <div class="form-group col-md-6" style="padding-left: 15px">
                        <label for="sub_section">Sub-section</label>
                        <select name="sub_section" id="sub_section" class="form-control">
                            {{-- <option selected>Choose...</option>
                            <option value="Name textfield">Name textfield</option>
                            <option value="Username textfield">Username textfield</option>
                            <option value="Phone number textfield">Phone number textfield</option>
                            <option>...</option> --}}


                            <option data-tokens="" value="">{{ __('-') }}</option>
                            @foreach ($parameters['bugReportApplicationSubSection'] as $res => $value)
                                <option data-tokens="{{ $value }}" value="{{ $res }}"
                                    {{ $res == old('sub_section') ? 'selected' : (isset($bugReportApplication->sub_section) ? ($res == $bugReportApplication->sub_section ? 'selected' : '') : '') }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted"><small>{{ __('Please select sub-section') }}</small></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" style="padding-right: 15px">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            {{-- <option selected>Choose...</option>
                            <option value="New features">New features</option>
                            <option value="UI update">UI update</option>
                            <option value="System maintenance">System maintenance</option>
                            <option>...</option> --}}


                            <option data-tokens="" value="">{{ __('-') }}</option>
                            @foreach ($parameters['bugReportApplicationCategory'] as $res => $value)
                                <option data-tokens="{{ $value }}" value="{{ $res }}"
                                    {{ $res == old('category') ? 'selected' : (isset($bugReportApplication->category) ? ($res == $bugReportApplication->category ? 'selected' : '') : '') }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <span class="form-text text-muted"><small>{{ __('Please select category') }}</small></span>
                    </div>
                    <div class="form-group col-md-6" style="padding-left: 15px">
                        <label for="attachment">Upload Screenshot</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="attachment" id="attachment" value="{{ old('attachment') }}">
                            <label class="custom-file-label" for="attachment">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12" style="padding-right: 15px">
                        <label for="user_comment">Your Comment</label>
                        <textarea type="text" class="form-control form-control-fvio @error('user_comment') is-invalid @enderror" name="user_comment" id="user_comment" placeholder=""
                            rows="4" value="{{ old('user_comment') }}"></textarea>
                            <span style="color:red">@error('user_comment'){{ $message }} @enderror</span>
                    </div>
                </div>
                <button type="reset" class="btn btn-light" style="margin-bottom:20px; margin-right: 10px"><a href="/report">
                        Cancel</button></a>
                <button type="submit" class="btn btn-primary" style="margin-bottom:20px; background:#040041">Submit</button>
            </form>
            <!--end::Card-->
        </div>
    </div>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>
@endsection

@section('page_js')
    <script>
        var fields = [];
        $('.form-control-fvio', $('#form')).each(function() {
            obj = {};

            // var message = this.name.replace(/_/g, ' ');

            obj[this.name] = {
                validators: {
                    notEmpty: {
                        // message: message + ' is required'
                        message: 'This field is required'
                    }
                }
            };

            fields.push(obj);
        });

        var field = fields.reduce(function(res, item) {
            var key = Object.keys(item)[0];
            res[key] = item[key];
            return res;
        }, {});

        FormValidation.formValidation(
            document.getElementById('form'), {
                fields: field,
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                }
            }
        );

    </script>
@endsection
