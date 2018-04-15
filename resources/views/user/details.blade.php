<!DOCTYPE html>
<!--
BOOTSTRAP & HTML5 BOILER PLATE JS JQ INTEGRATION ALTOGETHER
Author: Roronoa Sazzed
Email: mysticyagami7@gmail.com
URL: http://roronoasazzed.com/
-->
<html>
    <head>
        <title>Info</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- for icon at tab -->
        <link rel="icon" href="images/logo_icon.png" type="image/x-icon">

        <!-- animation -->
        <link href="animate/animate.css" rel="stylesheet" type="text/css"/>
        <link href="animate/set.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

        <!-- bootstrap integration for css-->
        <link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet">
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- html5 boilerplate integration -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/modernizr-2.8.3.min.js" type="text/javascript"></script>

        <!--font awesome integration -->
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- font integration -->
        <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Old+Standard+TT|Ubuntu+Condensed|Vollkorn|Oswald" rel="stylesheet">


        <!-- linking css file with html -->
        <link href="/css/style.css" type="text/css" rel="stylesheet">

    </head>
    <body>
        <!-- body part start -->

        <div class="container-fluid editInfoDiv">
            <div class="row marginContentEditDiv">
                <div class="container">
                    <h1 class="text-capitalize headerVisit text-center">info</h1>
                    <div class="placesInfo">
                        <h1 class="text-capitalize">place: <span style="color: #27ae60;">{{$place[0]->plcaeName}}</span></h1>
                        <h1 class="text-capitalize">category: <span style="color: #27ae60;">{{$place[0]->category}}</span></h1></h1>
                        <h1 class="text-capitalize">details:</h1>
                        <p>{{$place[0]->details}}</p>
                        <h1 class="text-capitalize">hotel: <span style="color: #27ae60;">{{$place[0]->hotel}}</span></h1>
                        <h1 class="text-capitalize">capacity: <span style="color: #27ae60;">{{$place[0]->capacity}}</span></h1>

                        @foreach($counts as $count)
                        	@if($count-> bookingplace == $place[0]->plcaeName)
                        		<h1 class="text-capitalize">Count: <span style="color: #27ae60;">{{$count -> total}}</span></h1>

                        	@endif
                        @endforeach

                    </div>
                </div>
                <div class="container">
                    <div class="flexBoxEdit">
                        <div class="text-capitalize weatherDiv">
                            <h1 class="headerWeather">weather info</h1>
                            <p style="font-family: 'Allerta Stencil', sans-serif; font-size: 18px;">
                                <img src={{$weatherArray['current_observation']['icon_url']}}> <br>
                                location: {{$weatherArray['current_observation']['display_location']['full']}}<br>
                                temperature: {{$weatherArray['current_observation']['temperature_string']}} <br>
                                condition: {{$weatherArray['current_observation']['weather']}} <br>
                                humidity: {{$weatherArray['current_observation']['relative_humidity']}}<br>
                                visibility: {{$weatherArray['current_observation']['visibility_km']}} km<br>
                                wind: {{$weatherArray['current_observation']['wind_kph']}} km/h
                            </p>
                        </div>
                        <div class="text-capitalize gMap">
                            <h1 class="text-capitalize headerWeather">location</h1>
                            <!-- MAP -->
                            <iframe src={{$place[0]->map}} width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                     <div class="text-center center-block">
                        <a href="#" class="btn btnBookNow text-capitalize">book now</a>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>