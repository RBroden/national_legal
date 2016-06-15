<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/nlc.ico" type="image/x-icon" />

    <!-- Bootstrap core CSS -->
    <link href="<?=$this->resource?>css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?=$this->resource?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="<?=$this->resource?>css/style.css?v1" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <?php
    if(isset($this->page) && !empty($this->page))
   	{
         $file = $this->resource . 'content/sections/'.$this->section.'/'.$this->page.'/head.php';
         includeFile($file,'head');
   	}
   	else
   	{
   		if(isset($this->section) && !empty($this->section))
   		{
            $file = $this->resource . 'content/sections/'.$this->section.'/head.php';
            echo '<meta name="test" content="'.$file.'">';
            includeFile($file,'head');
   		}
   		else
   		{
   			include $this->resource . 'content/default_head.php';
   		}
   	}
   ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-76622846-1', 'auto');
      ga('send', 'pageview');

    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<!-- NAVBAR
================================================== -->
<body data-ng-app="siteApp">
    <?php
        include $this->resource . 'content/header.php';
        if(isset($this->page) && !empty($this->page))
        {
            $file = $this->resource . 'content/sections/'.$this->section.'/'.$this->page.'/default.php';
            includeFile($file,'content');
        }
        else
        {
            if(isset($this->section) && !empty($this->section))
            {
                $file = $this->resource . 'content/sections/'.$this->section.'/default.php';
                includeFile($file,'content');
            }
            else
            {
                include $this->resource . 'content/homepage.php';
            }
        }
        include $this->resource . 'content/footer.php';
    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?=$this->resource?>js/bootstrap.min.js"></script>
    <script src="<?=$this->resource?>js/angular.min.js"></script>
    <script src="<?=$this->resource?>js/controllers.js"></script>
    <script src="<?=$this->resource?>js/parallax.min.js"></script>

    <script>
        $('.parallax-window').parallax({imageSrc: 'img/All-hands-in-Color-Temp-Homepage-Image-to-put-on-gradient-Recovered2.jpg'});
    </script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=$this->resource?>js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
