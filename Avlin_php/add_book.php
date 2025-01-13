<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;}
        .form-container {
            width: 400px;
            background-color: paleturquoise;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);}
        fieldset {
            border: none; }
        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: blue;
            text-align: center;}
        table {
            width: 100%;  }
        td {
            padding: 10px;}
        input[type="text"] {
            width: 100%;
            padding: 9px;
            border-radius: 5px;
            border: 1px solid black; }
        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px; }
        input[type="submit"] {
            flex: 1;
            padding: 10px;
            background-color: blue;
            color: white;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;}
        input[type="submit"]:hover {
            background-color: white;
            color: crimson;
            border: 2px solid blue;}
        .error {
            color: red;}
    </style>
</head>
<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "library");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); }
    $bidErr = $titErr = $authErr = $editErr = $publErr = "";
    $bid = $tit = $auth = $edit = $publ = "";
    if (isset($_POST['add'])) {
        if (empty($_POST['bid'])) {
            $bidErr = "Book ID is required";
        } else {
            $bid = test_input($_POST['bid']);}
        if (empty($_POST['tit'])) {
            $titErr = "Book Title is required";
        } else {
            $tit = test_input($_POST['tit']);}
        if (empty($_POST['auth'])) {
            $authErr = "Author Name is required";
        } else {
            $auth = test_input($_POST['auth']);}
        if (empty($_POST['edit'])) {
            $editErr = "Book Edition is required";
        } else {
            $edit = test_input($_POST['edit']);}
        if (empty($_POST['publ'])) {
            $publErr = "Publisher Name is required";
        } else {
            $publ = test_input($_POST['publ']);}
        if (!empty($bid) && !empty($tit) && !empty($auth) && !empty($edit) && !empty($publ)) {
            $sql = "INSERT INTO `book`(`book_id`, `title`, `author`, `edition`, `publis`) VALUES ('$bid','$tit','$auth','$edit','$publ')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Book Details Added Successfully');</script>";
            } else {
                echo "Error Adding Book Details: " . mysqli_error($conn);}}}
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;}?>
    <div class="form-container">
        <form method="post" action="add_book.php">
            <fieldset>
                <legend>Book Details</legend>
                <table> <tr><td>
                            <input type="text" name="bid" placeholder="Enter Book ID" value="<?php echo $bid; ?>">
                            <span class="error"><?php echo $bidErr; ?></span></td></tr><tr><td>
                            <input type="text" name="tit" placeholder="Enter Book Title" value="<?php echo $tit; ?>">
                            <span class="error"><?php echo $titErr; ?></span></td></tr><tr>
                        <td>
                            <input type="text" name="auth" placeholder="Enter Author Name" value="<?php echo $auth; ?>">
                            <span class="error"><?php echo $authErr; ?></span></td></tr><tr>
                        <td>
                            <input type="text" name="edit" placeholder="Enter Book Edition" value="<?php echo $edit; ?>">
                            <span class="error"><?php echo $editErr; ?></span></td></tr><tr>
                        <td>
                            <input type="text" name="publ" placeholder="Enter Publisher Name" value="<?php echo $publ; ?>">
                            <span class="error"><?php echo $publErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="button-group">
                            <input type="submit" name="add" value="Add Book Details"></td></tr>
                </table></fieldset></form>
        <form method="post" action="view_details.php">
            <center><input type="submit" name="view" value="View Book Details"></center></form>
    </div></body>
</html>