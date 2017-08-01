@extends('layouts.front')

@section('pageTitle','Built Environment')

@section('content')
    <!--HEADER-VIDEO-->
    <section id="header-video">
        <!--<div class="container">-->
        <!--<div class="row">            -->
        <!--<iframe width="100%" height="460" src="https://www.youtube.com/embed/BBsPnHAp9hU" frameborder="0" allowfullscreen></iframe>-->
        <!--</div>-->
        <!--</div>-->
        @if($videoEmbedLink)
            <div class="video-container">
                <iframe width="100%" height="460" src="{{$videoEmbedLink}}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif
    </section><!--END HEADER-VIDEO-->

    <!--INTRO-->
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="intro-article">
                        <p>The University of the District of Columbia is marshaling the collective problem-solving
                            muscle of all its schools and colleges to help answer a mosaic of complex questions
                            about the science of climate change. The University of the District of Columbia is
                            marshaling the collective problem-solving muscle of all its schools and colleges to
                            help answer a mosaic of complex questions about the science of climate change</p>
                        <p>The University of the District of Columbia is marshaling the collective problem-solving
                            muscle of all its schools and colleges to help answer a mosaic of complex questions
                            about the science of climate change. The University of the District of Columbia is
                            marshaling the collective problem-solving muscle of all its schools and colleges to
                            help answer a mosaic of complex questions about the science of climate change</p>
                        <p>The University of the District of Columbia is marshaling the collective problem-solving
                            muscle of all its schools and colleges to help answer a mosaic of complex questions
                            about the science of climate change. The University of the District of Columbia is
                            marshaling the collective problem-solving muscle of all its schools and colleges to
                            help answer a mosaic of complex questions about the science of climate change</p>
                        <img src="img/enrivonment_avatar.png" >
                    </div>
                    <div class="intro-article">
                        <p>The University of the District of Columbia is marshaling the collective problem-solving
                            muscle of all its schools and colleges to help answer a mosaic of complex questions
                            about the science of climate change. The University of the District of Columbia is
                            marshaling the collective problem-solving muscle of all its schools and colleges to
                            help answer a mosaic of complex questions about the science of climate change</p>
                        <p>The University of the District of Columbia is marshaling the collective problem-solving
                            muscle of all its schools and colleges to help answer a mosaic of complex questions
                            about the science of climate change. The University of the District of Columbia is
                            marshaling the collective problem-solving muscle of all its schools and colleges to
                            help answer a mosaic of complex questions about the science of climate change</p>
                        <p>The University of the District of Columbia is marshaling the collective problem-solving
                            muscle of all its schools and colleges to help answer a mosaic of complex questions
                            about the science of climate change. The University of the District of Columbia is
                            marshaling the collective problem-solving muscle of all its schools and colleges to
                            help answer a mosaic of complex questions about the science of climate change</p>
                        <img src="img/enrivonment_avatar.png" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="latest-new">
                        <div class="latest-new-article">
                            <img src="img/enviroment2.png">
                            <a class="title">A Major Ocean Current Is Widening as Climate Warms</a>
                            <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                        </div>
                    </div>
                    <div id="latest-new">
                        <div class="latest-new-article">
                            <img src="img/enviroment3.png">
                            <a class="title">A Major Ocean Current Is Widening as Climate Warms</a>
                            <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--END INTRO-->

    <!--FEATURES-->
    <section id="features">
        <div class="container">
            <div class="col-sm-8">
                <div class="intro-article">
                    <p>The University of the District of Columbia is marshaling the collective problem-solving
                        muscle of all its schools and colleges to help answer a mosaic of complex questions
                        about the science of climate change. The University of the District of Columbia is
                        marshaling the collective problem-solving muscle of all its schools and colleges to
                        help answer a mosaic of complex questions about the science of climate change</p>
                    <p>The University of the District of Columbia is marshaling the collective problem-solving
                        muscle of all its schools and colleges to help answer a mosaic of complex questions
                        about the science of climate change. The University of the District of Columbia is
                        marshaling the collective problem-solving muscle of all its schools and colleges to
                        help answer a mosaic of complex questions about the science of climate change</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="latest-new">
                    <div class="latest-new-article">
                        <a class="title">About this report</a>
                        <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--END FEATURES-->
@endsection