<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveRequestController extends Controller
{
    public function index()
    {      
        $requests       = DB::table('leave_requests')->get();
        return view('admin.requests.index',[
            'requests' => $requests
        ]);
    }

    public function create()
    {
        return view('admin.requests.create');
    }

    public function store(Request $request)
    {
        DB::table('leave_requests')->insert([
            'employee' => auth()->user()->name,
            'from' => $request->from,
            'to' => $request->to,
            'category' => $request->category,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.leave_request.index');
    }

    public function approve($id)
    {
        DB::table('leave_requests')->where('id',$id)
        ->update([
            'status' => 'approved'
        ]);

        return redirect()->back();
    }

    public function reject($id)
    {
        DB::table('leave_requests')->where('id',$id)
        ->update([
            'status' => 'rejected'
        ]);
        return redirect()->back();
    }
}
