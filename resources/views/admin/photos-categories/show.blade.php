@section('css-load')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"></link>
    @endsection

@extends('layouts.admin')


@section('content')
    <h3 class="page-header">
        <i class="fa fa-picture-o fa-fw"></i>
        Photo Category: {{$photosCategory->name}}
    </h3>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminPhotosController@store', 'class' => 'dropzone', 'id' => 'myDropzone']) !!}

    {{ Form::hidden('photo_category', $photosCategory->id) }}

    {!! Form::close() !!}

    <?php if(!$photos->isEmpty()): ?>
    <br>
    <div class="container">
        <div class="row>">
            <?php foreach($photos as $photo): ?>
                <div class="col-sm-4">
                    <img style="max-height: 225px;max-width: 300px;margin-bottom: 10px;" src="{{ URL::asset(\App\Photos::$photosModulePath .'/' . $photo->name) }}" alt="{{$photo->name}}">
                    <a style="position: absolute;right:70px;bottom:20px;color:red" href="#" data-href="{{route('admin-photo.delete',$photo->id)}}" data-toggle="modal" data-target="#confirm-delete">
                        <i class="fa fa-trash fa-lg" aria-hidden="true" title="Delete"></i>
                    </a>
                </div>

            <?php endforeach ?>
        </div>
    </div>
    <?php else: ?>
    <?php echo 'There is no image under ' . $photosCategory->name . ' photo category' ?>
    <?php endif ?>






@endsection

@include('partial.modal-confirm-delete')

@section('js-load')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

    {{--<script>--}}
        {{--if(typeof Dropzone != 'undefined')--}}
        {{--{--}}
            {{--Dropzone.autoDiscover = false;--}}
            {{--var myDropzone = new Dropzone("#myDropzone", {--}}
                {{--//url: "data/upload-file.php",--}}
                {{--//maxFileSize: 50,--}}
                {{--//acceptedFiles: ".pdf",--}}
                {{--addRemoveLinks: true,--}}
                {{--//more dropzone options here--}}
            {{--});--}}
        {{--}--}}
    {{--</script>--}}
    <script>
        //var myDropzone = Dropzone("#myDropzone");
        Dropzone.options.myDropzone = {
            maxFilesize: 10, // Mb
            //acceptedFiles: ".png",
            init: function () {
                // Set up any event handlers
                this.on('queuecomplete', function () {
                    location.reload();
                });
            }
        };
    </script>

    <script type="text/javascript" src="{{ URL::asset('js/modal-confirm-delete.js') }}"></script>
    @endsection

