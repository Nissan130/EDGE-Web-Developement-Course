
<?php
    include('config_database.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            $inser_query = "INSERT INTO my_guests(firstname, lastname, email) VALUES(:firstname, :lastname, :email)";
            $stmt = $conn->prepare($inser_query);


            $stmt->bindParam(':firstname',$firstname );
            $stmt->bindParam(':lastname',$lastname );
            $stmt->bindParam(':email',$email );

            if( $stmt->execute()) {
                    $last_id = $conn->lastInsertId();
                    echo "<script>alert('Data is inserted succefully. Last insert id:')</script>". $last_id;
                    
            } 
            else {
                echo "Data not inserted";
            }
            header('location: display_data.php');
        }

        
?>

<form action="" method="POST">
    <label for="firstname">First Name: </label>
    <input type="text" name="firstname" ><br><br>
    <label for="lastname">Last Name: </label>
    <input type="text" name="lastname" ><br><br>
    <label for="email">Email: </label>
    <input type="email" name="email" ><br><br>
    <input type="submit" value="Submit">
</form>