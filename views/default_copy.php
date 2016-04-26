<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="shortcut icon" href="img/nlc.ico" type="image/x-icon" />

   <!-- Bootstrap core CSS -->
   <link href="./css/bootstrap.min.css" rel="stylesheet">

   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <link href="./css/ie10-viewport-bug-workaround.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <!--<link href="./css/navbar-fixed-top.css" rel="stylesheet">-->
   <link href="./css/carousel.css" rel="stylesheet">

   <!--<link href="./css/style.css" rel="stylesheet">-->
   <?php
      if(isset($this->page))
   	{
         $file = 'content/sections/'.$this->section.'/'.$this->page.'/head.php';
         includeFile($file,'head');
   	}
   	else
   	{
   		if(isset($this->section))
   		{
            $file = 'content/sections/'.$this->section.'/head.php';
            echo '<meta name="test" content="'.$file.'">';
            includeFile($file,'head');
   		}
   		else
   		{
   			include 'content/default_head.php';
   		}
   	}
   ?>
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>
<body data-pinterest-extension-installed="cr1.39.1">
<?php

   include 'content/header.php';
   echo '<div class="container">';
   if(isset($this->page))
	{
      $file = 'content/sections/'.$this->section.'/'.$this->page.'/default.php';
      includeFile($file,'content');
	}
	else
	{
		if(isset($this->section))
		{
         $file = 'content/sections/'.$this->section.'/default.php';
         includeFile($file,'content');
		}
		else
		{
			include 'content/homepage.php';
		}
	}
   include 'content/footer.php';
   echo '</div>';
?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="./js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="./js/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
