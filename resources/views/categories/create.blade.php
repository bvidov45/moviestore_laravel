@extends('layouts.app')


@section('content')

<div class="card card-default">
  <div class="card-header bg-default">
    <h3 class="text-center">Create Category</h3>
  </div>
  <div class="card-body">
   
   <form action="{{route('categories.store')}}" method="POST">
   {{csrf_field()}}
   <div class="form-group">
    <label for="name">Category</label>
    <input type="text" name="name" class="form-control">
   </div>
   <div class="text-center">
    <input type="submit" value="Save Category" class="btn btn-dark">
   </div>
   </form>

  </div>

</div>

@endsection