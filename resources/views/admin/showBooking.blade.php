<!DOCTYPE html>
<!--
BOOTSTRAP & HTML5 BOILER PLATE JS JQ INTEGRATION ALTOGETHER
Author: Roronoa Sazzed
Email: mysticyagami7@gmail.com
URL: http://roronoasazzed.com/
-->
<html>
    <head>
        <title>Show Booking</title>
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

        <div class="container-fluid userInfoForAdminDiv">
            <div class="row marginContentBooked">
                <h1 class="bookingHeader  text-capitalize text-center">user booked</h1>
            <!-- 1st user -->

            @foreach($bookinfInfo as $info)    
                <div class="container text-capitalize text-center">
                    <div class="userInfo">
                        <h1><strong>info</strong></h1>
                        <p><b>Name: </b>{{$info->bookedby}}</p>
                        <p><b>Time: </b>{{$info -> time}} </p>
                        <p><b>Hotel: </b>{{$info -> hotel}} </p>
                    </div>
                    <div class="flexBoxAdmin">
                        <div class="flexContent1">
                            <h3><strong>place</strong></h3>
                            <p>{{$info->bookingplace}}</p>
                        </div>


                        <div class="flexContent2">
                            <h3><strong>mobile</strong></h3>
                            <p>{{$info->mobile}}</p>
                        </div>


                        <div class="flexContent3">
                            <h3><strong>trxID</strong></h3>
                            <p>{{$info->TrxID}}</p>
                        </div>


                        <div class="flexContent4">
                            <h3><strong>bill</strong></h3>
                            <p>{{$info->price}}</p>
                        </div>


                        <div class="flexContent5">
                            <h3><strong>confirm / <span style="color: #c0392b;">delete</span></strong></h3>
                            @if($info-> status == "applied")
                                <ul class="list-inline list-unstyled">
                                    <li>
                                        <a class="btn" onclick="confirmInfo{{$info->id}}()">confirm</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-shield"></i>
                                    </li>

                                    <li>
                                        <a class="btn" onclick="deleteInfo{{$info->id}}()" style="background-color: #c0392b;">delete</a>
                                    </li>
                                </ul>

                                <script>
                                        function deleteInfo{{$info->id}}() {
                                            var txt;
                                            if (confirm("Delete booking info of '{{$info->bookedby}}'??")) 
                                            {
                                              self.location = "/admin/del/{{$info->id}}";
                                              //window.open("/js/js_window_location.asp");
                                            } 
                                        }

                                         function confirmInfo{{$info->id}}() {
                                            var txt;
                                            if (confirm("Conform booking info of '{{$info->bookedby}}'??"))
                                             {
                                              self.location = "/admin/confirm/{{$info->id}}";
                                              //window.open("/js/js_window_location.asp");
                                            } 
                                        }
                                </script>

                                @else
                                    <ul class="list-inline list-unstyled">
                                        <li><p>Confirmed</p></li>
                                    </ul>
                            @endif
                        </div>
                    </div>
                </div> <hr>
                @endforeach

            <!-- 2nd user info -->
            <div class="center-block text-center">
                <a class="btn btn-info btn-lg" href="/admin/showBookings/{{$limit}}"> <span class="glyphicon glyphicon-arrow-right"></span> Next</a>
             </div>
        </div>
        </div>

    </body>

</html>