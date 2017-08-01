@extends('layouts.front')

@section('pageTitle','Photos')

@section('content')
    <?php if(!$photosCategories->isEmpty()): ?>
    <!--PHOTO-->
    <section id="photos">
        <div class="container">
            <?php foreach($photosCategories as $photosCategory): ?>
            <?php
            $photos = \App\Photos::where('category',$photosCategory->id)
                ->orderBy('updated_at','desc')
                ->get();
            ?>
            <?php if(!$photos->isEmpty()): ?>
            <!--PHOTOS ROW-->
            <div class="row">
                <div class="col-sm-12">
                    <br><br>
                    <p class="main_text">{{$photosCategory->name}}</p>
                    <br>
                </div>

                <?php foreach($photos as $photo): ?>
                <div class="col-sm-4 single_photo">
                    <img style="max-height: 225px" id="{{$photo->id}}" data-toggle="modal" data-target="#myModal" src="{{URL::asset(\App\Photos::$photosModulePath .'/' . $photo->name)}}" alt="{{$photo->name}}">
                </div>
                <?php endforeach ?>

                <div class="col-sm-12">
                    <p class="main_text">{{$photosCategory->description}}</p>
                </div>
            </div>
            <!--END PHOTOS ROW-->

            {{--Try MODAL HERE--}}
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 850px;">
                        <div class="modal-body" style="max-width: 850px;">
                            <img class="img-responsive" src="" />
                        </div>
                        <div class="modal-footer">
                            <button id="close-modal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif ?>
            <?php endforeach ?>
        </div>
    </section>
    <!--END PHOTO-->
    <?php endif ?>
@endsection

@section('js-load')
<script>
    $(document).ready(function () {
        $('img').on('click', function () {
            var image = $(this).attr('src');
            $('#myModal').on('show.bs.modal', function () {
                $(".img-responsive").attr("src", image);
            });
        });
        $('#close-modal').on('click', function () {
            $('#myModal').css("display","none");
        });
    });
</script>
    @endsection