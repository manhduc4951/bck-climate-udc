@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-tags fa-fw"></i>
        Categories
    </h3>

    @if(session()->has('admin-category-update'))
        <div class="alert alert-success">
            <strong>Success!</strong> The category has been updated!
        </div>
    @endif


    @if($categories)
        <div class="panel panel-default form-group row">
            <div class="panel-body">
                <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('created_at', 'Created')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'N/A'}}</td>
                    <td>{{$category->updated_at ?$category->updated_at->diffForHumans() : 'N/A'}}</td>
                    <td>
                        <a href="{{route('admin-categories.edit',$category->id)}}">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" title="Edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>
        </div>
    @endif
@endsection

