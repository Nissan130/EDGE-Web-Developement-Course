<?php
    include 'config.php';

    $query = "SELECT * FROM cruding";
    $stmt = $conn -> prepare($query);
    $stmt->execute();
    $records = $stmt->fetchAll();

    // echo $records . "<br>";

    echo "<a href='create.php'>Add New Record</a>";
    echo "<table border = '1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Category</th><th>Actions</th></tr>";

    foreach($records as $record) {
        echo "<tr>
            <td>" . $record['id']. "</td>
            <td>" . $record['name']. "</td>
            <td>" . $record['phone']. "</td>
            <td>" . $record['email']. "</td>
            <td>" . $record['category']. "</td>
            <td>
                <a href='update.php?id=" . $record['id']. "'>Edit</a> |
                <a href='delete.php?id=" . $record['id']. "'>Delete</a>|
            </td>
            </tr>"
        ;
    }
    echo "</table>";

?>