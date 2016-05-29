<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/nlc.ico" type="image/x-icon" />

    <!-- Bootstrap core CSS -->
    <link href="<?=$this->resource?>css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?=$this->resource?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="<?=$this->resource?>css/style.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <?php
      if(isset($this->page))
   	{
         $file = $this->resource . 'content/sections/'.$this->section.'/'.$this->page.'/head.php';
         includeFile($file,'head');
   	}
   	else
   	{
   		if(isset($this->section))
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
      if(isset($this->page))
   	{
         $file = $this->resource . 'content/sections/'.$this->section.'/'.$this->page.'/default.php';
         includeFile($file,'content');
   	}
   	else
   	{
   		if(isset($this->section))
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

    <script>
        /*
    var picArray = [
       'people_sunset', // a
       '500_F_85646159_uTzEpRjysXxzpjQ5uGMyJ8HezdIXxPwi', // b
       '500_F_56025347_TnH7eJ3YVYRmmKKFz2jd9KgcwuJwDWWW', // c
       'AdobeStock_30205770_WM', // j
       '500_F_89424604_0LvyOgsqyLd2caofEGhFgP0RjnjsLNfB', // d
       '500_F_40906078_xqi8qJqKwgZyFzyiEGfww5uwnRrRmgMa', // e
       '500_F_86094488_cOD8gAPa4GgLxANb3uOHASGO8qIRfwp8', // f
       '500_F_99594662_lTYAZVWc4iTAfTmjh8JCs6zjiAV11vfc', // g
       '500_F_33491113_qiJtKnjjII51CVuWxvVR4srjm0DBQ2t6', // h
       '500_F_67340426_HZatnRu8BnWR9J9QtbqTz59oQQu5AW8I', // i
       '500_F_85546214_OekiGPx9Gk8luDzusUVPIkMZwT947D2M' // k
    ];

    var picBG = [
      '0', // a
      '-100px', // b
      '-50px', // c
      '0', // j
      '-500px', // d
      '0', // e
      '-250px', // f
      '-400px', // g
      '-200px', // h
      '-350px', // i
      '-200px' // k
    ];

    for(var i = 0; i < picArray.length; i++){
      $('#picturePreview').append('<span class="previewItem">'+(i+1)+'</span>');
    }

    $('#nlGreeting').click(function(){
      if($('#nlPresentation').css('display')!='none'){
         $('#nlPresentation').hide();
      }
      else{
         $('#nlPresentation').show();
      }
    });

    $('.previewItem').click(function(){
      var pos = $(this).index('.previewItem');
      $('.previewItem').css('background','#fff');
      $(this).css('background','#def');
      $('#nlGreeting').css("background-image", 'url(img/'+picArray[pos]+'.jpg)');
      $('#nlGreeting').css("background-position", '0 ' + picBG[pos]);
    });

    */
    </script>
    <style>
    #picturePreview{
      margin-top: -40px;
      margin-bottom: 15px;
      text-align: center;
    }
    #picturePreview .previewItem{
      margin: 2px 3px;
      border: 1px solid #3cf;
      border-radius: 3px;
      color: #39c;
      padding: 5px;
      cursor: pointer;
    }
    </style>
  </body>
</html>
