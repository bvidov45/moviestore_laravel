@extends('layouts.app')


@section('content')

<div class="card card-default">
  <div class="card-header bg-default">
    <h3 class="text-center">Create Movie</h3>
  </div>
  <div class="card-body">
   
   <form action="{{route('movies.store')}}" method="POST" enctype="multipart/form-data">
   {{csrf_field()}}
   <!--{{ method_field('PUT') }}-->
   <div class="form-group">
    <label for="title">Movie Title</label>
    <input type="text" name="title" class="form-control">
   </div>
   <div class="form-group">
    <label for="category_id">Category</label>
    <select type="text" name="category_id" class="form-control">
    
    @foreach($categories as $category)
       <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    </select>
   </div>
  <div class="form-group">
    <label for="godina">Year</label>
    <select type="text" name="year" class="form-control">
    @for($i= 2018; $i >= 1950; $i-- )
      <option value="{{$i}}">{{$i}}</option>
    @endfor
    </select>
  </div>
  <div class="form-group">
    <label for="duration">Duration</label>
    <input type="text" name="duration" class="form-control">
   </div>
   <div class="form-group">
    <label for="cover_photo">Photo</label>
    <input type="file" name="cover_photo" class="form-control">
   </div>
   <div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" name="description" class="form-control summernote"></textarea>
   </div>
   <div class="text-center">
    <input type="submit" value="Save Movie" class="btn btn-dark">
   </div>
   </form>

  </div>

</div>

@endsection