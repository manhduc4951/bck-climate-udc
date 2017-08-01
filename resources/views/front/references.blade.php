@extends('layouts.front')

@section('pageTitle','References')

@section('content')
    <?php if($references): ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-default form-group row">
                    <div class="panel-body"><?php echo $references->content ?></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>
@endsection