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
}
