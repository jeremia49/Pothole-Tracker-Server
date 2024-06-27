<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account - PotholeTracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="email"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Account</h1>
        <p>If you wish to delete your PotholeTracker account, please enter your email address below and click the "Delete Account" button. Please note that deleting your account is irreversible and all your data will be permanently removed.</p>
        
        <form action="/delete-account" method="GET">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Delete Account">
        </form>
        
        <p>If you have any questions or need further assistance, please contact us</p>
    </div>
</body>
</html>