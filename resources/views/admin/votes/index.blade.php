@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-thumbs-o-up fa-fw"></i>
        Vote Questions
    </h3>
    @if(session()->has('admin-vote-created'))
        <div class="alert alert-success">
            <strong>Success!</strong> A new vote question has been created!
        </div>
    @endif
    @if(session()->has('admin-vote-update'))
        <div class="alert alert-success">
            <strong>Success!</strong> The vote question has been updated!
        </div>
    @endif
    @if(session()->has('admin-vote-delete'))
        <div class="alert alert-success">
            <strong>Success!</strong> The vote question has been deleted!
        </div>
    @endif

    @if($votes)
        <div class="panel panel-default form-group row">
            <div class="panel-body">
                <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('description', 'Description')</th>
                <th>@sortablelink('count', 'Count')</th>
                <th>@sortablelink('created_at', 'Created')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th colspan="2">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($votes as $vote)
                <tr>
                    <td>{{$vote->id}}</td>
                    <td>{{$vote->description}}</td>
                    <td>{{$vote->count}}</td>
                    <td>{{$vote->created_at ? $vote->created_at->diffForHumans() : 'N/A'}}</td>
                    <td>{{$vote->updated_at ? $vote->updated_at->diffForHumans() : 'N/A'}}</td>
                    <td>
                        <a href="{{route('admin-votes.edit',$vote->id)}}">
                            <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" title="Edit"></i>
                        </a>
                    </td>
                    <td>
                        {{--<a href="{{route('admin-posts.delete',$post->id)}}">--}}
                        <a href="#" data-href="{{route('admin-vote.delete',$vote->id)}}" data-toggle="modal" data-target="#confirm-delete">
                            <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-lg btn-primary" href="{{route('admin-votes.create')}}">Create new vote question</a>


        </div>
    @endif
@endsection

@include('partial.modal-confirm-delete')

@section('js-load')
    <script type="text/javascript" src="{{ URL::asset('js/modal-confirm-delete.js') }}"></script>
@endsection