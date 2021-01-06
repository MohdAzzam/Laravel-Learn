@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <h1>Posts</h1>
            <a href="{{route('posts.create')}}" class="float-right btn btn-success">Add</a>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th>Description</th>
                        <th scope="col">Show</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($posts as $item)
                    <tr>
                        <th>{{++$i}}</th>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a href="{{route('posts.show',$item->id)}}" class="btn btn-primary ">Show</a>
                            <a href="{{route('posts.edit',$item->id)}}" class="btn btn-warning ">Edit</a>
                            <a href="{{route('posts.delete',$item->id)}}" class="btn btn-danger ">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection