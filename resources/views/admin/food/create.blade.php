
@extends('admin.master')

@section('title', 'Create')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Create Food</h1>

    <form action="{{route('admin.food.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="mb-3"> 
           <div class="row"> 
               <div class="col-md-6">     
                   <label for="name">  food Name  </label>
                   <input type="text" name="name" placeholder="Name En" value="{{old('name', $food->name)}}" class="form-control @error('name') is-invalid @enderror">
                   @error('name')
                     <small class="invalid-feedback"> {{$message}} </small>
                   @enderror
               </div>
           
           <div class="col-md-6">     
                   <label for="price">  food Price </label>
                   <input type="number" name="price" placeholder="price" value="{{old('price', $food->price)}}" class="form-control @error('price') is-invalid @enderror">
                   @error('price')
                     <small class="invalid-feedback"> {{$message}} </small>
                   @enderror
               </div>


           <div class="col-md-6">     
                   <label for="meal_id">  Food Meal </label>
                   <select name="meal_id" value="{{old('meal_id')}}" class="form-control @error('meal_id') is-invalid @enderror">
                        <option disabled> -- Select Meal --</option>
                         @foreach ($meals as $item)
                             <option value="{{$item->id}}"> {{$item->name}} </option>
                         @endforeach 
                   </select>
                   @error('meal_id')
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
                        if($food->image) {
                            $src = asset('images/'.$food->image->path);
                        }
                      @endphp
                      <img src="{{$src}}" width="100" id="preview">
               </div>

                <div class="col-md-12">     
                   <label for="body">  Food body  </label>
                   <textarea name="body" placeholder="body" class="form-control @error('body') is-invalid @enderror" rows="3">
                       {{old('body', $food->body)}}
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