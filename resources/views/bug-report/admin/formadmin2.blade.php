<div class="card-body">

    <div class="form-group mb-1">
        <label for="admin2_comment">Comment <span class="text-danger">*</span></label>
        <textarea type="text" class="form-control form-control-fvio @error('admin2_comment') is-invalid @enderror"
            id="admin2_comment" rows="7" name="admin2_comment"
            value="{{ old('admin2_comment') ?: (isset($bugReportApplication->admin2_comment) ? $bugReportApplication->admin2_comment : '') }}">{{ $bugReportApplication->admin2_comment }}</textarea>
        <span style="color:red">@error('admin2_comment'){{ $message }} @enderror</span>
    </div>
    <br>

    <div class="form-group">
        <label for="unit_assign" class="control-label">{{ __('Assign Unit') }}</label>
        <select name="unit_assign" id="unit_assign" class="form-control" data-live-search=" true"
            {!! $formMode ?? '' !!}>
            <option data-tokens="" value="">{{ __('-') }}</option>
            @foreach ($parameters['bugReportApplicationUnitAssign'] as $res => $value)
                <option data-tokens="{{ $value }}" value="{{ $res }}"
                    {{ $res == old('unit_assign') ? 'selected' : (isset($bugReportApplication->unit_assign) ? ($res == $bugReportApplication->unit_assign ? 'selected' : '') : '') }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        <span class="form-text text-muted"><small>{{ __('Choose which unit to be assign') }}</small></span>
        @error('unit_assign')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="status" class="control-label">{{ __('Assign Status') }}</label>
        <select name="status" id="status" class="form-control" data-live-search=" true"
            {!! $formMode ?? '' !!}>
            <option data-tokens="" value="">{{ __('-') }}</option>
            @foreach ($parameters['bugReportApplicationStatus'] as $res => $value)
                <option data-tokens="{{ $value }}" value="{{ $res }}"
                    {{ $res == old('status') ? 'selected' : (isset($bugReportApplication->status) ? ($res == $bugReportApplication->status ? 'selected' : '') : '') }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        <span class="form-text text-muted"><small>{{ __('Choose which status to be assign') }}</small></span>
        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="">

    <button type="submit" class="btn btn-primary mr-2" value="Update">Submit</button>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#popupmessage2">Cancel</button>
</div>


{{-- <div class="modal fade" id="popupmessage" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Make sure all the details are filled.</p>
                <p>Have you finalized all of your details?</p>
                <p>Click save changes for save and submit your queries</p>
                <p>Click cancel to recheck the queries</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm Submit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupmessage2" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to reject this application?</p>
                <p>Make sure you provide a specific reason for rejecting this application</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Confirm Reject</button>

            </div>
        </div>
    </div>
</div> --}}
