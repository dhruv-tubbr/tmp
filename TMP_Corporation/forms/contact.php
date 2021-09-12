<?php

  $receiving_email_address = 'vdhruvyt@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = false;
  
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = "New Inquiry - ".$_POST['name']." | TMP Global";



  if(!empty($_POST['name'])){
    $name= $_POST['name'];
    $contact->add_message( $name, 'Name');
  }

  if(!empty($_POST['email'])){
    $sender_email= $_POST['email'];
    $contact->add_message( $sender_email, 'Email');
  }

  if(!empty($_POST['phone_number'])){
    $phone_number= $_POST['phone_number'];
    $contact->add_message( $phone_number, 'Phone Number');
  }

  if(!empty($_POST['company'])){
    $company_name= $_POST['company'];
    $contact->add_message( $phone_number, 'Company Name');
  }

  if(!empty($_POST['message'])){
    $sender_message= $_POST['message'];
    $contact->add_message( $sender_message, 'Message',10);
  }
   
  

  if(!empty($_POST['japan'])){
    $japan = $_POST['japan'];
    $countj = count($japan);
    $contact->add_message( $countj, 'Enter Japan Market');
    for($i=0;$i<$countj;$i++){
      $contact->add_message( $japan[$i], "• ");
    }
  }

  if(!empty($_POST['dx'])){
    $dx = $_POST['dx'];
    $countd = count($dx);
    $contact->add_message( $countd, 'Become Future Ready');
    for($j=0;$j<$countd;$j++){
      $contact->add_message( $dx[$j], "• ");
    }
  }

  if(!empty($_POST['sector'])){
    $sector = $_POST['sector'];
    $counts = count($sector);
    $contact->add_message( $counts, 'Sectors');
    for($s=0;$s<$counts;$s++){
      $contact->add_message( $sector[$s], "• ");
    }
  }

  echo $contact->send();
?>
