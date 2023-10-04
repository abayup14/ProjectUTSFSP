<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Website</title>
</head>
<body>
    <h1>Login Untuk Membaca Cerita</h1>
    <form action="cek_login.php" method="POST">
        <p><label>Username : </label><input type="text" name="txtusername" id="username"></p>
        <p><label>Password : </label><input type="password" name="txtpassword" id="password"></p>
        <p><input type="submit" value="LOGIN" name="btnlogin" id="login"></p>
    </form>
</body>
</html>