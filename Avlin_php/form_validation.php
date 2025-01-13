<html>

<head>
	<title>Form</title>
	<style>
		div {
			background-color: beige;
			margin-left: 250px;
			margin-top: 50px;
			width: 50%;
			padding: 20px;
		}
		table {
			width: 100%;
		}
		td {
			padding: 10px;
		}
		input[type="text"],
		input[type="email"],
		input[type="tel"],
		input[type="date"],
		input[type="password"],
		textarea {
			width: 100%;
			padding: 9px;
		}
		textarea {
			height: 100px;}
		input[type="submit"] {
			width: 50%;
			padding: 8px;
			background-color: crimson;
			color: white;
			border: 2px solid white;
			display: block;
			margin: 20px auto;
		}
		.error {
            color: red;
            font-size: 14px;
        }
        .success {
            color: green;
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<?php
$na = $em = $pass = $phone = "";
$naErr = $emErr = $passErr = $phErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $naErr = "Name is required";
    } else {
        $na = input($_POST["name"]);
    }
	if (empty($_POST["email"])) {
        $emErr = "Email is required";
    } else {
        $em = input($_POST["email"]);
    }
	if (empty($_POST["pass"])) {
        $passErr = "Password is required";
    } elseif (strlen($_POST["pass"]) <= 5) {
        $passErr = "Password must be greater than 5 characters";
    } else {
        $pass = input($_POST["pass"]);
    }
	if (empty($_POST["ph"])) {
        $phErr = "Phone number is required";
    } elseif (strlen($_POST["ph"]) != 10) {
        $phErr = "Phone number must be exactly 10 digits";
    } elseif (!is_numeric($_POST["ph"])) {
        $phErr = "Phone number must contain only numbers";
    } else {
        $phone = input($_POST["ph"]);
    }

}
function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<body>
    <div>
        <h2 style="text-align: center;">Registration Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <legend>Personal Details</legend>
                <table>
                    <tr>
                        <td><label for="name">First Name:</label></td>
                        <td>
                            <input type="text" id="name" name="name" placeholder="Enter your first name" value="<?php echo htmlspecialchars($na); ?>">
                            <span class="error"><?php echo $naErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td>
                            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($em); ?>">
                            <span class="error"><?php echo $emErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="pass">Password:</label></td>
                        <td>
                            <input type="password" id="pass" name="pass" placeholder="Enter your password">
                            <span class="error"><?php echo $passErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ph">Phone Number:</label></td>
                        <td>
                            <input type="tel" id="ph" name="ph" placeholder="Enter your phone number" value="<?php echo htmlspecialchars($phone); ?>">
                            <span class="error"><?php echo $phErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="SIGN IN">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
</body>

</html>