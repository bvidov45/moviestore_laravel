@extends('layouts.app')


@section('content')

<div class="card card-default">
  <div class="card-header">
    <h3 class="text-center">All Categories</h3>
  </div>
  <div class="card-body">
   <table class="table table-hover">
     <thead>
      <tr>
       <th>Category</th>
      </tr>
     </thead>
     <tbody>
     @foreach($categories as $category)
      <tr>
        <td>{{$category->name}}</td>
        <td class="">
        <a href="{{route('categories.edit', ['id' => $category->id])}}" class="btn btn-info btn-sm">Edit</a>
        </td>
        <td>
        <form action="{{route('categories.destroy', ['id' => $category->id])}}" method="POST" class="text-right">
          {{csrf_field()}}
          {{ method_field('DELETE') }}
         <input type="submit" value="Delete" class="btn btn-danger btn-sm ">
       </form>
      
        </td>
      </tr>
     @endforeach
      </tbody>
   </table>
  </div>

</div>

@endsection