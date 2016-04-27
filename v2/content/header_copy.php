<nav class="navbar navbar-default navbar-fixed-top">
   <div class="container">
      <div class="navbar-header">
         <!-- Mobile Nav -->
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
            <li class="<?=$this->checkActiveTab('')?>"><a href="<?=$this->site?>">Home</a></li>
            <li class="<?=$this->checkActiveTab('faq')?>"><a href="<?=$this->site?>faq">FAQ</a></li>
            <li class="<?=$this->checkActiveTab('contact')?>"><a href="<?=$this->site?>contact">Contact</a></li>
            <li class="<?=$this->checkActiveTab('practice_areas')?> dropdown">
               <a href="<?=$this->site?>practice_areas" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Practice Areas <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="<?=$this->site?>practice_areas#Debt_Resolution_Legal_Service">Debt Resolution Legal Service</a></li>
                  <li><a href="<?=$this->site?>practice_areas#FDCPA_Enforcement">FDCPA Enforcement</a></li>
                  <li><a href="<?=$this->site?>practice_areas#Consumer_and_Debtor_Rights">Consumer and Debtor Rights</a></li>
                  <li><a href="<?=$this->site?>practice_areas#Bankruptcy_Alternatives">Bankruptcy Alternatives</a></li>
                  <li><a href="<?=$this->site?>practice_areas#Elder_Law">Elder Law</a></li>
                  <li><a href="<?=$this->site?>practice_areas#Credit_Correction_Legal_Service">Credit Correction Legal Service</a></li>
               </ul>
            </li>
         </ul>
      </div><!--/.nav-collapse -->
   </div>
</nav>
