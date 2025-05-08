<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            flex-direction: column;
            margin: 0;
        }
        .header {
            width: 100%;
            background-color: #001f3f;
            padding: 10px;
            text-align: left;
            position: fixed;
            top: 0;
            left: 0;
            height: 60px;
            display: flex;
            align-items: center;
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.1);
        }
        .logo {
            width: 120px;
            margin-left: 20px;
        }
        .container {
            display: flex;
            width: 800px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 80px;
        }
        .left {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .right {
            flex: 1;
        }
        .right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 80%;
        }
        input, button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="images/logo.png" alt="Logo" class="logo">
    </div>
    <div class="container">
        <div class="left">
            <form method="POST" action="authenticate.php">
                <label>Username:</label>
                <input type="text" name="username" required>
                <label>Password:</label>
                <input type="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="right">
            <img src="images/college_image.jpg" alt="College Image">
        </div>
    </div>
</body>
</html>