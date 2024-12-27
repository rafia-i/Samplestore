<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <main>
        <h1>Register</h1>
        <form action="registernow.php" method="POST">
            <label for="new-username">Username</label><br>
            <input type="text" id="new-username" name="username" required><br><br>

            <label for="new-password">Password</label><br>
            <input type="password" id="new-password" name="password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </main>
</body>
</html>
