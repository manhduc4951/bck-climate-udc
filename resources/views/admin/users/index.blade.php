@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-user fa-fw"></i>
        Users
    </h3>
    @if(session()->has('admin-user-created'))
        <div class="alert alert-success">
            <strong>Success!</strong> A new user has been created!
        </div>
    @endif
    @if(session()->has('admin-user-update'))
        <div class="alert alert-success">
            <strong>Success!</strong> The user has been updated!
        </div>
    @endif
    @if(session()->has('admin-user-delete'))
        <div class="alert alert-success">
            <strong>Success!</strong> The user has been deleted!
        </div>
    @endif

    @if($users)
        <div class="panel panel-default form-group row">
            <div class="panel-body">
                <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('role_id', 'Role')</th>
                <th>@sortablelink('is_active', 'Activated')</th>
                <th>@sortablelink('created_at', 'Created')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'N/A'}}</td>
                    <td>{{$user->showActiveIcon()}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('admin-users.edit',$user->id)}}">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" title="Edit"></i>
                        </a>
                    </td>
                    <td>
                        {{--<a href="{{route('admin-posts.delete',$post->id)}}">--}}
                        <a href="#" data-href="{{route('admin-user.delete',$user->id)}}" data-toggle="modal" data-target="#confirm-delete">
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
            <a class="btn btn-lg btn-primary" href="{{route('admin-users.create')}}">Create user</a>
            {!! $users->appends(\Request::except('page'))->render() !!}

        </div>
    @endif
@endsection

@include('partial.modal-confirm-delete')

@section('js-load')
    <script type="text/javascript" src="{{ URL::asset('js/modal-confirm-delete.js') }}"></script>
@endsection