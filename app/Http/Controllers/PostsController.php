<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index(Request $request)
    {

        $post =new Post([
                "title" =>$request->title,
                "description" =>$request->description,
                "text" =>$request->text

            ]);
            $post->save();


        if($request->hasFile("file")){
            $files=$request->file("file");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['post_id']=$post->id;
                $request['name']=$imageName;
                $file->move(\public_path("/images"),$imageName);
                File::create($request->all());

            }
        }


    }

    public function getposts()
    {


        $posts = Post::latest()->with('files')->paginate(10);
//        return response()->json(['posts' => $posts]);
        return response()->json( $posts);
    }

    public function showpost($id){
       $posts = $posts = Post::latest()->where('id', $id)->with('files')->get();
        return response()->json(['posts' => $posts]);
    }


    public function destroy($id)
    {
        DB::table('files')->where('post_id', $id)->delete();
        DB::table('posts')->where('id', $id)->delete();



    }

    public function destroyfile($id)
    {
        DB::table('files')->where('id', $id)->delete();
    }

    public function update(Request $request, $id){


        $data=Post::findOrFail($id);

        $data->update([
            "title" =>$request->title,
            "description"=>$request->description,
            "text"=>$request->text,

        ]);


        if($request->hasFile("file")){
            $files=$request->file("file");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $request['post_id']=$id;
                $request['name']=$imageName;
                $file->move(\public_path("/images"),$imageName);
                File::create($request->all());

            }
        }

    }

    public function searching(Request $request)
    {

        $data = Post::where('title', 'LIKE','%'.$request->search.'%')->get();
        return response()->json($data);
    }

    public function searchdata($id){
        $data = Post::where('id', $id)->with('files')->get();
        return response()->json($data);
    }

}
