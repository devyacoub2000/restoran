
@extends('admin.master')

@section('title', 'index')

@section('content')
     @if(session('msg'))
      <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
        {{session('msg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
       </div>
     @endif 
    <h1 class="h3 mb-4 text-gray-800">Food</h1>
    <table class="table table-bordered table-hover">
         <tr class="bg-dark text-white">
             <th>#</th>
             <th>Image</th>
             <th>Name</th>
             <th>Description</th>
             <th>Price</th>
             <th>Meal</th>
             <th>Action</th>
         </tr>

         @forelse($data as $item)
         <tr>
             <td>{{$loop->iteration}}</td>
             <td><img src="{{asset('images/'.$item->image->path)}}" width="150" height="100" style="object-fit: cover;"></td>
             <td>{{$item->name}}</td>
             <td>{{$item->body}}</td>
             <td>${{$item->price}}</td>
             <td>{{$item->meal->name}}</td>
             <td>
                  <a href="{{route('admin.food.edit', $item->id)}}" class="btn btn-info"> <i class="fas fa-edit"></i>
                 </a>
                  <form class="d-inline" action="{{route('admin.food.destroy', $item->id)}}" enctype="multipart/form-data" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" onclick="return confirm('Are u Sure ?')"> <i class="fas fa-trash"></i></button>
                  </form>
             </td>
            </tr> 
         
         @empty
            
               <tr>
                  <td colspan="7" class="text-center"> No Data Found </td>
               </tr>
            
         @endforelse
    </table>

    {{$data->links()}}

@endsection
