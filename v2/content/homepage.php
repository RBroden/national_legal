<!-- Homepage Image
================================================== -->
<style>
.vertical-center{
   text-align: center;
   text-shadow: 2px 2px 5px #999;
}
.vertical-center .container{
   animation-name: circleReturnAni;
   animation-duration: 1s;
}
.vertical-center h2, .vertical-center h3{
  float: left;
  color: #fff !important;
  margin: 20px 0 5px;
}
.vertical-center h3{
  clear: both;
  margin: 0 0 10px;
}
.nlMsg{
   width: auto;
   display: inline-block;
   color: #fff;
   font-style: italic;
}
.nlMsg p{
   margin: 0;
}
#nlPresentation{
   display: none;
}
/*
.showNav{
   background-color: rgba(0, 0, 0, 0.9);
   animation-name: showNavAni;
   animation-duration: 1s;
}
.hideNav{
   color: #fff;
   background-color: rgba(0, 0, 0, 0);
   border: 0px;
   box-shadow: none;
   animation-name: hideNavAni;
   animation-duration: 1s;
}
.hideNav .navbar-nav>li>a, .hideNav .navbar-brand{
   color: #fff !important;
}
.hideNav .navbar-nav>.active>a, .hideNav .navbar-nav>.active>a:focus, .hideNav .navbar-nav>.active>a:hover{
   background: none !important;
}
@keyframes showNavAni {
   from {
      background-color: rgba(0, 0, 0, 0);
   }
   to {
      background-color: rgba(0, 0, 0, 0.9);
   }
}
@keyframes hideNavAni {
   from {
      background-color: rgba(0, 0, 0, 0.9);
   }
   to {
      background-color: rgba(0, 0, 0, 0);
   }
}
*/
.col-lg-6{
   margin: 0 20px;
}
@media (min-width: 1400px) {
   #nlMainImg {
       width: 1370px;
   }
}
@media (max-width: 1200px) {
    #tagline h6 {
        font-size: 14px !important;
    }

    #tagline p {
        font-size: 12px !important;
    }
}
@media (max-width: 1000px) {
    #nlGreeting h2 {
        margin-top: 40px;
        font-size: 24px;
    }
    #headerTagline {
        font-size: 12px;
    }
    #tagline, #contactNumber {
        display: none;
    }
}
@media (max-width: 600px) {
    #nlGreeting{
        height: 60vw !important;
        margin-bottom: 20px;
    }
    #nlGreeting h2 {
        margin-top: 40px;
        text-align: center;
        font-size: 18px;
    }
    #headerTagline {
        text-align: center;
        font-size: 12px !important;
    }
}
</style>
<div data-ng-controller="homeCtrl">
   <div id="nlGreeting" class="jumbotron vertical-center parallax-window" data-parallax="scroll" data-image-src="v2/css/img/All-hands-in-Color-Temp-Homepage-Image-to-put-on-gradient-Recovered2.jpg" style="height: 35vw; background-color: transparent;" data-natural-width="2000" data-natural-height="1000" data-speed="0.3">
      <div id="nlMainImg" class="container" data-ng-show="checked" style="position: relative; height: 28vw;">
        <div id="contactNumber" style="float: right; color: #fff; margin-top: 20px; font-size: 24px;"><i class="glyphicon glyphicon-earphone"></i> 1.800.728.5285</div>
         <div>
            <h2>The Law Office of Fox, Kohler and Associates, PLLC</h2>
         </div>
         <!--<h3>National Legal Center</h3>-->
         <div style="clear: both; text-align: left;">
           <div id="headerTagline" style="font-size:16px;" class="nlMsg">Over 40 years of combined experience in defending our client's consumer rights</div>
         </div>
         <div style="clear: both; color: #fff; position: absolute; width: 50%; right: 20px; bottom: 20px; text-align: justify; text-justify: inter-word;">
            <div id="tagline">
               <h6 style="font-size: 18px; color: #fff; padding-bottom: 10px; border-bottom: 1px solid #3399cc;">OUR COMMITMENT</h6>
               <p style="font-size: 16px;">At National Legal Center, we believe that diversity, in terms of people, perspectives and experiences – can create more innovative solutions and greater contributions from everyone. As our workforce grows to reflect the greater diversity of the world in which we live, our efforts to value differences and build a culture of inclusion become increasingly essential to our success and that of our clients.</p>
            </div>
         </div>
      </div>
   </div><!-- /.Homepage Image -->

   <script>
   /*
   var nav = document.getElementsByClassName("navbar-inverse")[0];

   checkScroll();

   document.addEventListener("scroll", function(){
   	checkScroll();
   });

   function addClass(el, className) {
      if (el.classList)
         el.classList.add(className)
      else if (!hasClass(el, className)) el.className += " " + className
   }

   function removeClass(el, className) {
      if (el.classList)
         el.classList.remove(className)
      else if (hasClass(el, className)) {
         var reg = new RegExp('(\\s|^)' + className + '(\\s|$)')
         el.className=el.className.replace(reg, ' ')
      }
   }

   function checkScroll(){
      var top = document.body.scrollTop;
      if(top <= 0){
         addClass(nav, "hideNav");
         removeClass(nav, "showNav");
      }
      else{
         addClass(nav, "showNav");
         removeClass(nav, "hideNav");
      }
   }
   */
   </script>
