<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ToolTMonster;
class ToolTMonsterController extends Controller
{
    //
    public function templatemonsterindex(){
        $data = ToolTMonster::latest()->get();
        return Inertia::render('Tool/templatemonstertool/Show', ['data'=>$data]);
    }
    public function templatemonstersearch(Request $request){
        $search = ToolTMonster::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function templatemonstercreate(){
        return Inertia::render('Tool/templatemonstertool/Add');
    }
    public function templatemonsterstore(Request $request){
        $data = ToolTMonster::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function templatemonsteredit($id){
        $data = ToolTMonster::find($id);
        if ($data) {
            return Inertia::render('Tool/templatemonstertool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function templatemonsterupdate(Request $request){
        $data = ToolTMonster::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function templatemonsterdestroy(Request $request){
        ToolTMonster::destroy($request->id);
    }
}
