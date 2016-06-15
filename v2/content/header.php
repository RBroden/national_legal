<div id="nlNavigation">
  <div class="container">

    <!--<nav class="navbar navbar-inverse navbar-static-top">-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
         <!-- Mobile Logo -->
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <!-- Logo -->
         <a class="navbar-brand" href="<?=$this->site?>">National Legal Center</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav">
            <li class="<?=$this->checkActiveTab('')?>">
                <a href="<?=$this->site?>">Home</a>
            </li>
            <li class="<?=$this->checkActiveTab('about')?>">
                <a href="<?=$this->site?>About">About Us</a>
            </li>
            <li class="<?=$this->checkActiveTab('practice_areas')?>">
                <a href="<?=$this->site?>Practice_Areas">Practice Areas</a>
            </li>
            <li class="<?=$this->checkActiveTab('faq')?>">
                <a href="<?=$this->site?>FAQ">FAQ</a>
            </li>
            <li class="<?=$this->checkActiveTab('contact')?>">
                <a href="<?=$this->site?>Contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>
