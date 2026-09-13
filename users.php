<?php

include "db.php";


/* DELETE USER */

if (isset($_GET["delete"])) {

    $id = $_GET["delete"];

    $sql = "DELETE FROM users WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$id]);

    header("Location: users.php");

    exit();
}


/* READ USERS */

$sql = "SELECT id, name, email, mobile, created_at FROM users";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Morya | Registered Users</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2C1A1D;
            color: #2C1A1D;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background-color: #DBB3B1;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #F8EEEE;
        }

        th {
            background-color: #6C534E;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #C89FA3;
        }

        .edit-button {
            display: inline-block;
            padding: 8px 15px;
            background-color: #6C534E;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-right: 5px;
        }

        .edit-button:hover {
            background-color: #2C1A1D;
        }

        .delete-button {
            display: inline-block;
            padding: 8px 15px;
            background-color: #6C534E;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .delete-button:hover {
            background-color: #2C1A1D;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6C534E;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>
            Registered Users
        </h1>

        <table>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Mobile</th>

                <th>Created At</th>

                <th>Action</th>

            </tr>


            <?php foreach ($users as $user) { ?>

                <tr>

                    <td>
                        <?php echo $user["id"]; ?>
                    </td>

                    <td>
                        <?php echo $user["name"]; ?>
                    </td>

                    <td>
                        <?php echo $user["email"]; ?>
                    </td>

                    <td>
                        <?php echo $user["mobile"]; ?>
                    </td>

                    <td>
                        <?php echo $user["created_at"]; ?>
                    </td>

                    <td>

                        <a
                            href="edit_user.php?id=<?php echo $user["id"]; ?>"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <a
                            href="users.php?delete=<?php echo $user["id"]; ?>"
                            class="delete-button"
                            onclick="return confirm('Are you sure you want to delete this user?');"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            <?php } ?>


        </table>


        <a href="register.html" class="back-button">
            Back to Register
        </a>

    </div>

</body>

</html>