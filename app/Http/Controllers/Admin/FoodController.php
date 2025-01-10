<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Meal;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Food::latest('id')->paginate(10);
        return view('admin.food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $food = new Food;
        $meals = meal::select('id', 'name')->get();
        return view('admin.food.create', compact('food', 'meals')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required',
            'price' => 'required',
            'meal_id' => 'required',
            'image' => 'required|image',
        ]);

        $data = Food::create([
             'name' => $request->name,
             'body' => $request->body,
             'price' => $request->price,
             'meal_id' => $request->meal_id,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $data->image()->create([
            'path' => $img_name, 
        ]);

        return redirect()->route('admin.food.index')
        ->with('msg', 'Add Food Successfully')
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
    public function edit(Food $food)
    {
        $meals = Meal::select('id', 'name')->get();
        return view('admin.food.edit', compact('food', 'meals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'meal_id' => 'required',
        ]);

        $food->update([
             'name' => $request->name,
             'body' => $request->body,
             'price' => $request->price,
             'meal_id' => $request->meal_id,
        ]);
        
        if($request->hasFile('image')) {
            if($food->image) {
                File::delete(public_path('images/'.$food->image->path));
                $food->image()->delete();
            }

            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $food->image()->create([
                'path' => $img_name, 
            ]);

        }
        return redirect()->route('admin.food.index')
        ->with('msg', 'Edit Food Successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
         if($food->image) {
                File::delete(public_path('images/'.$food->image->path));
                $food->image()->delete();
         }
         
         $food->delete();
         return redirect()->route('admin.food.index')
        ->with('msg', 'Delete Food Successfully')
        ->with('type', 'danger');
    }
}





