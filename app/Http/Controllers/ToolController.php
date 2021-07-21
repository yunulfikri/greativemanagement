<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ToolCM;
use App\Models\ToolEtsy;
use App\Models\ToolElement;
use App\Models\ToolCanva;


class ToolController extends Controller
{
    //

    public function index(){
        return Inertia::render('Tool/Index');
    }


    // ------ CM TOOLS CONTROLLER ----------//

    public function cmindex(){
        $data = ToolCM::latest()->get();
        return Inertia::render('Tool/cmtool/Show', ['data'=>$data]);
    }
    public function cmsearch(Request $request){
        $search = ToolCM::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function cmcreate(){
        return Inertia::render('Tool/cmtool/Add');
    }
    public function cmstore(Request $request){
        $data = ToolCM::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function cmedit($id){
        $data = ToolCM::find($id);
        if ($data) {
            return Inertia::render('Tool/cmtool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function cmupdate(Request $request){
        $data = ToolCM::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function cmdestroy(Request $request){
        ToolCM::destroy($request->id);
    }




    // ------ ETSY TOOLS CONTROLLER ----------//

    public function etsyindex(){
        $data = ToolEtsy::latest()->get();
        return Inertia::render('Tool/etsytool/Show', ['data'=>$data]);
    }
    public function etsysearch(Request $request){
        $search = ToolEtsy::where('name', 'like', '%' . $request->q . '%')
        ->orWhere('content', 'like', '%' . $request->q . '%')
        ->get();
        return response()->json($search);
    }
    public function etsycreate(){
        return Inertia::render('Tool/etsytool/Add');
    }
    public function etsystore(Request $request){
        $data = ToolEtsy::create([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function etsyedit($id){
        $data = ToolEtsy::find($id);
        if ($data) {
            return Inertia::render('Tool/etsytool/Edit', ['dataedit'=>$data]);
            
        }else{
            abort(404);
        }

    }
    public function etsyupdate(Request $request){
        $data = ToolEtsy::find($request->id)->update([
            'name' => $request->name,
            'content' => $request->content
        ]);
        return 'sukses';
    }
    public function etsydestroy(Request $request){
        ToolEtsy::destroy($request->id);
    }



        // ------ ELement TOOLS CONTROLLER ----------//

        public function elementindex(){
            $data = ToolElement::latest()->get();
            return Inertia::render('Tool/elementtool/Show', ['data'=>$data]);
        }
        public function elementsearch(Request $request){
            $search = ToolElement::where('name', 'like', '%' . $request->q . '%')
            ->orWhere('content', 'like', '%' . $request->q . '%')
            ->get();
            return response()->json($search);
        }
        public function elementcreate(){
            return Inertia::render('Tool/elementtool/Add');
        }
        public function elementstore(Request $request){
            $data = ToolElement::create([
                'name' => $request->name,
                'content' => $request->content
            ]);
            return 'sukses';
        }
        public function elementedit($id){
            $data = ToolElement::find($id);
            if ($data) {
                return Inertia::render('Tool/elementtool/Edit', ['dataedit'=>$data]);
                
            }else{
                abort(404);
            }
    
        }
        public function elementupdate(Request $request){
            $data = ToolElement::find($request->id)->update([
                'name' => $request->name,
                'content' => $request->content
            ]);
            return 'sukses';
        }
        public function elementdestroy(Request $request){
            ToolElement::destroy($request->id);
        }




              // ------ Canva TOOLS CONTROLLER ----------//

              public function canvaindex(){
                $data = ToolCanva::latest()->get();
                return Inertia::render('Tool/canvatool/Show', ['data'=>$data]);
            }
            public function canvasearch(Request $request){
                $search = ToolCanva::where('name', 'like', '%' . $request->q . '%')
                ->orWhere('content', 'like', '%' . $request->q . '%')
                ->get();
                return response()->json($search);
            }
            public function canvacreate(){
                return Inertia::render('Tool/canvatool/Add');
            }
            public function canvastore(Request $request){
                $data = ToolCanva::create([
                    'name' => $request->name,
                    'content' => $request->content
                ]);
                return 'sukses';
            }
            public function canvaedit($id){
                $data = ToolCanva::find($id);
                if ($data) {
                    return Inertia::render('Tool/canvatool/Edit', ['dataedit'=>$data]);
                    
                }else{
                    abort(404);
                }
        
            }
            public function canvaupdate(Request $request){
                $data = ToolCanva::find($request->id)->update([
                    'name' => $request->name,
                    'content' => $request->content
                ]);
                return 'sukses';
            }
            public function canvadestroy(Request $request){
                ToolCanva::destroy($request->id);
            }
}