</div>



<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <div class="row visible-xs text-center well">
        <a href="tel:18007285285"><i class="glyphicon glyphicon-earphone"></i> 1.800.728.5285</a>
    </div>
  <div class="row">
    <div class="col-sm-4 text-center">
      <a href="<?=$this->site?>practice_areas" class="nlCircle" style="border-radius: 100%; background: url('img/practice_areas_circle.jpg'); background-size: 100%; background-repeat: no-repeat; background-position: center; ">
         <!--<img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image">-->
      </a>
      <h2>Practice Areas</h2>
    </div><!-- /.col-lg-4 -->
    <div class="col-sm-4 text-center">
      <a href="<?=$this->site?>faq" class="nlCircle" style="border-radius: 100%; background: url('img/faq_circle.jpg'); background-size: 100%; background-repeat: no-repeat; background-position: center; ">
         <!--<img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image">-->
         <!--<img class="img-circle" src="img/500_F_18067236_xuRDL0115o49PEg7NPQai6GR1nPIyAvm.jpg" alt="Generic placeholder image">-->
      </a>
      <h2>FAQ</h2>
    </div><!-- /.col-lg-4 -->
    <div class="col-sm-4 text-center">
      <a href="<?=$this->site?>contact" class="nlCircle" style="border-radius: 100%; background: url('img/contact_circle.jpg'); background-size: 100%; background-repeat: no-repeat; background-position: center; ">
         <!--<img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image">-->
      </a>
      <h2>Contact</h2>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

  <!-- START THE FEATURETTES -->
    <!--
  <hr class="featurette-divider">
  <div class="row">
     <div class="col-lg-7">
        <h2>National Legal</h2>
        <p>Also known as <strong>National Legal Systems</strong>, and <strong>National Legal Center</strong>,  is a civil practice law firm with its primary office located in New Hampshire. National Legal Center serves a wide range of clients. The law firm employs attorneys in about 38 states.</p>
        <p>
        The firm’s principle and founding attorneys, Rosanna Fox and Arthur Kohler, are dedicated to providing excellent legal representation at a reasonable cost to the individuals and businesses they represent. The firm has maintained an outstanding reputation by providing superior legal services to its many clients. The lawyers of National Legal Center represent their clients aggressively, compassionately, and ethically.</p>
        <p>
        Areas of practice include Debt Resolution, FDCPA Enforcement, Consumer and Debtor Rights, Bankruptcy Alternatives, Elder Law, and Credit Correction Legal Services. Supervising Attorney, Arthur Kohler, has been practicing law for over 40 years.</p>
        <p>
        Attorney Fox and Attorney Kohler, along with associates and affiliate attorneys have the experience, the knowledge, and the integrity to represent their clients in a competent, vigorous, and dignified manner.
        </p>
        <figure class="centered" style="text-align: center;">
           <img src="img/farrell_kohler_fox_mcgraw_edit3.jpg" class="img-thumbnail" width="75%" alt="Attorneys John Farrell, Arthur Kohler, Rosanna Fox, and Vincent McGraw, Managing Attorney Emeritus">
           <figcaption>Attorneys John Farrell, Arthur Kohler, Rosanna Fox, and Vincent McGraw, Managing Attorney Emeritus</figcaption>
        </figure>
     </div>

     <div class="col-lg-5">
        <h2>We are committed to you</h2>
        <p>Our attorneys and staff are committed to upholding the highest standards of professionalism and ethics. We pledge to provide the highest quality representation to our clients. Through our one-on-one approach, we get to know our clients and are able to effectively assess your needs and the requirements of your case.</p>
        <p>Attorney Rosanna Fox is fully accredited by the New Hampshire Bar and the American Bar Association. Attorney Arthur Kohler is fully accredited by the Massachusetts Bar and the American Bar Association.</p>
        <p>Utilizing state-of-the-art technology and drawing on years of experience, we aggressively pursue a resolution to your case. We are not afraid to stand up for your rights.</p>
        <p>At National Legal Center, we understand that your resources are limited.  We take into consideration  every client’s financial situation to ensure the fee structure fair and reasonable.  Our Firm offers hourly  rate, flat rate fees and contingency fee solutions.  Cost of service is always discussed with each client  prior to engaging representation.</p>
        <p>We understand.  You are worried, stressed and unsure what to do.  Your fears are taking over your life  and may even be negatively affecting your marriage, relationship with your children, your family and  your friends.  If your situation is no longer manageable, call us now for a free consultation.</p>
        <p>Our friendly, experienced attorneys and support staff have nearly half a century of combined legal and  financial experience.  Our Attorneys and staff are responsible and respected by others in the legal and  financial community.</p>
     </div>
  </div>
  -->
</div>
