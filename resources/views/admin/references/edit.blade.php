@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-list fa-fw"></i>
        Edit references
    </h3>
    <div class="col-xs-12">
        {!! Form::model($references,['method' => 'PATCH', 'action' => ['AdminReferencesController@update',$references->id]]) !!}

        <div class="form-group row{{ $errors->has('content') ? ' has-error' : '' }}">

            {!! Form::textarea('content',null,array('class' => 'form-control my-editor', 'placeholder'=>'Content')) !!}

            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            {!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{URL::previous()}}" class="btn btn-lg btn-primary btn-danger">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js-load')

    <script type="text/javascript" src="{{ URL::asset('js/my-editor.js') }}"></script>

@endsection






