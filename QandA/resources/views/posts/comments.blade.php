@foreach($comments as $item)
<div @if($item->parent_id != null)
    style="margin-left:50px";    
@endif>

    <strong>{{$item->user->name}}</strong>
    <p>{{$item->description}}</p>
    <form method="post" action="{{route('comments.store')}}">
        @csrf
      
        <div class="form-group">
            <textarea type="text" name="description"  class="form-control" placeholder="Enter title"></textarea>
            <input type="hidden" name="post_id" value="{{$post_id}}">
            <input type="hidden" name="parent_id" value="{{$item->id}}">
        </div>
        <button type="submit" class="btn btn-primary">Reply</button> 
    </form>
    @include('posts.comments',['comments'=>$item->replies])
</div>

@endforeach