
@extends('admin.master')

@section('title', 'Edit')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit service</h1>

    <form action="{{route('admin.service.update', $service->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('put')

         <div class="mb-3">       
           <label for="name">  Service Name  </label>
           <input type="text" name="name" placeholder="Name Service" value="{{old('name', $service->name)}}" class="form-control @error('name') is-invalid @enderror">
           @error('name')
             <small class="invalid-feedback"> {{$message}} </small>
           @enderror
          </div>

          <div class="mb-3">       
           <label for="body">  Service Description  </label>
           <textarea type="text" name="body" placeholder="Description Service" class="form-control @error('body') is-invalid @enderror" rows="4">
               {{old('body', $service->body)}}
           </textarea>
           @error('body')
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