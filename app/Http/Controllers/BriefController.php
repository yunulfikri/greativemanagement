<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Brief;
use App\Models\User;

class BriefController extends Controller
{
    //
    public function index(){
        $data = Brief::select('product_brief.*', 'users.name as membername')
                ->join('users', 'users.id', '=', 'product_brief.user_id')->latest()->get();
        return Inertia::render('Brief/Show',['data' => $data]);
    }
    public function search(Request $request){
        $data = Brief::select('product_brief.*', 'users.name as membername')
                ->join('users', 'users.id', '=', 'product_brief.user_id')
                ->where('product_brief.name','like', '%' . $request->q . '%')
                ->orWhere('users.name','like', '%' . $request->q . '%')
                ->latest()->get();
        return response()->json($data);
    }
    public function edit($id){
        $member = User::where('role', 'member')->get();
        $data = Brief::find($id);
        return Inertia::render('Brief/Edit',['member' => $member,'dataedit' => $data]);
    }
    public function create(){
        $member = User::where('role', 'member')->get();
        return Inertia::render('Brief/Add', ['member' => $member]);
    }
    public function store(Request $request){
        $store =  Brief::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'ref' => $request->ref,
            'list' => $request->list,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);
        return 'sukses';
    }
    public function update(Request $request){
        $store =  Brief::find($request->id)->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'ref' => $request->ref,
            'list' => $request->list,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);
        return 'sukses';
    }
}
