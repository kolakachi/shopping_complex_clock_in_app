<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/shoppingC.css">

</script><script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<header>
     <nav class="navbar navbar-default tt" role="navigation">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#drop">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="/">ShoppingComplex</a>
       </div>
       <div class="tt collapse navbar-collapse" id="drop">
         <ul class=" nav navbar-nav navbar-right">
           <li><a href="/reports">Manage Reports </a></li>
           <li><a href="/">Manage Stores</a></li>
           <li><a href="/logout">Log out</a></li>
          
         </ul>
       </div>
     </nav>
   </header>
   @yield('content')
   </body>
</html>
