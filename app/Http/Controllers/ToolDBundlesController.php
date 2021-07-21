<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ToolDBundles;
class ToolDBundlesController extends Controller
{
    //
    public function designbundlesindex(){
        $data = ToolDBundles::latest()->get();
        return Inertia::render('Tool/designbundlestool/Show', ['data'=>$data]);
    }
    public function designbundlessearch(Request $request){
        $search = ToolDBundles::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function designbundlescreate(){
        return Inertia::render('Tool/designbundlestool/Add');
    }
    public function designbundlesstore(Request $request){
        $data = ToolDBundles::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function designbundlesedit($id){
        $data = ToolDBundles::find($id);
        if ($data) {
            return Inertia::render('Tool/designbundlestool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function designbundlesupdate(Request $request){
        $data = ToolDBundles::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function designbundlesdestroy(Request $request){
        ToolDBundles::destroy($request->id);
    }
}
