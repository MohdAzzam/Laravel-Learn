@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('posts.update',$post->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label >Title</label>
                    <input type="text" name="title" value="{{$post->title}}"  class="form-control" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <textarea name="description"  class="form-control" cols="30" rows="10">
                      {{$post->description}}
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection