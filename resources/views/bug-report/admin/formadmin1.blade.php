<div class="card-body">

    <div class="form-group mb-1">
        <label for="admin1_comment">Comment <span class="text-danger">*</span></label>
        <textarea type="text" class="form-control form-control-fvio @error('admin1_comment') is-invalid @enderror"
            id="admin1_comment" rows="7" name="admin1_comment"
            value="{{ old('admin1_comment') ?: (isset($bugReportApplication->admin1_comment) ? $bugReportApplication->admin1_comment : '') }}">{{ $bugReportApplication->admin1_comment }}</textarea>
        <span style="color:red">@error('admin1_comment'){{ $message }} @enderror</span>
    </div>

</div>
<div class="form-group">
    <label for="category" class="control-label">{{ __('Assign Status') }}</label>
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
    <span class="form-text text-muted">{{ __('Choose which status to be assign') }}</span>
    @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
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
                <p>1. Make sure all the details are filled.</p>
                <p>2. Have you finalized all of your details?</p>
                <p>3. Click confirm submit for save and submit your queries</p>
                <p>4. Click cancel to recheck the queries</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" value="Update">Confirm Submit</button>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Confirm Reject</button>
            </div>
        </div>
    </div>
</div> --}}
