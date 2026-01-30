<?php

$firstName = $_POST['first_name']; 
$lastName = $_POST['last_name'];
$emailAddress = $_POST['email_address']; 
$message = $_POST['message']; 

$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$emailAddress = filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

$errors = [];

if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is required."; 
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is required."; 
}

if ($emailAddress === null || $emailAddress === '') {
    $errors[] = "Email address is required"; 
}
else if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address must be valid";
}

if ($message === null || $message === '') {
    $errors[] = "Message is required."; 
}

if(!empty($errors)) {
foreach ($errors as $error) : ?>
    <li><?php echo $error; ?> </li>
<?php endforeach;
exit; 
}

?>

<main>
    <?php echo "<h2> Thanks for your order " . $firstName . "</h2>"; ?>
</main>

<?php mail($to, $subject, $message); ?> 
