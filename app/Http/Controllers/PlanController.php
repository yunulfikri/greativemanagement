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
}
