<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>
        <form action="add_user.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>
            
            <button type="submit" name="submit">Add User</button>
        </form>
        <a href="index.php">Back to User List</a>

        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $sql = "INSERT INTO users (name, email, role) VALUES ('$name', '$email', '$role')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New user added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
