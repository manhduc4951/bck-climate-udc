<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('css/front/main.css')}}">

</head>
<body>

<!--HEADER-->
<section id="header">
    <div class="container">
        <div class="row">
            <a href="{{url('/')}}"><img id="logo" src="{{URL::asset('images/udc_logo.png')}}" alt="udc logo"></a>
            <?php
                use App\Categories;
                $categories = Categories::where('front',1)->get();
            ?>
            <?php if($categories): ?>
            <ul class="nav navbar-nav " id="top-nav">
                <?php foreach($categories as $category): ?>
                <li class="{{ Request::is($category->path) ? 'active' : '' }}">
                    <a href='{{url("/".$category->path)}}'>{{$category->name}}</a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif ?>
            {{--<ul class="nav navbar-nav " id="top-nav">--}}
                {{--<li class="{{ Request::is('built-environment') ? 'active' : '' }}">--}}
                    {{--<a href="{{url('/built-environment')}}">Built Environment</a>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::is('renewable-energy') ? 'active' : '' }}">--}}
                    {{--<a href="{{url('/renewable-energy')}}">Renewable Energy</a>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::is('impact-on-health') ? 'active' : '' }}">--}}
                    {{--<a href="{{url('/impact-on-health')}}">Impact on health</a>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::is('climate-change') ? 'active' : '' }}">--}}
                    {{--<a href="{{url('/climate-change')}}">Climate change</a>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::is('photos-gallery') ? 'active' : '' }}">--}}
                    {{--<a href="{{url('/photos-gallery')}}">Photos & Gallery</a>--}}
                {{--</li>--}}
                {{--<li class="{{ Request::is('references') ? 'active' : '' }}">--}}
                    {{--<a href="{{url('/references')}}">References & Websites</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </div>
    </div>
</section><!--END HEADER-->

@yield('content')

<section id="footer">
    <div class="container">
        <div class="row">
            <!--CONTACT-->
            <div class="col-sm-4">
                <h2 class="footer-column-header">CONTACT US</h2>
                <p>4200 Connecticut Avenue NW <br>
                    Washington, DC 20008 <br>
                    202.274.5000 <br>
                    Public Safety <br>
                    202.274.5050
                </p>
            </div><!--END CONTACT-->

            <!--CAMPUS-->
            <div class="col-sm-4">
                <h2 class="footer-column-header">CAMPUS</h2>
                <ul>
                    <li><a>Undergraduate</a></li>
                    <li><a>Graduate</a></li>
                    <li><a>Tuition & Fees</a></li>
                    <li><a>Financial Aid</a></li>
                    <li><a>Admissions FAQ</a></li>
                    <li><a>Contact Admissions</a></li>
                    <li><a>Apply</a></li>
                </ul>
            </div><!--END CAMPUS-->

            <!--INFORMATION-->
            <div class="col-sm-4">
                <h2 class="footer-column-header">INFORMATION</h2>
                <ul>
                    <li>
                        <a>About UDC</a>
                        <ul>
                            <li><a>History & Mission</a></li>
                            <li><a>Campus Map</a></li>
                        </ul>
                    </li>
                    <li><a>Office of the President</a></li>
                    <li><a>Tours</a></li>
                    <li><a>Contact</a></li>
                    <li><a>Strategic Plan: Vision 2020</a></li>
                    <li><a>Board of Trustees</a></li>
                    <li><a>UDC TV Schedule</a></li>
                    <li><a>Job Opportunities</a></li>
                </ul>
            </div><!--END INFORMATION-->
        </div>
    </div>
</section><!--END FOOTER-->
<section style="display:block;height:78px;background-color: #000;"></section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('js-load')
</body>
</html>