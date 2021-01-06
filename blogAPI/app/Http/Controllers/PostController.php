<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\Post as ResourcesPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return $this->sendResponse(ResourcesPost::collection($posts), 'Posts Retreved Succefully');
    }
    public function userPosts($id)
    {
        $posts = Post::where('user_id',$id)->get();
        return $this->sendResponse(ResourcesPost::collection($posts), 'Posts Retreved Succefully');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate Error', $validator->errors());
        }
        $user = Auth::user();
        $input['user_id'] = $user->id;
        $post = Post::create($input);
        return $this->sendResponse($post, 'Post created Successfully!');
    }

    
    public function show($id)
    {
        $post=Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found!' );
        }
        return $this->sendResponse(new ResourcesPost($post), 'Post retireved Successfully!' );
    }

    public function update(Request $request, Post $post)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate Error', $validator->errors());
        }
        if($post->user_id != Auth::id()){
            return $this->sendError('You dont have rights', $validator->errors());

        }
        $user = Auth::user();
        $input['user_id'] = $user->id;
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        return $this->sendResponse(new ResourcesPost($post) , 'Post updated Successfully!');

    }

    public function destroy(Post $post)
    {
        if($post->user_id != Auth::id()){
            return $this->sendError('You dont have rights',[]);

        }

        $post->delete();
        return $this->sendResponse(new ResourcesPost($post) , 'This Post deleted Successfully!');

    }
}
