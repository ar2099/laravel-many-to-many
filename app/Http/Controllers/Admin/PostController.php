<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Traduttore;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateMail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::orderBy("updated_at", "DESC")->paginate(5);
        //  $categories = Category::all();
        return view("admin.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $categories =  Category::all();
         $traduttores =  Traduttore::all();
         return view( 'admin.create', compact('categories', 'traduttores') );
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dati = $request->all();
        $user = Auth::user();
        // dd($dati);
        $new_post = new Post();

        if (array_key_exists("image", $dati)) {
            $image_url = Storage::put('post_images', $dati["image"]);
        $dati["image"] = $image_url;
        }
        
            $new_post->fill($dati);
            $new_post->slung = Str::slug($new_post->title, '-');
            $new_post->save();
           

           if ( array_key_exists( 'traduttores', $dati ) )  $new_post->traduttores()->attach($dati['traduttores']);

           $mail = new CreateMail();
           Mail::to($user->email)->send($mail);

            return redirect()->route("admin.posts.show", $new_post) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view("admin.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   $traduttores =  Traduttore::all();
        $categories =  Category::all();

        $post_traduttores_id =  $post->traduttores->pluck('id')->toArray();

         return view( 'admin.edit', compact('post', 'categories', "traduttores", "post_traduttores_id") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        
        if (array_key_exists("image", $data)) {
            if( $post->image ) Storage::delete($post->image);
            $image_url = Storage::put('post_images', $data["image"]);
        $data["image"] = $image_url;
        }
        $post['slung'] = Str::slug( $request->title , '-');
        $post->update($data);

         if ( array_key_exists( 'traduttores', $data ) )  $post->traduttores()->sync( $data['traduttores'] );
        
        return redirect()->route( 'admin.posts.show', $post );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         $post->delete();
        return redirect()->route( 'admin.posts.index' );
    }
}
