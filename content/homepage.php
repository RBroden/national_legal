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
</style>
<div data-ng-controller="homeCtrl">
   <div id="nlGreeting" class="jumbotron vertical-center">
      <div class="container" data-ng-show="checked">
        <div style="float: right; color: #fff; margin-top: 20px; font-size: 24px;">1.800.728.5285</div>
         <h2>The Law Office of Fox, Kohler and Associates, PLLC</h2>
         <!--<h3>National Legal Center</h3>-->
         <div style="clear: both; text-align: left;">
           <div style="" class="nlMsg">Lorem ipsum dolor sit amet.</div>
         </div>
      </div>
   </div><!-- /.Homepage Image -->

   <!-- PREVIEW -->
   <div id="nlPresentation" class="text-center container">
      <div id="picturePreview">
      </div>
      <div>
         <input type="checkbox" data-ng-model="checked"><label>Show Text</label><br>
         <input data-ng-model="nlHeader" type="text" class="form-control" style="margin: 15px 15px 0 15px;"><br>
         <textarea style="margin: 0 15px 15px 15px;" data-ng-model="nlText" class="form-control" rows="3"></textarea>
      </div>
   </div>
</div>
<!-- END OF PREVIEW -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4">
      <a href="<?=$this->site?>practice_areas" class="nlCircle">
         <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image">
      </a>
      <h2>Practice Areas</h2>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <a href="<?=$this->site?>faq" class="nlCircle" style="border-radius: 100%; background: url('img/240_F_92363681_rifLyte09fJpH3FqPOPOPCkqx3XllSJS.jpg'); background-size: 175%; background-repeat: no-repeat; background-position: center; ">
         <!--<img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image">-->
         <!--<img class="img-circle" src="img/500_F_18067236_xuRDL0115o49PEg7NPQai6GR1nPIyAvm.jpg" alt="Generic placeholder image">-->
      </a>
      <h2>FAQ</h2>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <a href="<?=$this->site?>contact" class="nlCircle">
         <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image">
      </a>
      <h2>Contact</h2>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

  <!-- START THE FEATURETTES -->
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
           <img src="img/farrell_kohler_fox_mcgraw.jpg" class="img-thumbnail" width="75%" alt="Attorneys John Farrell, Arthur Kohler, Rosanna Fox, and Vincent McGraw, Managing Attorney Emeritus">
           <figcaption>Attorneys John Farrell, Arthur Kohler, Rosanna Fox, and Vincent McGraw, Managing Attorney Emeritus</figcaption>
        </figure>
     </div>

     <div class="col-lg-5">
        <h3>We are committed to you</h3>
        <p>Our attorneys and staff are committed to upholding the highest standards of professionalism and ethics. We pledge to provide the highest quality representation to our clients. Through our one-on-one approach, we get to know our clients and are able to effectively assess your needs and the requirements of your case.</p>
        <p>Attorney Rosanna Fox is fully accredited by the New Hampshire Bar and the American Bar Association. Attorney Arthur Kohler is fully accredited by the Massachusetts Bar and the American Bar Association.</p>
        <p>Utilizing state-of-the-art technology and drawing on years of experience, we aggressively pursue a resolution to your case. We are not afraid to stand up for your rights.</p>
        <p>At National Legal Center, we understand that your resources are limited.  We take into consideration  every client’s financial situation to ensure the fee structure fair and reasonable.  Our Firm offers hourly  rate, flat rate fees and contingency fee solutions.  Cost of service is always discussed with each client  prior to engaging representation.</p>
        <p>We understand.  You are worried, stressed and unsure what to do.  Your fears are taking over your life  and may even be negatively affecting your marriage, relationship with your children, your family and  your friends.  If your situation is no longer manageable, call us now for a free consultation.</p>
        <p>Our friendly, experienced attorneys and support staff have nearly half a century of combined legal and  financial experience.  Our Attorneys and staff are responsible and respected by others in the legal and  financial community.</p>
     </div>
  </div>
</div>
