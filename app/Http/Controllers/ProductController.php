<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::latest()->paginate(10);
        return Inertia::render('Product/Show', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Product/Add');

    }

    public function search(Request $request){
        $search = Product::where('name', 'like', '%' . $request->q . '%')->paginate(10);
        return response()->json($search);
    }

    public function searchcategory(Request $request){
        $search = Product::where('category', $request->q)->paginate(10);
        return response()->json($search);
    }

    public function quickupdate(Request $request){
        Product::find($request->id)->update([
            $request->market => $request->value
        ]);
        return 'sukses';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = Product::create([
            'name' => $request->name,
            'status' => $request->status,
            'category' => $request->category,
            'CreativeMarket' => $request->Creativemarket,
            'Website' => $request->Website,
            'Element' => $request->Element,
            'Canva' => $request->Canva,
            'Etsy' => $request->Etsy,
            'DesignBundles' => $request->DesignBundles,
            'Crella' => $request->Crella,
            'TemplateMonster' => $request->TemplateMonster,
            'Dafont' => $request->Dafont,
            'TheHungryJPEG' => $request->TheHungryJPEG,
            'FDR' => $request->FDR
        ]);
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Product::find($id);
        if ($data) {
            # code...
            return Inertia::render('Product/Edit', ['productdata' => $data]);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $product = Product::find($request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'category' => $request->category,
            'CreativeMarket' => $request->Creativemarket,
            'Website' => $request->Website,
            'Element' => $request->Element,
            'Canva' => $request->Canva,
            'Etsy' => $request->Etsy,
            'DesignBundles' => $request->DesignBundles,
            'Crella' => $request->Crella,
            'TemplateMonster' => $request->TemplateMonster,
            'Dafont' => $request->Dafont,
            'TheHungryJPEG' => $request->TheHungryJPEG,
            'FDR' => $request->FDR
        ]);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $destroy = Product::destroy($request->id);
        return $destroy;
    }
}
