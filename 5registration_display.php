<?php

require('pdo.php')


//registration form
$first_name = filter_input(INPUT_POST,'first_name');
$last_name = filter_input(INPUT_POST,'last_name');
$date = filter_input(INPUT_POST,'date');
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,'password');

if($first_name == NULL){
    echo ' enter a first name';
    echo"<br>";
}

if($last_name == NULL){
    echo ' enter a last name';
    echo"<br>";
}

if($date == NULL){
    echo ' enter a birthday';
    echo"<br>";
}

if($email == NULL){
    echo ' enter a email address';
    echo"<br>";
}

if(strlen($password) <8){
    echo ' enter a password with at least 8 characters';
    echo"<br>";
}






$account = function create_user($userID){
    $db=Database::getDB();
    $query='SELECT * From questions WHERE ownerID= :userID';
     $statement=db->prepare($query);
     $statement->bindValue(':userID',$userID);
     $statement->execute();
     $account=$statement->fetch_all();
     $statement->close_cursor();

     return $account
}

function create_account ($first_name,$last_name,$date,$email,$password){
    $db=Database::getDB();

    $query = 'INSERT INTO account
    (:title,:body,:skills,:ownerID)';

    $statement=$db->prepare($query);
    $statement->bindValue(':ownerID',$ownerID);
    $statement->bindValue(':first_name',$first_name);
    $statement->bindValue(':last_name',$last_name);
    $statement->bindValue(':date',$date);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':password',$password);

    $statement->execute();
    $statement->close_cursor();
     

}



?>





<html>
<head>
  <link rel="stylesheet" type="text/css" href="test.css">
  <h1>Project 2</h1>
</head>
    <body>
        <h2>Display page</h2>
        <div>
            First Name: <?php echo $first_name; ?>
        </div>
        <div>
            Last Name: <?php echo $last_name; ?>
        </div>
        <div>
            Birthday: <?php echo $date; ?>
        </div>
        <div>
            Email Address: <?php echo $email; ?>
        </div>
        <div>
            Password: <?php echo $password; ?>
        </div>
    
        <br>
        <h3>Links</h3>
        <li class="active"><a href="1login.php">Login</a></li>
        <li><a href="2registration.php">Register</a></li>
        <li><a href="3question_forum.php">Question</a></li>
        
    </body>
</html>