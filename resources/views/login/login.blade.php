<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>
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
        <link href="css/style.css" type="text/css" rel="stylesheet">

    </head>
    <body>
        <!-- body part start -->

        <div class="container-fluid adminLogin">
            <div class="container contentAdminLogin">
                @if(isset($error))
                <div class="alert alert-danger text-center">
                    <ul>{{$error}}<ul>
                </div>
                @endif

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
                <div class="col-md-6 col-sm-6 col-xs-12 background">
                    <h1 class="text-capitalize adminLogInHeader text-center">User panel</h1>
                    <form method="post">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">email</label><br>
                        <input type="email" name="email" class="form-control" style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;">
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <label class="text-capitalize">password</label><br>
                        <input type="password" name="password" class="form-control" style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; color:white;">
                    </div>
                    <input class="btn btnAdminLogIn text-capitalize" type="submit" value="Login">
                    <!-- <a class="btn btnAdminLogIn text-capitalize" href="#">log in</a> -->
                </form>
                </div>
                <div class="col-md-3 col-sm-3"></div>
            </div>
        </div>











        <!-- body part end -->



        <!-- ::::: java script integration ::::: -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

        <!-- bootstrap & html5 boilerplate integration for js start -->       
        <script>window.jQuery || document.write('<script src="js/jquery-1.12.4.min.js"><\/script>')</script>
        <script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript">

        </script>
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>


    </body>
</html>