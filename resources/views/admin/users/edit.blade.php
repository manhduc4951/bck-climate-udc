@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-user fa-fw"></i>
        Update an user
    </h3>
    <div class="col-xs-12">
        {!! Form::model($user,['method' => 'PATCH', 'action' => ['AdminUsersController@update',$user->id] ]) !!}

        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('role_id') ? ' has-error' : '' }}">
            {!! Form::label('role_id','Role:') !!}

            {!! Form::select('role_id', $roles,null, ['class' => 'form-control', 'placeholder' => 'Choose a role']) !!}
            @if ($errors->has('role_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('role_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('is_active') ? ' has-error' : '' }}">
            {!! Form::label('is_active','Activated:') !!}

            {!! Form::select('is_active', [0 => "No", 1 => "Yes"],null, ['class' => 'form-control']) !!}
            @if ($errors->has('is_active'))
                <span class="help-block">
                    <strong>{{ $errors->first('is_active') }}</strong>
                </span>
            @endif
        </div>




        <div class="form-group row">
            {!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{URL::previous()}}" class="btn btn-lg btn-primary btn-danger">Cancel</a>
            <a href="{{route('admin-user.change-password',$user->id)}}" class="btn btn-lg btn-primary">Change Password</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js-load')


@endsection




