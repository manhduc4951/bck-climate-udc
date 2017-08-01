@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-list fa-fw"></i>
        References
    </h3>

    @if(session()->has('admin-references-update'))
        <div class="alert alert-success">
            <strong>Success!</strong> The references has been updated!
        </div>
    @endif

    <div class="col-xs-12">
        <div class="panel panel-default form-group row">
            <div class="panel-body"><?php echo $references->content ?></div>
        </div>

        <div class="form-group row">
            <a class="btn btn-lg btn-primary" href="{{route('admin-references.edit',$references->id)}}">Edit References</a>
        </div>
    </div>

















@endsection

