@extends('admin.layouts.app')

@section('content')
    <div>
        <div>
            <h3 class="text-capitalize"> Create Leave Request</h3>
        </div>
        <div class="form-container">
            <form method="post" action="{{ route('admin.leave_request.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="row col-md-6">
                        <div class="form_item col-12">
                            <label class="mt-3 mb-1">From</label>
                            @error('from')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="date" class="form-control form-control-sm" name='from'
                                value=" {{ old('from') }} ">
                        </div>
                        <div class="form_item col-12">
                            <label class="mt-3 mb-1">To</label>
                            @error('from')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="date" class="form-control form-control-sm" name='to'
                                value=" {{ old('to') }} ">
                        </div>
                        <div class="form_item col-12">
                            <label class="mt-3 mb-1">Category</label>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <select name="category" class="form-control form-control-sm">
                                <option value="sick">sick</option>
                                <option value="vacation">vacation</option>
                                <option value="leave">leave</option>
                            </select>
                        </div>
                        <div class="form_item col-12">
                            <label class="mt-3 mb-1">Reason</label>
                            @error('reason')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="text" class="form-control form-control-sm" name='reason'
                                value=" {{ old('reason') }} ">
                        </div>
                    </div>
                    <div class="submit-form-btn-container">
                        <button type="submit" class="btn btn-primary btn-sm mt-3 ">
                            Save Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer-script')
    <script src="{{ asset('assets/admin/js/event-category.js') }}"></script>
@endsection
