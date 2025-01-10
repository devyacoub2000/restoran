<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index() {
        return view('admin.index');
    }

    public function profile() {
      $admin = Auth::user();
      return view('admin.profile_data', compact('admin'));   
    }

    public function profile_data(Request $request) {

       $request->validate([
            'name' => 'required',
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:8|confirmed',
       ]); 

       $admin = Auth::user();
       $data = [
          'name' => $request->name,
       ];
       if($request->has('password')) {
          $data['password'] = bcrypt($request->password);
       }

       $admin->update($data);

       if($request->hasFile('image')) {
          if($admin->image) {
             File::delete(public_path('images/'.$admin->image->path));
             $admin->image()->delete();
          }
      $img = $request->File('image');
      $img_name = rand().time().$img->getClientOriginalName();
      $img->move(public_path('images'), $img_name);
      $admin->image()->create([
               'path' => $img_name,
           ]); 
      return redirect()->back()->with('msg', 'Profile Update Successfully');
        
    }
}

     public function check_password(Request $request) {

         return (Hash::check($request->password, Auth::user()->password));
    }
}
