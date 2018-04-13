<!DOCTYPE html>
<html>
    <head>
        <title>Welcome!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- for icon at tab -->
        <link rel="icon" href="images/logo_icon.png" type="image/x-icon">

        <!-- bootstrap integration for css-->
        <link href="css/bootstrap-theme.css" type="text/css" rel="stylesheet">
        <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <!--font awesome integration -->
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

        <!-- font integration -->
        <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Old+Standard+TT|Ubuntu+Condensed|Vollkorn|Oswald" rel="stylesheet">


        <!-- linking css file with html -->
        <link href="css/style.css" type="text/css" rel="stylesheet">

    </head>
    <body>
        <!-- body part start -->

        <div class="container-fluid userHome">
            <div class="row contentUserHome">
                <div class="container">
                    <ul class="text-capitalize list-inline list-unstyled text-center center-block">
                        <li>
                            <a class="btn" href="/autoSuggest">auto suggest</a>
                        </li>
                        <li>
                            <a class="btn" href="/myBookings">my bookings</a>
                        </li>
                        <li>
                            <a class="btn" href="changePass">change password</a>
                        </li>
                        <li>
                            <a class="btn" href="/logout">logout</a>
                        </li>
                    </ul>
                </div>
                <div class="container">
                    <div class="text-capitalize text-center marginUserHeader">
                        <h1 class="userHeader">welcome <b>{{session('user')}}</b> to the intelligent travel guide<br>
                        <span>your journey starts here</span></h1>
                        <label class="text-capitalize">enter place name</label><br>
                        <form method="post" action="/details">
                        <input type="text" class="form-control" name="place" id="country"  style="height: 40px; border-radius: 0px; background-color: transparent; border: 1px solid white; width: 50%; margin: 1% auto; color: white" autocomplete="off">
                         <div style="border-radius: 0px; border: 1px solid white; width: 50%; margin: 1% auto; background-color: white" id="countryList"></div><br>
                         <input class="btn text-capitalize btnSearch" type="submit" value="search">
                       </form>
                    </div>
                </div>
            </div>
        </div>
 </body>
 </html>

 <script>  
 $(document).ready(function(){ 
      $('#countryList').fadeOut();  
      $('#country').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                     }  
                });  
           }
           else{
            $('#countryList').fadeOut(); 
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#country').val($(this).text());  
           $('#countryList').fadeOut();  
      });  
 });  
 </script>  