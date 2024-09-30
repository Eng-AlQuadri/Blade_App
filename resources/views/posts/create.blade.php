@extends('layouts.app')

@section('title') Create @endsection

@section('content')

    <div class="container mt-5">
        <form action="{{route('posts.store')}}" method='POST'>
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name='title' type="text" class="form-control" id="exampleFormControlInput1" placeholder="title">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name='postCreator'>
                    <option selected>Post Creator...</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name='userText' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <a href=""><button class="btn btn-primary">Add</button></a>
        </form>
    </div>

@endsection