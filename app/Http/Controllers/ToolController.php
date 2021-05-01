<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tool;
class ToolController extends Controller
{
    //
    public function index(){
        $data = Tool::latest()->get();
        return Inertia::render('Tool/Show', ['data'=>$data]);
    }
    public function search(Request $request){
        $search = Tool::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function create(){
        return Inertia::render('Tool/Add');
    }
    public function store(Request $request){
        $data = Tool::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function edit($id){
        $data = Tool::find($id);
        if ($data) {
            return Inertia::render('Tool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function update(Request $request){
        $data = Tool::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function destroy(Request $request){
        Tool::destroy($request->id);
    }
}
