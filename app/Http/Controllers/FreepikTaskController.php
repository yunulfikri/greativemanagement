<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\FreepikTask;
use App\Models\User;

class FreepikTaskController extends Controller
{
    //
    public function index(){
        $data = FreepikTask::select('freepik_tasks.*', 'users.name as membername')
        ->join('users', 'users.id', '=', 'freepik_tasks.member_id')
        ->latest()->get();
        return Inertia::render('Task/Show',['data' => $data]);
    }
    public function search(Request $request){
        $data = FreepikTask::select('freepik_tasks.*', 'users.name as membername')
        ->join('users', 'users.id', '=', 'freepik_tasks.member_id')
        ->where('freepik_tasks.name','like', '%' . $request->q . '%')
        ->latest()->get();
        return response()->json($data);
    }
    public function create(){
        $member = User::where('role', 'member')->get();
        return Inertia::render('Task/Add', ['member' => $member]);
        
    }
    public function store(Request $request){
        FreepikTask::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'ref' => $request->ref,
            'deadline' => $request->deadline,
            'member_id' => $request->user_id,
            'status' => $request->status
        ]);
        return 'sukses';
    }
    public function edit($id){
        $member = User::where('role', 'member')->get();
        $data = FreepikTask::find($id);
        return Inertia::render('Task/Edit', ['member'=>$member, 'dataedit' => $data]);
    }
    public function update(Request $request){
        FreepikTask::find($request->id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'ref' => $request->ref,
            'deadline' => $request->deadline,
            'member_id' => $request->user_id,
            'status' => $request->status
        ]);
        return 'sukses';
    }
    public function destroy(Request $request){
        $destroy = FreepikTask::destroy($request->id);
        return $destroy;
    }
}
