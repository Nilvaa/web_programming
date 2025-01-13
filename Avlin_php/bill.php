<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            max-width: 1200px;
            gap: 50px;
        }
        form {
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            background-color: beige;
        }
        .result {
            width: 45%;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: beige;
        }
        table {
            width: 100%;
        }
        td {
            padding: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 9px;
            border-radius: 5px;
            border: 1px solid black;
        }
        input[type="submit"] {
            width: 50%;
            padding: 8px;
            background-color: crimson;
            color: white;
            border: 2px solid white;
            display: block;
            margin: 20px auto;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: white;
            color: crimson;
            border: 2px solid crimson;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <legend>Consumer Details</legend>
                <table>
                    <tr>
                        <td><label for="name">Consumer Name:</label></td>
                        <td>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" placeholder="Enter your name">
                            <span class="error"><?php echo $nameErr ?? ''; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="units">Units Consumed:</label></td>
                        <td>
                            <input type="number" id="units" name="units" value="<?php echo htmlspecialchars($units ?? ''); ?>" placeholder="Enter number of units">
                            <span class="error"><?php echo $unitsErr ?? ''; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Calculate Bill">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <div class="result">
        <h3>Bill Details</h3>
        <?php
        $name = $units = $bill = $nameErr = $unitsErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = input($_POST["name"]);
            }
            if (empty($_POST["units"])) {
                $unitsErr = "Units consumed are required";
            } elseif (!is_numeric($_POST["units"]) || $_POST["units"] < 0) {
                $unitsErr = "Please enter a valid number of units";
            } else {
                $units = input($_POST["units"]);
                if ($units <= 100) {
                    $bill = $units * 5;
                } elseif ($units <= 200) {
                    $bill = (100 * 5) + (($units - 100) * 7.5);
                } else {
                    $bill = (100 * 5) + (100 * 7.5) + (($units - 200) * 10);
                }
            }
        }
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($bill !== "") {
            echo "<p>Consumer Name: <i>" . $name . "</i></p>";
            echo "<p>Units Consumed: <i>" . $units . "</i></p>";
            echo "<p>Total Bill: Rs. <i>" . number_format($bill, 2) . "</i></p>";
        }
        ?>
    </div>
</div>
</body>
</html>
