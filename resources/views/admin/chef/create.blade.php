
@extends('admin.master')

@section('title', 'Create')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create chef</h1>

    <form action="{{route('admin.chef.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="mb-3"> 
           <div class="row"> 
               <div class="col-md-6">     
                   <label for="name">  chef Name  </label>
                   <input type="text" name="name" placeholder="Name" value="{{old('name', $chef->name)}}" class="form-control @error('name') is-invalid @enderror">
                   @error('name')
                     <small class="invalid-feedback"> {{$message}} </small>
                   @enderror
               </div>
           

               <div class="col-md-6">
                     <label for="image"> Image </label>
                      <input onchange="return showImg(event)" type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                        <small class="invalid-feedback"> {{$message}}</small>
                      @enderror
                      @php
                        $src = '';
                        if($chef->image) {
                            $src = asset('images/'.$chef->image->path);
                        }
                      @endphp
                      <img src="{{$src}}" width="100" id="preview">
               </div>

                <div class="col-md-12">     
                   <label for="body">  chef body  </label>
                   <textarea name="body" placeholder="body" class="form-control @error('body') is-invalid @enderror" rows="3">
                       {{old('body', $chef->body)}}
                   </textarea>
                   @error('body')
                     <small class="invalid-feedback"> {{$message}} </small>
                   @enderror
               </div>

           </div>
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