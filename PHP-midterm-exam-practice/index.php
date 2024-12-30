<?php
    include 'dbconnect.php';
    $query = "SELECT * from rooms";
    $stmt = $conn -> prepare($query);
    $stmt->execute();
    $records = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hotel Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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


<div class="container">
     <h2>Dashboard</h2>
    <table border='1' class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>Room ID</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
                foreach($records as $record) {
                    echo "<tbody>
                        <tr>
                            <td>".$record['id']."</td>
                            <td>".$record['type']."</td>
                            <td>"."$".$record['price']."</td>
                            <td>".$record['status']."</td>
                            <td class='text-center'>
                              <a href='update_room.php?id=".$record['id']." 'class='btn btn-success'>Update</a>
                              <a href='delete_room.php?id=".$record['id']." 'class='btn btn-danger'>Delete</a>
                        </tr>
                    </tbody>";
                }
        ?>

    </table>
</div>
   
</body>

</html>