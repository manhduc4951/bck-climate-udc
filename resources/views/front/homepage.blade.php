@extends('layouts.front')

@section('pageTitle', 'Homepage')

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
                    </div>
                </div>
                <div class="col-sm-4">
                    <iframe width="100%" height="205" src="https://www.youtube.com/embed/zNQoeuIJb9A" frameborder="0" allowfullscreen></iframe>
                    <div id="latest-new">
                        <h2>Latest News</h2>
                        <div class="latest-new-article">
                            <a class="title">A Major Ocean Current Is Widening as Climate Warms</a>
                            <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                        </div>
                    </div>
                    <div id="latest-new">
                        <div class="latest-new-article">
                            <a class="title">A Major Ocean Current Is Widening as Climate Warms</a>
                            <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                        </div>
                    </div>
                    <div id="latest-new">
                        <div class="latest-new-article">
                            <a class="title">A Major Ocean Current Is Widening as Climate Warms</a>
                            <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--END INTRO-->

    <!--MIDDLE-NAVBAR-->
    <section id="middle-navbar">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#middle-navbar-target">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="middle-navbar-target">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Blogs</a></li>
                            <li><a href="photos.html">Photos</a></li>
                            <li><a href="#">Articles</a></li>
                            <li><a href="references.html">Websites</a></li>
                            <li><a href="#">Conferences</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </section><!--END MIDDLE-NAVBAR-->

    <!--CHANNELS-->
    <section id="channels">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="channel-article">
                        <img src="img/Web_21.jpg">
                        <a class="title">Climate change</a>
                        <p>A host of issues, such as socialization and visceral response, help shape our opinions ...<a class="more" href="javascript:void(0)">More</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="channel-article">
                        <img src="img/Web_21.jpg">
                        <a class="title">Climate change</a>
                        <p>A host of issues, such as socialization and visceral response, help shape our opinions ...<a class="more" href="javascript:void(0)">More</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="channel-article">
                        <img src="img/Web_21.jpg">
                        <a class="title">Climate change</a>
                        <p>A host of issues, such as socialization and visceral response, help shape our opinions ...<a class="more" href="javascript:void(0)">More</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="channel-article">
                        <img src="img/Web_21.jpg">
                        <a class="title">Climate change</a>
                        <p>A host of issues, such as socialization and visceral response, help shape our opinions ...<a class="more" href="javascript:void(0)">More</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="channel-article">
                        <img src="img/Web_21.jpg">
                        <a class="title">Climate change</a>
                        <p>A host of issues, such as socialization and visceral response, help shape our opinions ...<a class="more" href="javascript:void(0)">More</a></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="channel-article">
                        <img src="img/Web_21.jpg">
                        <a class="title">Climate change</a>
                        <p>A host of issues, such as socialization and visceral response, help shape our opinions ...<a class="more" href="javascript:void(0)">More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--END CHANNELS-->

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
                        <!--VOTE POLL-->
                        <?php if(!$votes->isEmpty()): ?>
                        <div id="vote-poll" class="panel panel-default">
                            <div class="panel-body">
                                <h2>Climate Change is</h2>
                                <?php foreach($votes as $vote): ?>
                                <input type="radio" name="vote" value="{{$vote->id}}">
                                &nbsp;
                                {{$vote->description}}<br>
                                <?php endforeach ?>
                                <br>
                                <button class="btn btn-primary" id="vote_button">Vote</button>
                                <a id="result_button" href="javascript:void(0)">Result</a>
                            </div>
                        </div>
                        <?php endif ?>
                        <!--END VOTE POLL-->

                        <!--RESULT-->
                        <div style="display:none" id="vote-result" class="panel panel-default">
                            <div class='panel-body'>
                                <h2>Climate Change is</h2>
                                <div id="vote-result-child">

                                </div>
                                <a id="poll-return-button" href="javascript:void(0)">Return to Poll</a>
                            </div>
                        </div>
                        <!--END RESULT-->

                        <a class="title">About this report</a>
                        <p>A UM Rosenstiel School Agulhas Current study has important implications for global climate. A new study by University of Miami (UM) Rosenstiel School of Marine and Atmospheric...<a class="more" href="javascript:void(0)"> More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--END FEATURES-->
    @endsection

@section('js-load')

<script>
    $(document).ready(function() {
        $('#vote_button').click(function(event) { //Trigger on form submit

            var postForm = { //Fetch form data
                'vote_id' : $('input[name=vote]:checked').val()
            };

            $.ajax({ //Process the form using $.ajax()
                //headers   : {'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')},
                type      : 'POST', //Method type
                url       : './vote-ajax',
                //data      : postForm, //Forms name
                data      : {vote_id: $('input[name=vote]:checked').val()},
                dataType  : 'json',
                success   : function(data) {
                    $('#vote-result').show();
                    $('#vote-result-child').html(data);
                    $('#vote-poll').hide();
                    //console.log(data);
                }
            });
            event.preventDefault(); //Prevent the default submit
        });

        $('#poll-return-button').click(function(){
            $('#vote-result').hide();
            $('#vote-poll').show();
            $('input:radio[name=vote]:checked').prop('checked', false).checkboxradio("refresh");
        });

        $('#result_button').click(function(){
            $.ajax({
                type      : 'POST',
                url       : './vote-result-ajax',
                data      : {data : 1},
                dataType  : 'json',
                success   : function(data) {
                    $('#vote-result').show();
                    $('#vote-result-child').html(data);
                    $('#vote-poll').hide();
                    //console.log(data);
                }
            });
            event.preventDefault(); //Prevent the default submit
        });

    });
</script>
    @endsection