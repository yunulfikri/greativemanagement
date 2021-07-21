<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ToolCrella;

class ToolCrellaController extends Controller
{
    //


    public function crellaindex(){
        $data = ToolCrella::latest()->get();
        return Inertia::render('Tool/crellatool/Show', ['data'=>$data]);
    }
    public function crellasearch(Request $request){
        $search = ToolCrella::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function crellacreate(){
        return Inertia::render('Tool/crellatool/Add');
    }
    public function crellastore(Request $request){
        $data = ToolCrella::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function crellaedit($id){
        $data = ToolCrella::find($id);
        if ($data) {
            return Inertia::render('Tool/crellatool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function crellaupdate(Request $request){
        $data = ToolCrella::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function crelladestroy(Request $request){
        ToolCrella::destroy($request->id);
    }
}
