<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result_post = Post::all();

        return view('admin.posts.index',['result_post'=>$result_post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $result_category = DB::table('categories')
                         ->get();

        $result_tag = DB::table('tags')
                         ->get();

        if( $result_category->count() == 0  || $result_tag->count() == 0)
        {
            Session::flash('info','You must have a category and tag to created a post');
            return redirect()->back();
            //return redirect()->route('category.create');
        }
    
        return view('admin.posts.create',['result_category'=>$result_category,'result_tag'=>$result_tag]);
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
            'title'       => 'required|max:255',
            'featured'    => 'image',
            'content'     => 'required',
            'category_id' => 'required',
            'tag'         => 'required'
       ]); 

       $featured            = $request->featured;
       $featured_new_name   = time().$featured->getClientOriginalName();
       $featured->move('uploads/posts/',$featured_new_name);

       $post = Post::create([

            'title'       =>  $request->title,
            'content'     =>  $request->content,
            'featured'    =>  'uploads/posts/'.$featured_new_name,
            'category_id' =>  $request->category_id,
            'slug'        =>  str_slug($request->title),
            'user_id'     =>  Auth::id()   
       ]);

       $post->tags()->attach($request->tag);

       Session::flash('success','You successfully created a post');
       return redirect()->back();
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

        $post       = Post::find($id);
        $category   = Category::all();
        $result_tag = Tag::all();

      

        return view('admin.posts.edit',['post'=>$post,'category'=>$category,'result_tag'=>$result_tag]);
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
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured            = $request->featured;
            $featured_new_name   = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);
            $post->featured       = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tag);

        Session::flash('success','Post has successfully updated');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Post::find($id)
              ->delete();  
        Session::flash('success','Your post was Successfully Trashed');

        return redirect()->back();
    }

    public function trashed()
    {
       $result_post =  Post::onlyTrashed()->get();

       return view('admin.posts.trashed',['result_post'=>$result_post]);
    }

    public function kill($id)
    {
        $result_post = Post::withTrashed()->where('id',$id)->first();

        $result_post->forceDelete();
        @unlink($result_post->featured);

        Session::flash('success','Post has been permanently deleted');

        return redirect()->back();
    }

    public function restore($id)
    {
        $result_post = Post::withTrashed()->where('id',$id)->first();

        $result_post->restore();

        Session::flash('success','Post restored successfully');

        return redirect()->route('posts');
    }
}
