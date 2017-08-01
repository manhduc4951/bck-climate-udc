@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-picture-o fa-fw"></i>
        Create a Photos Category
    </h3>
    <div class="col-xs-12">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminPhotosCategoriesController@store' ]) !!}

        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            {!! Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{URL::previous()}}" class="btn btn-lg btn-primary btn-danger">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js-load')


@endsection




