<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::latest('id')->paginate(10);
        return view('admin.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'body' => 'required',
           'class_icon' => 'required',
        ]);

        Service::create($request->all());

        return redirect()->route('admin.service.index')
        ->with('msg', 'Add Service Successfully')
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
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
           'name' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('admin.service.index')
        ->with('msg', 'Edit Service Successfully')
        ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.service.index')
        ->with('msg', 'Delete Service Successfully')
        ->with('type', 'danger');

    }
}








