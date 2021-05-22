<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Inertia\Inertia;
use App\Models\File;

class FileController extends Controller
{
    //

    public function index()
    {
        # code...
        $data = File::select('files.*', 'users.name as uploader')
                ->join('users', 'users.id', '=', 'files.uploader')
                ->latest()->limit(100)
                ->get();
        return Inertia::render('FileUpload/Index', ['files' => $data]);
    }
    public function upload(Request $request)
    {
        # code for file upload
        $path = $request->file('filedata')->store('public/archive');
        $user = Auth::user();
        $filename = '';
        if ($request->name == '')
        {  
            $filename = $request->file('filedata')->getClientOriginalName(); 
        } else { 
            $filename = $request->name;
        }
        File::create([
            'name' => $filename,
            'path' => $path,
            'originalname' => $request->file('filedata')->getClientOriginalName(),
            'uploader' => $user->id,

        ]);
        return redirect()->route('file.index');
    }
    public function download($id){
        $data = File::find($id);
        return Storage::download($data->path, $data->originalname);
    }

    public function destroy($id){
        $data = File::find($id);
        Storage::delete($data->path);
        File::destroy($id);
        return redirect()->route('file.index');
    }
}
