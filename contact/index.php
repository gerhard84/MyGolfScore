<?php
require_once('../util/main.php');
require_once('model/email.php');

if (isset($_POST['action'])) {
  $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
  $action = $_GET['action'];
} else {
  $action = 'view_contact';
}

switch ($action) {

  case 'view_contact':
    include 'contact_view.php';
    break;

  case 'process_contact':

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $msg = trim($_POST['message']);

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name))
    {
        display_error("Please enter valid name");
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
      display_error('The e-mail address ' . $email . ' is not valid.');
    }
    if(empty($subject))
    {
        display_error("Please select a Subject");
    }
    if(empty($msg))
    {
        display_error("Please enter a message");
    }
    var_dump($_POST);
break;
    email_contact($email, $name, $subject, $msg);

    redirect('..');
  break;

  default:
    display_error("Unknown account action: " . $action);
  break;
}
?>
