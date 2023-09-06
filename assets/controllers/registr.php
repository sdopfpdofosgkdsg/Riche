<?
$login = filter_var(trim($_POST['login-reg']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email-reg']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password-reg']), FILTER_SANITIZE_STRING);

$hash = password_hash($password, PASSWORD_BCRYPT);

$mysql = new mysqli('localhost', 'root', '', 'car');

$result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user1 = $result1->fetch_assoc();

if(!empty($user1)) {
    $mysql->close();

    setcookie("regist", 'error', time()+60*60*24*1, '/');
    header('Location: /index5.php');
}
else {
    $mysql->query("INSERT INTO `users` (`login`, `email`, `password`) VALUES('$login', '$email', '$hash')");
    $mysql->close();

    setcookie("regist", 'successfully', time()+60*60*24*1, '/');
    header('Location: /index5.php');
}

?>