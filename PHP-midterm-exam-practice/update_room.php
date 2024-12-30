<?php
    include 'dbconnect.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM rooms WHERE id=:id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $record = $stmt->fetch();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // $id = $_POST['id'];
        $type = $_POST['room_type'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $update_query = "UPDATE rooms SET type=:type, price=:price, status=:status WHERE id=:id ";
        $stmt = $conn->prepare($update_query);
        $stmt->bindParam(':type',$type);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':status',$status);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        

        if($stmt->execute()) {
            echo "<script>alert('Room updated successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            
        } else {
            echo "<script>alert('Something went wrong');</script>";
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hotel Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_room.php">Add Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Update Room</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Delete Room</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <form method="post">
            <h2>Update Room</h2>
            <div class="mb-3">
                <label for="room_type" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="room_type" name="room_type" value="<?php echo $record['type'] ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $record['price'] ?>"  >
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="<?php echo $record['status'] ?>"><?php echo $record['status'] ?></option>
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
               </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>