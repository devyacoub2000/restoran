<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;
class MealController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = meal::latest('id')->paginate(10);
        return view('admin.meal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.meal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
        ]);

        meal::create($request->all());

        return redirect()->route('admin.meal.index')
        ->with('msg', 'Add meal Successfully')
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
    public function edit(Meal $meal)
    {
        return view('admin.meal.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
    {
        $request->validate([
           'name' => 'required',
        ]);

        $meal->update($request->all());

        return redirect()->route('admin.meal.index')
        ->with('msg', 'Edit meal Successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('admin.meal.index')
        ->with('msg', 'Delete meal Successfully')
        ->with('type', 'danger');

    }
}
