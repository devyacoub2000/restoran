
@extends('admin.master')

@section('title', 'Edit')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Meal</h1>

    <form action="{{route('admin.meal.update', $meal->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('put')

         <div class="mb-3">       
           <label for="name">  meal Name  </label>
           <input type="text" name="name" placeholder="Name meal" value="{{old('name', $meal->name)}}" class="form-control @error('name') is-invalid @enderror">
           @error('name')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>


         <div class="mb-3">
              <button class="btn btn-info"> <i class="fas fa-edit"></i> Edit </button>
         </div>



    </form>
@endsection
@section('js')
   <script type="text/javascript">
          function showImg(e) {
            const [file] = e.target.files;
            if(file) {
               preview.src = URL.createObjectURL(file);
            }
          }
     </script>
@endsection