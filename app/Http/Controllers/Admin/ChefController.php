<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\File;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Chef::latest('id')->paginate(10);
        return view('admin.chef.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $chef = new Chef;
        return view('admin.chef.create', compact('chef'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'name' => 'required',
              'body' => 'required',
              'image' => 'image|required',
        ]);

        $data = Chef::create([
            'name' => $request->name,
            'body' => $request->body,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $data->image()->create([
           'path' => $img_name,
        ]);

        return redirect()->route('admin.chef.index')
        ->with('msg', 'Add Chef Done')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view('admin.chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $request->validate([
          'name' => 'required',
        ]);

        $chef->update([
            'name' => $request->name,
            'body' => $request->body,
        ]);
        
        if($request->hasFile('image')) {
            if($chef->image) {
                File::delete(public_path('images/'.$chef->image->path));
                $chef->image()->delete();
            }
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $chef->image()->create([
               'path' => $img_name,
            ]);
        }

        return redirect()->route('admin.chef.index')
        ->with('msg', 'Edit Chef Done')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        if($chef->image) {
            File::delete(public_path('images/'.$chef->image->path));
            $chef->image()->delete();
        }
        $chef->delete();
        return redirect()->route('admin.chef.index')
        ->with('msg', 'Delete Chef Done')
        ->with('type', 'danger');
    }
}






