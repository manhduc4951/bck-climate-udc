@extends('layouts.admin')

@section('content')
    <h3 class="page-header">
        <i class="fa fa-files-o fa-fw"></i>
        Feature Image
    </h3>
    @if(session()->has('admin-post-feature-image-process'))
        <div class="alert alert-success">
            <strong>Success!</strong> Feature image has been updated!
        </div>
    @endif
    <?php
    //var_dump($post->getFeatureImage());die;
    ?>
    <img src="{{$post->getFeatureImage() ? $post->getFeatureImage() : 'http://placehold.it/350x150'}}">

    <div class="col-xs-12">
    {!! Form::model($post,['method' => 'PATCH', 'action' => ['AdminPostsController@featureImageProcess',$post->id], 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group row{{ $errors->has('feature_image') ? ' has-error' : '' }}">
            {!! Form::label('feature_image','Image Upload') !!}
            {!! Form::file('feature_image') !!}

            @if ($errors->has('feature_image'))
                <span class="help-block">
                        <strong>{{ $errors->first('feature_image') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group row">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-lg']) !!}
            <a href="{{route('admin-posts.index')}}" class="btn btn-lg btn-danger">Back to Posts</a>
        </div>

    {!! Form::close() !!}
    </div>
    @endsection