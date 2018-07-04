@extends('layouts.app')


@section('content')

<div class="card card-default">
  <div class="card-header">
    <h3 class="text-center">All Movies</h3>
  </div>
  <div class="card-body">
   <table class="table table-hover">
     <thead>
      <tr>
       <th>Title</th>
       <th>Year</th>
       <th>Cover Photo</th>
      </tr>
     </thead>
     <tbody>
       @foreach($movies as $movie)
       <tr>
         <th>{{$movie->title}}</th>
         <th>{{$movie->year}}</th>
        
         <th>{{$movie->category->name}}</th>
         <th><img src="storage/images/{{$movie->cover_photo}}" style="height:100px;"></th>
         <th><a href="{{route('movies.edit', ['id' => $movie->id])}}" class="btn btn-info btn-sm">Edit</a></th>
         <th>
         <form action="{{route('movies.destroy', ['id' => $movie->id])}}" method="POST" enctype="multipart/form-data">
         {{csrf_field()}}
         {{ method_field('DELETE') }}
         <input type="submit" value="Delete Movie" class="btn btn-warning btn-sm">
          </form>
         </th>
       </tr>
       @endforeach
      </tbody>
   </table>
  </div>

</div>

@endsection