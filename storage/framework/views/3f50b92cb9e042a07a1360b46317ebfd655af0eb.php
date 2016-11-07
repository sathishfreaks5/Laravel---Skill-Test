<!DOCTYPE HTML>
<html>
  <head>
    <title>Sathishkumar - Skills Test</title>
     <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css" >
     <link href="<?php echo e(asset('css/libs.css')); ?>" rel="stylesheet" type="text/css" > 
    <script src="https://code.jquery.com/jquery-2.2.1.min.js" ></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/libs.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/app.js')); ?>"></script> 
  </head>

  <body> 


    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Sathishkumar - Skills Test</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>  
          </ul>

        </div><!--/.nav-collapse -->
      </div>


    </nav>

    <div class="container">

      <?php echo $__env->yieldContent('content'); ?>
      <hr>
    <footer  class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
     <h5 class="text-center">Dev By Sathishkumar | E:sathish_arumugham@outlook.com | Skype: sathishkumar.digital</h5> 
     </div>
    </footer>
      
    </div>

    

  </body>

</html>


