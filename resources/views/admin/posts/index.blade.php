@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-files-o fa-fw"></i>
        Posts
    </h3>
    @if(session()->has('admin-post-created'))
        <div class="alert alert-success">
            <strong>Success!</strong> A new post has been created!
        </div>
    @endif
    @if(session()->has('admin-post-update'))
        <div class="alert alert-success">
            <strong>Success!</strong> The post has been updated!
        </div>
    @endif
    @if(session()->has('admin-post-delete'))
        <div class="alert alert-success">
            <strong>Success!</strong> The post has been deleted!
        </div>
    @endif

    @if($posts)
        <div class="panel panel-default form-group row">
            <div class="panel-body">
                <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>@sortablelink('user_id', 'Author')</th>
                <th>@sortablelink('category_id', 'Category')</th>
                <th>@sortablelink('created_at', 'Created')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td style="max-width: 320px;">{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : 'N/A'}}</td>
                    <td>{{$post->category ? $post->category->name : 'N/A'}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin-posts.edit',$post->id)}}">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" title="Edit"></i>
                        </a>
                    </td>
                    <td>
                        {{--<a href="{{route('admin-posts.delete',$post->id)}}">--}}
                        <a href="#" data-href="{{route('admin-posts.delete',$post->id)}}" data-toggle="modal" data-target="#confirm-delete">
                            <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-lg btn-primary" href="{{route('admin-posts.create')}}">Create post</a>
            {!! $posts->appends(\Request::except('page'))->render() !!}
            {{--{{$posts->links()}}--}}
        </div>
    @endif
    @endsection

@include('partial.modal-confirm-delete')

@section('js-load')
    <script type="text/javascript" src="{{ URL::asset('js/modal-confirm-delete.js') }}"></script>
    @endsection