<?php
   $rf = array();
   $rf[0] = trim(stripslashes($_POST['email']));
   $rf[1] = trim(stripslashes($_POST['name']));
   $rf[2] = trim(stripslashes($_POST['state']));
   $rf[3] = trim(stripslashes($_POST['phone']));
   $message = trim(stripslashes($_POST['comment']));
   $EmailTo = "robertbroden@outlook.com";
   $Subject = "Contact Request from $name";
   $User_Subject = "Contact Request";
   $Response = "Thank you, ".$name.", for contacting North Point Property Management LLC. We will be responding as soon as possible, please allow us some time to review your information. For further information, call toll-free at (877) 423-5050.";

   /*
   $check = in_array("",$rf);
   if($check==true)
   {
   $valid_type="f_f";
   $valid = "false";
   }
   else
   {
   $valid_type="f_s";
   $valid = "true";
   }
   */

   $Body = "";
   $Body .= "Name: ";
   $Body .= $rf[1];
   $Body .= "\n";
   $Body .= "Email: ";
   $Body .= $rf[0];
   $Body .= "\n";
   $Body .= "State: ";
   $Body .= $rf[2];
   $Body .= "\n";
   $Body .= "Phone Number: ";
   $Body .= $rf[3];
   $Body .= "\n";
   $Body .= "Message: ";
   $Body .= $message;
   $Body .= "\n";

   if(mail($EmailTo, $Subject, $Body, "From: $rf[1]<$rf[1]>"))
   {
      //$success = mail($EmailTo, $Subject, $Body, "From: $name<$email>");
      //$success2 = mail($email, $User_Subject, $Response, "From: North Point Website<$EmailTo>");

      //unset($name,$assc,$unit,$email,$phone,$message);
      $valid = 'true';
   }
   else{
      $valid = 'false';
   }
   echo $valid;
?>
