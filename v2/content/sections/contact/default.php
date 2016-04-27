<div class="container nlInfo">
   <div class="row">
      <article class="col-lg-7">
         <h2>Contact Us</h2>
         <form id="contactForm" method="post" class="contactForm"  onsubmit="return submitForm()">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="email">Email address:</label>
                     <input type="email" class="form-control" id="email" name="email">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" class="form-control" id="name" name="name">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="state">State:</label>
                     <input type="text" class="form-control" id="state" name="state">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="phone">Phone:</label>
                     <input type="text" class="form-control" id="phone" name="phone">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-12">
                  <label for="phone">Ask any question you might have:</label>
                  <textarea name="comment" id="comment" class="form-control" rows="10"></textarea>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-12">
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
      <aside id="sidebar" class="col-lg-5">
         <h2>Our Phone, Email, Address</h2>
         <table>
         <tbody><tr>
         <td>Phone: (1.800.728.5285)  9AM-5PM M-F EST</td>
         </tr>
         <tr>
         <td>&nbsp;</td>
         </tr>
         <tr>
         <td>Fax: (1.866.526.1602)</td>
         </tr>
         <tr>
         <td>&nbsp;</td>
         </tr>
         <tr>
         <td>General : <a href="mailto:support@nationallegal.com">support@nationallegal.com</a></td>
         </tr>
         <tr>
         <td>Payments: <a href="mailto:banking@nationallegal.com">banking@nationallegal.com</a></td>
         </tr>
         <tr>
         <td>&nbsp;</td>
         </tr>
         <tr>
         <td>Mail Address:</td>
         </tr>
         <tr>
         <td>&nbsp;</td>
         </tr>
         <tr>
         <td>National Legal Center</td>
         </tr>
         <tr>
         <td>P.O. Box 835</td>
         </tr>
         <tr>
         <td>Candia, NH 03034</td>
         </tr>
         </tbody></table>
      </aside>
   </div>
</div>

<script>
function submitForm(){

   $.ajax({
      method: "POST",
      url: "api/mailer.php",
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
