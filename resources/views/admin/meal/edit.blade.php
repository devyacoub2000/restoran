
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
           <label for="small_word">  Meal Small Name  </label>
           <input type="text" name="small_word" placeholder="Small Word meal" value="{{old('small_word', $meal->small_word)}}" class="form-control @error('small_word') is-invalid @enderror">
           @error('small_word')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

           <div class="mb-3">       
           <label for="class_icon">  Service Icon Name  </label>
           <input type="text" name="class_icon" placeholder="Name Icon Service" value="{{old('class_icon', $meal->class_icon)}}" class="form-control @error('class_icon') is-invalid @enderror">
           @error('class_icon')
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