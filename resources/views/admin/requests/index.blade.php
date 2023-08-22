@extends('admin.layouts.app')
<?php
$role = auth()->user()->role;
?>
@section('content')
<div>
    <div>
        <h3 class="text-capitalize"> Leave Request List</h3>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Eployee</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Status</th>
                @if ($role=='manager')
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $r)
            <tr>
                <td scope="col">{{ $r->employee }}</td>
                <td scope="col">{{ $r->from }}</td>
                <td scope="col">{{ $r->to }}</td>
                <td scope="col">{{ $r->status }}</td>
                @if ($role=='manager')
                <td scope="col">
                    @if ($r->status!='approved')
                    <form action="/admin/leave-approve/{{$r->id}}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-primary">Approve</button>
                    </form>
                    @endif
                    @if ($r->status!='rejected')
                    <form action="/admin/leave-reject/{{$r->id}}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-danger">Reject</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('assets/admin/js/event-category.js') }}"></script>
@endsection