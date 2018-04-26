<!DOCTYPE html>
<!--
BOOTSTRAP & HTML5 BOILER PLATE JS JQ INTEGRATION ALTOGETHER
Author: Roronoa Sazzed
Email: mysticyagami7@gmail.com
URL: http://roronoasazzed.com/
-->
<html>
    <head>
        <title>Add New Info</title>
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

        <div class="container-fluid addNewInfoDiv">
            <div class="container contentAddInfo">
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <ul>{{ $error }}</ul>
                            @endforeach
                        </ul>
                    </div>
                @endif                
                <div class="col-md-3 col-sm-3"></div>
                <div class="col-md-6 col-sm-6 col-xs-12 backgroundInfo">
                    <h1 class="text-capitalize adminLogInHeader text-center">add new info</h1>
                    <form method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">place name</label><br>
                        <input type="text" name="plcaeName" class="form-control" maxlength="90" required style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;">
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">details</label><br>
                        <textarea class="form-control" name="details" rows="4" maxlength="220" required style="border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;"></textarea>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">hotel</label><br>
                       <input type="text" name="hotel" class="form-control" maxlength="200" required style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;">
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">Map</label><br>
                       <input type="text" name="map" class="form-control" required style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;">
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">capacity</label><br>
                        <input type="number" name="capacity" class="form-control" style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;">
                    </div>
                    <div class="category">
                        <label for="category">category</label>
                        <select class="dropdown options" name="category" required>
                            <option disabled selected value> -- select an option -- </option>
                            <option value="beach">Beach</option>
                            <option value="forest">Forest</option>
                            <option value="hill">Hill</option>
                            <option value="fountain">Fountain</option>
                            <option value="cultural">Cultural places</option>
                            <option value="historic ">Historical places</option>
                        </select>
                    </div>

                    <div class="category">
                        <label for="image">Picture</label>
                        <input type="file" name="image" id="file">
                    </div>

                    <div class="col-md-3 col-sm-3"></div>
                    <input class="btn btnAddInfo text-capitalize" type="submit" value="Add">
                    <!-- <a class="btn btnAddInfo text-capitalize" href="#">add</a> -->
                </form>
                </div>
            </div>
        </div>

    </body>
</html>