@extends('layouts.app')

@section('title') Show @endsection

@section('content')

    <div class="card mt-4 container">
        <h5 class="card-header">Post Info</h5>
        <div class="card-body">
        <h5 class="card-title">Title: {{$post['title']}}</h5>
        <p class="card-text">Description: {{$post['description']}}</p>
        </div>
    </div>

    <div class="card mt-4 container">
        <h5 class="card-header">Post Creator Info</h5>
        <div class="card-body">
        <h5 class="card-title">Name: {{$post->user->name}}</h5>
        <p class="card-text">created at: {{$post['created_at']}}</p>
        </div>
    </div>

@endsection
