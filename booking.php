<?php

include "db.php";


// CREATE BOOKING

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $idol = $_POST["idol"];
    $quantity = $_POST["quantity"];
    $booking_date = $_POST["booking_date"];
    $delivery_type = $_POST["delivery_type"];
    $address = $_POST["address"];
    $special_requirements = $_POST["special_requirements"];


    $sql = "INSERT INTO bookings
            (name, mobile, email, idol, quantity, booking_date,
             delivery_type, address, special_requirements)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = $pdo->prepare($sql);


    $stmt->execute([
        $name,
        $mobile,
        $email,
        $idol,
        $quantity,
        $booking_date,
        $delivery_type,
        $address,
        $special_requirements
    ]);


    header("Location: bookings.html?success=1");
    exit();

}


// READ BOOKINGS

$sql = "SELECT id, user_id, name, mobile, email, idol, quantity,
        booking_date, delivery_type, address, special_requirements
        FROM bookings";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Morya | Bookings</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2C1A1D;
            color: #2C1A1D;
            padding: 40px;
        }

        .container {
            max-width: 1400px;
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

        .action-button {
            display: inline-block;
            padding: 8px 15px;
            margin: 2px;
            background-color: #6C534E;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .action-button:hover {
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
            All Bookings
        </h1>

        <table>

            <tr>

                <th>ID</th>

                <th>User ID</th>

                <th>Name</th>

                <th>Mobile</th>

                <th>Email</th>

                <th>Idol</th>

                <th>Quantity</th>

                <th>Booking Date</th>

                <th>Delivery Type</th>

                <th>Address</th>

                <th>Special Requirements</th>

                <th>Action</th>

            </tr>


            <?php foreach ($bookings as $booking) { ?>

                <tr>

                    <td>
                        <?php echo $booking["id"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["user_id"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["name"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["mobile"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["email"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["idol"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["quantity"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["booking_date"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["delivery_type"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["address"]; ?>
                    </td>

                    <td>
                        <?php echo $booking["special_requirements"]; ?>
                    </td>

                    <td>

                        <a
                            href="edit_booking.php?id=<?php echo $booking["id"]; ?>"
                            class="action-button"
                        >
                            Edit
                        </a>

                        <a
                            href="edit_booking.php?id=<?php echo $booking["id"]; ?>&action=delete"
                            class="action-button"
                            onclick="return confirm('Are you sure you want to delete this booking?');"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>


        <a href="bookings.html" class="back-button">
            Back to Booking
        </a>

    </div>

</body>

</html>