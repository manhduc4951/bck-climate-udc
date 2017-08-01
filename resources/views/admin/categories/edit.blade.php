@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-tags fa-fw"></i>
        Edit a category
    </h3>
    <div class="col-xs-12">
        {!! Form::model($category,['method' => 'PATCH', 'action' => ['AdminCategoriesController@update',$category->id]]) !!}

        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Category Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('video_embed_link') ? ' has-error' : '' }}">
            {!! Form::label('video_embed_link', 'Video Embed Link:') !!}
            {!! Form::text('video_embed_link', null, ['class' => 'form-control']) !!}
            @if ($errors->has('video_embed_link'))
                <span class="help-block">
                    <strong>{{ $errors->first('video_embed_link') }}</strong>
                </span>
            @endif
        </div>

        <!--VIDEO HERE-->
        @if($category->video_embed_link)
        <div class="video-container">
            <iframe width="100%" height="460" src="{{$category->video_embed_link}}" frameborder="0" allowfullscreen></iframe>
        </div>
        @endif

        <div class="form-group row">
            {!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{URL::previous()}}" class="btn btn-lg btn-primary btn-danger">Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection






