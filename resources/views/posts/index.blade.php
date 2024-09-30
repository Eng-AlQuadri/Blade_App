@extends('layouts.app')

@section('title') Index @endsection

@section('content')

    <div class='text-center mt-4'>
        <a href="{{route('posts.create')}}"><button type="button" class="btn btn-success text-center">Create Post</button></a>
    </div>

    <table class="table container mt-4">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row"> {{ $post->id }} </th>
                <td> {{ $post->title }} </td>
                <td> {{ $post['posted_by'] }} </td>
                <td> {{ $post->created_at }} </td>
                <td>
                    <a href="{{route('posts.show', $post['id'])}}" class='btn btn-info'>View</a>
                    <a href="{{route('posts.edit', $post['id'])}}" class='btn btn-primary'>Edit</a>
                    <form style='display:inline' action="{{route('posts.destroy', $post['id'])}}" method='POST'>
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
