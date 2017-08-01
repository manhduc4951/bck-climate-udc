@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-user fa-fw"></i>
        Change user's password
    </h3>
    @if(session()->has('admin-user-change-password'))
        <div class="alert alert-success">
            <strong>Success!</strong> Password has been changed!
        </div>
    @endif

    <div class="col-xs-12">
        {!! Form::model($user,['method' => 'PATCH', 'action' => ['AdminUsersController@changePasswordProcess',$user->id] ]) !!}

        {{--Show user name and email here ???--}}
        <div class="form-group row">
            {!! Form::label('id','ID:') !!}
            {{$user->id}}
        </div>
        <div class="form-group row">
            {!! Form::label('user','Username: ') !!}
            {{$user->name}}
        </div>
        <div class="form-group row">
            {!! Form::label('email','Email: ') !!}
            {{$user->email}}
        </div>

        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password_confirmation', 'Password (confirm):') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group row">
            {!! Form::submit('Change', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{route('admin-users.index')}}" class="btn btn-lg btn-primary btn-danger">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js-load')


@endsection




