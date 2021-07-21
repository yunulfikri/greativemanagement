<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ToolCFabrica;
class ToolCFabricaController extends Controller
{
    public function fabricaindex(){
        $data = ToolCFabrica::latest()->get();
        return Inertia::render('Tool/fabricatool/Show', ['data'=>$data]);
    }
    public function fabricasearch(Request $request){
        $search = ToolCFabrica::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function fabricacreate(){
        return Inertia::render('Tool/fabricatool/Add');
    }
    public function fabricastore(Request $request){
        $data = ToolCFabrica::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function fabricaedit($id){
        $data = ToolCFabrica::find($id);
        if ($data) {
            return Inertia::render('Tool/fabricatool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function fabricaupdate(Request $request){
        $data = ToolCFabrica::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function fabricadestroy(Request $request){
        ToolCFabrica::destroy($request->id);
    }
}
