<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (name, email, mobile, password)
            VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $name,
        $email,
        $mobile,
        $password
    ]);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Morya | Registration Successful</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2C1A1D;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .success-card {
            width: 450px;
            background-color: #DBB3B1;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        .success-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        h1 {
            color: #2C1A1D;
            margin-bottom: 10px;
        }

        p {
            color: #6C534E;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .login-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #6C534E;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .login-button:hover {
            background-color: #2C1A1D;
        }

    </style>

</head>

<body>

    <div class="success-card">

        <div class="success-icon">
            ✓
        </div>

        <h1>
            Account Created Successfully!
        </h1>

        <p>
            Your Morya account has been created successfully.
        </p>

        <a href="login.html" class="login-button">
            Go to Login
        </a>

    </div>

</body>

</html>

<?php

}
