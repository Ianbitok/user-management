<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>

        <form action="edit_user.php?id=<?php echo $id; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?php echo $row['role']; ?>" required>
            
            <button type="submit" name="update">Update User</button>
        </form>

        <?php
            } else {
                echo "User not found";
            }
        }

        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $sql = "UPDATE users SET name='$name', email='$email', role='$role' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "User updated successfully";
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>

        <a href="index.php">Back to User List</a>
    </div>
</body>
</html>
