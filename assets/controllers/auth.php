<? 
$email = filter_var(trim($_POST['email-log']), FILTER_SANITIZE_STRING); 
$password = filter_var(trim($_POST['password-log']), FILTER_SANITIZE_STRING); 
 
$mysql = new mysqli('localhost', 'root', '', 'car'); 
 
$result1 = $mysql->query("SELECT * FROM users WHERE `email`= '$email';"); 
$user1 = $result1->fetch_assoc(); 
$mysql->close(); 

 
if(!empty($user1)) { 
    if (password_verify($password, end($user1))) {
        setcookie("login", $email, time()+60*60*24*1, '/');
        header('Location: /index5.php');
    }
    else {
        setcookie("login", 'error', time()+60*60*24*1, '/');
        header('Location: /index5.php');
    }
} 
else{ 
    setcookie("login", 'error', time()+60*60*24*1, '/');
    header('Location: /index5.php');
} 
?>