@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="header">
                    <div class="card-body">
                        <h2 class="text-center text-primary">
                            Q & A System
                        </h2>
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->description}}</p>
                        <hr>
                        <h4>Comments</h4>
                        @include('posts.comments',['comments'=>$post->comments,'post_id'=>$post->id])
                        <hr>
                        <form method="post" action="{{route('comments.store')}}">
                            @csrf

                            <div class="form-group">
                                <textarea type="text" name="description" class="form-control" placeholder="reply "></textarea>
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection