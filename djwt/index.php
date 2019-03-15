<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <form class="form" role="form" autocomplete="off" id="formLogin" method="post" action = "include/login.php">
            <div class="form-group">
                <label for="uname1">Username</label>
                <input type="text" class="form-control form-control-lg rounded-0" name="uname" id="uname" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control form-control-lg rounded-0" id="pass" name = "pass" required autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-lg btn-info float-right" id="btnLogin">Login</button>
        </form>
    
</body>
</html>