@extends('layouts.app')


@section('content')

<div class="card card-default">
  <div class="card-header bg-default">
    <h3 class="text-center">Update Category</h3>
  </div>
  <div class="card-body">
   
   <form action="{{route('categories.update', ['id' => $category->id])}}" method="POST">
   {{csrf_field()}}
   {{ method_field('PUT') }}
   <div class="form-group">
    <label for="name">Category</label>
    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
   </div>
   <div class="text-center">
    <input type="submit" value="Update Category" class="btn btn-info">
   </div>
   </form>

  </div>

</div>

@endsection