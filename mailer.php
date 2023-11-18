<?php

if($_POST) {
  $to = "info@dermiscare.in"; // your mail here
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_STRING);
  $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
  $email = 'info@dermiscare.in';
  $subject = 'Dermis Care lead';
  $cc = 'info@dermiscare.in';
  $bcc = 'info@dermiscare.in';
  $body = "Name:$name\nMobile:$mobile\nService:$service";
  
  //mail headers are mandatory for sending email
  $headers = 'From: ' .$email . "\r\n". 
  $cc = 'Cc: ' .$cc . "\r\n". 
  $bcc = 'Bcc: ' .$bcc . "\r\n".
  'Reply-To: ' . $email. "\r\n" . 
  'X-Mailer: PHP/' . phpversion();

  if(@mail($to, $subject, $body)) {
    $output = json_encode(array('success' => true));
    echo "<script>window.location= 'thankyou-2.php'</script>";
  } else {
    $output = json_encode(array('success' => false));
    die($output);
  }
}