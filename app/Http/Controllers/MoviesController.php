<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Category;
use App\Movie;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $movies = Movie::all();
        return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $categories = Category::all();
        return view('movies.create')->with('movies', $movies)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    
    $filenameWithExt = $request->file('cover_photo')->getClientOriginalName();
    $justfilename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $extension = $request->file('cover_photo')->getClientOriginalextension();
    $filenameTostore = $justfilename.'_'.time().'.'.$extension;

    $path = $request->file('cover_photo')->storeAs('public/images', $filenameTostore);
  
   $movie = new Movie;
   $movie->title = $request->input('title');
   $movie->category_id = $request->input('category_id');
   $movie->year = $request->input('year');
   $movie->duration = $request->input('duration');
   $movie->cover_photo = $filenameTostore;
   $movie->description = $request->input('description');
   $movie->save();

   Session::flash('message', 'Movie successfully Created!!!');
   return redirect()->route('movies.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movie::find($id);
        $categories = Category::all();
        return view('movies.edit')->with('movies', $movies)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title' => 'required',
            'category_id' => 'required',
            'year' => 'required',
            'duration' => 'required',
            'description' => 'required'
            
        ]); 
 
       $movie = Movie::find($id);
       $movie->title = $request->input('title');
       $movie->category_id = $request->input('category_id');
       $movie->year = $request->input('year');
       $movie->duration = $request->input('duration');
       
       $movie->description = $request->input('description');


       if ($request->hasFile('cover_photo')){
        $filenameWithExt = $request->file('cover_photo')->getClientOriginalName();
        $justfilename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_photo')->getClientOriginalextension();
        $filenameTostore = $justfilename.'_'.time().'.'.$extension;
        $path = $request->file('cover_photo')->storeAs('public/images', $filenameTostore);
        Storage::delete('public/images/'.$movie->cover_photo);
        $movie->cover_photo = $filenameTostore;
        
    }
      
       $movie->cover_photo = $movie->cover_photo;
       $movie->save();
       Session::flash('message', 'Movie successfully Updated!!!');
       return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        if(Storage::delete('public/images/'.$movie->cover_photo)){
            $movie->delete();
            Session::flash('message', 'Movie successfully Deleted!!!');
            return redirect()->route('movies.index');
        }
       
    }
}
