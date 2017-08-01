@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-files-o fa-fw"></i>
        Edit a post
    </h3>
    <div class="col-xs-12">
        {!! Form::model($post,['method' => 'PATCH', 'action' => ['AdminPostsController@update',$post->id]]) !!}

        <div class="form-group row{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('category_id') ? ' has-error' : '' }}">
            {!! Form::label('category_id','Category:') !!}

            {!! Form::select('category_id', $categories_array,null, ['class' => 'form-control', 'placeholder' => 'Choose a category']) !!}
            @if ($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row{{ $errors->has('content') ? ' has-error' : '' }}">
            {!! Form::label('content','Content:') !!}

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
            <a href="{{route('admin-post.feature-image',$post->id)}}" class="btn btn-primary btn-lg">Feature Image</a>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('js-load')

    <script type="text/javascript" src="{{ URL::asset('js/my-editor.js') }}"></script>
    {{--<script>--}}
    {{--$(document).ready(function() {--}}
    {{--$('#admin-posts-content').summernote({--}}
    {{--height: 450,--}}

    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection




