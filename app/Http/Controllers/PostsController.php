<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\Kernel;
use Carbon\Carbon;
use App\Post;
use DB;
class PostsController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->except(['index','show']);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::latest()->filter(request(['month','year']))->get();

        // $posts=Post::latest();
        // if ($month=request('month')) {
        //   $posts->whereMonth('created_at',Carbon::parse($month)->month);
        // }
        // if ($year=request('year')) {
        //   $posts->whereYear('created_at',$year);
        // }
        //
        //   $posts=$posts->get();


        //$archives=Post::archives();
        return view('posts.index',compact('posts','archives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'title'=>'required|min:2',
          'body'=>'required|min:2'
        ]);
        auth()->user()->publish(
          new Post(request(['title','body']))
        );

        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
