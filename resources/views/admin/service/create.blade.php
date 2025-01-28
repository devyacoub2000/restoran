
@extends('admin.master')

@section('title', 'Create')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create service</h1>

    <form action="{{route('admin.service.store')}}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="mb-3">       
           <label for="name">  Service Name  </label>
           <input type="text" name="name" placeholder="Name Service" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
           @error('name')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

           <div class="mb-3">       
           <label for="class_icon">  Service Icon Name  </label>
           <input type="text" name="class_icon" placeholder="Name Icon Service" value="{{old('class_icon')}}" class="form-control @error('class_icon') is-invalid @enderror">
           @error('class_icon')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

          <div class="mb-3">       
           <label for="body">  Service Description  </label>
           <textarea type="text" name="body" placeholder="Description Service" class="form-control @error('body') is-invalid @enderror" rows="4">
               {{old('body')}}
           </textarea>
           @error('body')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

           

         <div class="mb-3">
              <button class="btn btn-success"> <i class="fas fa-save"></i> Save </button>
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