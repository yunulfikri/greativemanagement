<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Plan;
class PlanController extends Controller
{
    //
    public function index(){
        $data = Plan::latest()->get();
        return Inertia::render('Plan/Show',['data' => $data]);
    }
    public function search(Request $request){
        $search = Plan::where('name', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function create(){
        return Inertia::render('Plan/Add');
    }
    public function store(Request $request){
        Plan::create([
            'name' => $request->name,
            'contents' => $request->contents,
            'status' => $request->status
        ]);
        return 'sukses';
    }
    public function edit($id){
        $data = Plan::find($id);
        if ($data) {
            return Inertia::render('Plan/Edit', ['editadata' => $data]);
        }else{
            abort(404);
        }
    }
    public function update(Request $request){
        $data = Plan::find($request->id)->update([
            'name' => $request->name,
            'contents' => $request->contents,
            'status' => $request->status
        ]);
        return 'sukses';
    }
    public function destroy(Request $request){
        Plan::destroy($request->id);
    }
}
