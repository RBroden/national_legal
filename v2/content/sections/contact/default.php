<style>
    .contactSymbol {
        font-size: 24px;
    }
    .contactMethod{
        margin-top: 30px;
    }
</style>
<div class="container nlInfo">
   <div class="row">
      <article class="col-sm-7">
         <h2>Contact Us</h2>
         <form id="contactForm" method="post" class="contactForm"  onsubmit="return submitForm()">
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="email">Email address:</label>
                     <input type="email" class="form-control" id="email" name="email">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" class="form-control" id="name" name="name">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="state">State:</label>
                     <input type="text" class="form-control" id="state" name="state">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label for="phone">Phone:</label>
                     <input type="text" class="form-control" id="phone" name="phone">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-sm-12">
                  <label for="phone">Ask any question you might have:</label>
                  <textarea name="comment" id="comment" class="form-control" rows="10"></textarea>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-sm-12">
                  <button type="submit" class="btn btn-default">Submit</button>
               </div>
            </div>
         </form>
         <div id="successMessage" class="formResponse">
            Your message was sent successfully.
         </div>
         <div id="errorMessage" class="formResponse">
            Your message was not sent successfully.
         </div>
      </article>
      <aside id="sidebar" class="col-sm-5">
         <h2>Our Phone, Email, Address</h2>
         <div class="row contactMethod">
            <div class="col-xs-2 text-center contactSymbol">
               <i class="glyphicon glyphicon-earphone"></i>
            </div>
            <div class="col-xs-10">
               Phone: 1.800.728.5285<br><small>9AM-5PM M-F EST</small>
            </div>
         </div>
         <div class="row contactMethod">
            <div class="col-xs-2 text-center contactSymbol">
               <i class="glyphicon glyphicon-file"></i>
            </div>
            <div class="col-xs-10">
               Fax: 1.866.526.1602
            </div>
         </div>
         <div class="row contactMethod">
            <div class="col-xs-2 text-center contactSymbol">
               <i class="glyphicon glyphicon-send"></i>
            </div>
            <div class="col-xs-10">
               Email<br>
               General : <a href="mailto:support@nationallegal.com">support@nationallegal.com</a><br>
               Payments: <a href="mailto:banking@nationallegal.com">banking@nationallegal.com</a>
            </div>
         </div>
         <div class="row contactMethod">
            <div class="col-xs-2 text-center contactSymbol">
               <i class="glyphicon glyphicon-envelope"></i>
            </div>
            <div class="col-xs-10">
               Mail Address<br>
               National Legal Center<br>
               P.O. Box 835<br>
               Candia, NH 03034
            </div>
         </div>
      </aside>
   </div>
</div>
<!-- new -->
<script>
function submitForm(){

   $.ajax({
      method: "POST",
      url: "phpmailer/contact.php",
      data: {
         "email" : $('#email').val(),
         "name" : $('#name').val(),
         "state" : $('#state').val(),
         "phone" : $('#phone').val(),
         "comment" : $('#comment').val()
      }
   }).done(function(result){
      console.log('response: ' + result);
      $('#contactForm').toggleClass('hideForm');
      if(result == 'true'){
         $('#email').val('');
         $('#name').val('');
         $('#state').val('');
         $('#phone').val('');
         $('#comment').val('');
         $('#contactForm').html('Email was sent successfully.');
      }
      else{
         $('#contactForm').html('Email was not sent successfully.');
      }
   });

   return false;
}
</script>
