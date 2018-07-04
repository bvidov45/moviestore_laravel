<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MovieStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/toastr.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/main.css')}}" />
    
</head>
<body>
@include('inc.navbar')
<div class="container">
<hr>
  <div class="row col-md-12">
     <div class="col-md-4">
        <ul class="list-group">
          <a href="{{route('categories.create')}}" class="list-group-item list-group-item-action text-center">Create Category</a>
          <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action text-center">Categories</a>
          <a href="{{route('movies.create')}}" class="list-group-item list-group-item-action text-center">Create Movie</a>
          <a href="{{route('movies.index')}}" class="list-group-item list-group-item-action text-center">All Movies</a>
      </ul>
     </div>

     <div class="col-md-8">
        @include('inc.messages')
        @yield('content')
     </div>
    
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script>
  @if(Session::has('message'))
  toastr.success("{{ Session::get('message') }}");
  @endif
  </script>
</body>
</html>