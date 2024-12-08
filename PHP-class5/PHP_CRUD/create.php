<?php
    include 'config.php';

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $query = "INSERT INTO cruding(name, phone, email) VALUES(:name, :phone, :email)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':phone',$phone);
        $stmt->bindParam(':email',$email);
        $stmt->execute();

        header("Location: index.php");
    }

    echo "<form method='POST'>
        <label>Name: </label><br>
        <input type='text' name='name' required ><br>

        <label>Phone: </label><br>
        <input type='text' name='phone' required ><br>

        <label>Email: </label><br>
        <input type='email' name='email' required ><br>
        <input type='submit' value='ADD' >
        </form>
    "


?>