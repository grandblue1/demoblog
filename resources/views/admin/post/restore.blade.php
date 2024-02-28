{{-- resources/views/admin/posts/index.blade.php --}}

@extends('adminlte::page')

@section('content_header')
    <h1 class="text-center mb-5">Posts</h1>
@stop

@section('content')
    <div class="container">
        <table class="table">
            <thead class="mb-5">
                <tr>
                    <th class="border-right text-center">ID</th>
                    <th class="border-right text-center border-left">Title</th>
                    <th class="border-right text-center border-left">Category</th>
                    <th class="border-right text-center border-left">Tags</th>
                    <th class="border-right text-center">Deleted At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="text-center">{{ $post->id }}</td>
                        <td class="text-center">{{ $post->title }}</td>
                        <td class="text-center">{{ $post->category->title }}</td>
                        <td class="text-center">
                            @foreach ($post->tags as $tag )
                               {{ $tag->title }}
                            @endforeach    
                        </td>
                        <td class="text-center">{{ $post->deleted_at }}</td>
                        <td class="d-flex justify-content-around align-items-center text-center" style="min-height: 65px"> 
                            <form action="{{route('admin.posts.restore.restore',$post->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="bg-transparent border-0">Restore&nbsp;&nbsp;<i class="fa text-primary fa-undo"></i></button>
                            </form>
                        </td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>
    </div>
@stop
