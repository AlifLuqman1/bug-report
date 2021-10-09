<form action="add" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group mb-8">
            <div class="alert alert-custom alert-default" role="alert">
                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                <div class="alert-text">
                    Please fill in all required (<span class="text-danger">*</span>) information below.
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="form-group row">

            <div class="col-lg-6">
                <label for="system" class="control-label">{{ __('Select System ') }}<span class="text-danger">*</span></label>
                <select name="system" id="system"
                    class="form-control"
                    data-live-search=" true" {!! $formMode ?? '' !!}>
                    <option data-tokens="" value="">{{ __('-') }}</option>
                    @foreach ($parameters['bugReportApplicationSystem'] as $res => $value)
                        <option data-tokens="{{ $value }}" value="{{ $res }}"
                            {{ $res == old('system') ? 'selected' : (isset($bugReportApplication->system) ? ($res == $bugReportApplication->system ? 'selected' : '') : '') }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <span class="form-text text-muted">{{ __('Please select system') }}</span>
                @error('system')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="col-lg-6">
                <label for="submodule" class="control-label">{{ __('Select Submodule ') }}<span class="text-danger">*</span></label>
                <select name="submodule" id="submodule"
                    class="form-control"
                    data-live-search=" true" {!! $formMode ?? '' !!}>
                    <option data-tokens="" value="">{{ __('-') }}</option>
                    @foreach ($parameters['bugReportApplicationSubmodule'] as $res => $value)
                        <option data-tokens="{{ $value }}" value="{{ $res }}"
                            {{ $res == old('submodule') ? 'selected' : (isset($bugReportApplication->submodule) ? ($res == $bugReportApplication->submodule ? 'selected' : '') : '') }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <span class="form-text text-muted">{{ __('Please select submodule') }}</span>
                @error('submodule')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            
            <div class="col-lg-6">
                <label for="category" class="control-label">{{ __('Select Category ') }}<span class="text-danger">*</span></label>
                <select name="category" id="category"
                    class="form-control"
                    data-live-search=" true" {!! $formMode ?? '' !!}>
                    <option data-tokens="" value="">{{ __('-') }}</option>
                    @foreach ($parameters['bugReportApplicationCategory'] as $res => $value)
                        <option data-tokens="{{ $value }}" value="{{ $res }}"
                            {{ $res == old('category') ? 'selected' : (isset($bugReportApplication->category) ? ($res == $bugReportApplication->category ? 'selected' : '') : '') }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <span class="form-text text-muted">{{ __('Please select category') }}</span>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-6">
                <label>Upload File / Screenshot <span class="text-danger">*</span></label>
                <div></div>
                <div class="custom-file">
                    @if ($formMode)
                        <input type="file" class="custom-file-input" id="attachment" name="attachment"
                            value="{{ old('attachment') }}" />
                        <label class="custom-file-label" for="attachment">Choose file</label>
                    @endif
                </div>
                <span class="form-text text-muted">{{ __('Please upload file or screenshot') }}</span>
                <span style="color:red">@error('attachment'){{ $message }} @enderror</span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="user_comment">Comment <span class="text-danger">*</span></label>
                <textarea type="text" class="form-control form-control-fvio @error('user_comment') is-invalid @enderror" id="user_comment" rows="5" name="user_comment"
                    value="{{ old('user_comment') ?: (isset($bugReportApplication->user_comment) ? $bugReportApplication->user_comment : '')  }}"></textarea>
                    <span class="form-text text-muted">{{ __('Please write comment related to the proposed issue') }}</span>
                    <span style="color:red">@error('user_comment'){{ $message }} @enderror</span>

            </div>
        </div>
        <br>
        {{-- <div class="form-group row">
            <div class="col-lg-6">
                <label>Are you sure all the details above is right?</label>
                <div class="radio-inline">
                    <label class="radio radio-solid">
                        <input type="radio" name="example_2" checked="checked" value="2" />
                        <span></span>
                        Yes
                    </label>
                    <label class="radio radio-solid">
                        <input type="radio" name="example_2" value="2" />
                        <span></span>
                        Not sure
                    </label>
                </div>
                <span class="form-text text-muted">Please confirm your report details</span>
            </div>
        </div> --}}
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-primary mr-2" data-toggle="modal"
            data-target="#popupmessage">Submit</button>
        <a href="{{ url('/bug-report/bruser-web') }}"><button type="button"
                class="btn btn-secondary">Cancel</button></a>
    </div>


    <div class="modal fade" id="popupmessage" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thank You!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Your report will be process very soon. We really appreciate your patience.</p>
                    <p>You can keep track of your report in progress section</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
