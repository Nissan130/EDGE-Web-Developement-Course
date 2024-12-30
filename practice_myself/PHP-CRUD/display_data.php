

<?php
    include('config_database.php');

    $select_query = "SELECT * FROM my_guests";
    $stmt = $conn->prepare($select_query);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    if(count($records)>0) {
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Reg Date</th>
        </tr>";
    foreach($records as $record) {
        echo "<tr>
            <td>".$record['id']."</td>
            <td>".$record['firstname']."</td>
            <td>".$record['lastname']."</td>
            <td>".$record['email']."</td>
            <td>".$record['reg_date']."</td>
        </tr>";
    }
    echo "</table>";
    }
    else {
        echo "No guests registered<br>";
    }
    echo "<a href='insert_data.php'>Add Guest</a>";


?>