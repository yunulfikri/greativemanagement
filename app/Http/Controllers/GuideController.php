<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Guide;
class GuideController extends Controller
{
    //
    public function index(){
        $data = Guide::latest()->get();
        return Inertia::render('Guide/Show', ['data' => $data]);
    }
    public function search(Request $request){
        $search = Guide::where('name', 'like', '%' . $request->q . '%')
                ->orWhere('tag', 'like', '%' . $request->q . '%')
                ->get();
        return response()->json($search);
    }
    public function create(){
        return Inertia::render('Guide/Add');
    }
    public function store(Request $request){
        //
        $guide = Guide::create([
            'name' => $request->name,
            'description' => $request->description,
            'tag' => $request->tag,
            'link' => $request->link,
        ]);
        return $guide;
    }
    public function edit($id){
        $data = Guide::find($id);
        if ($data) {
            return Inertia::render('Guide/Edit', ['editdata' => $data]);
        }else{
            abort(404);
        }
    }
    public function update(Request $request){
        $update = Guide::find($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'tag' => $request->tag,
            'link' => $request->link,
        ]);
        return $update;
    }
    public function destroy(Request $request){
        $destroy = Guide::destroy($request->id);
        return $destroy;
    }
}
