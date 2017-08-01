@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-picture-o fa-fw"></i>
        Photos Categories
    </h3>

    @if(session()->has('admin-photo-category-create'))
        <div class="alert alert-success">
            <strong>Success!</strong> The photo category has been created!
        </div>
    @endif

    @if(session()->has('admin-photo-category-update'))
        <div class="alert alert-success">
            <strong>Success!</strong> The photo category has been updated!
        </div>
    @endif


    @if($photosCategories)
        <div class="panel panel-default form-group row">
            <div class="panel-body">
                <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photosCategories as $photosCategory)
                <tr>
                    <td>{{$photosCategory->id}}</td>
                    <td>{{$photosCategory->name}}</td>
                    <td>{{$photosCategory->created_at ? $photosCategory->created_at->diffForHumans() : 'N/A'}}</td>
                    <td>{{$photosCategory->updated_at ?$photosCategory->updated_at->diffForHumans() : 'N/A'}}</td>
                    <td>
                        <a href="{{route('admin-photos-categories.edit',$photosCategory->id)}}">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" title="Edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-lg btn-primary" href="{{route('admin-photos-categories.create')}}">Create Photos Category</a>

        </div>
    @endif
@endsection

