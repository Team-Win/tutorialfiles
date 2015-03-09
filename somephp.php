 <?php

include 'config.php'; // include the file with emails, to keep the script secure

error_reporting (E_ALL ^ E_NOTICE); // turn on error reporting
 
$post = (!empty($_POST)) ? true : false; // checking if the form values are empty

if (empty($post)) //redirects to homepage if somoene tries to access the script directly
{
  header("Location: ../");

} 

if ($post) {
  $name = stripslashes($_POST['name']);
  $email = trim($_POST['email']);
  $subject = stripslashes($_POST['subject']);
  $message = stripslashes($_POST['message']); //Assign values from the form to variables which will be used to send an email
 
  $error = '';
 
  if (!$error) { //if no error send email
    $mail = mail(WEBMASTER_EMAIL, $subject, $message, //mail the following 
      "From: ".$name." <".$email.">\r\n"
        ."Reply-To: ".$email."\r\n" 
        ."X-Mailer: PHP/" . phpversion()); //PHP Version
 
    if ($mail) {
      header("Location: ../?success"); //if successful, reidrect to homepage and show success alert
    }
    else {  
      header("Location: ../?fail"); // if unsuccessful, redirect to homepage and show danger alert, prompting user to try again
    }
  }
}

?>