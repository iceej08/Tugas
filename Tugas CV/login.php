<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CV Generator</title>
    <link rel="stylesheet" type="text/css" href="cvstyle.css">
</head>
<body>
    <div class="container2">
    <h1>Login</h1>
    <form action="login.php" method="POST">
            <label for="email"> Email: </label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="pass" name="pass" required>
            <p style="color: red; margin-bottom: 15px; margin-top: 0px;">
            <?php 
            session_start();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $passdomain = explode('@', $email)[1];
                if($pass == $passdomain){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    header('Location: form.php');
                    exit;
                } else{
                    echo "Password salah! Hint: Password berupa domain email.";
                }

            }
            ?>
            </p>
            <button type="submit">Login</button>
        </form>
    </div>
    
</body>
</html>
