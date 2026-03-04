<?php
require "includes/index.php";

$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$items = $_POST['items'] ?? []; 

$errors = []; 

if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is Required."; 
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is Required."; 
}

 
if ($email === null || $email === '') {
    $errors[] = "Email is Required"; 
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email"; 
}


if ($phone === null || $phone === '') {
    $errors[] = "Phone number is required."; 
}
$itemsOrdered = [];


foreach($items as $item => $quantity) {
    if(filter_var($quantity, FILTER_VALIDATE_INT) !== false && $quantity > 0 ) {
        $itemsOrdered[$item] = $quantity; 
    }
}
if(count($itemsOrdered) === 0) {
    $errors[] = "Please order at least one item"; 
}

if(!empty($errors)) {
foreach ($errors as $error) : ?>
    <li><?php echo $error; ?> </li>
<?php endforeach;
  
exit; 
}




if(isset($_POST['submit'])){
    $firstName = $_POST['last name'];
    $lastName = $_POST['first name'];
    $email = $_POST['email'];
    $phone = $_POST['phone number'];

    //mysqli_query()

}

?>