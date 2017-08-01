@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-thumbs-o-up fa-fw"></i>
        Create a vote question
    </h3>
    <div class="col-xs-12">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminVotesController@store' ]) !!}

        <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
            {!! Form::label('description', 'Question:') !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            {!! Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{url('/admin-votes')}}" class="btn btn-lg btn-primary btn-danger">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js-load')


@endsection




