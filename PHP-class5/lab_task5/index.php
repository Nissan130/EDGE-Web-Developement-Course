

<?php
    include 'config.php';

    $query = "SELECT * FROM cruding";
    $stmt = $conn -> prepare($query);
    $stmt->execute();
    $records = $stmt->fetchAll();

    // echo $records . "<br>";

    echo "<a href='create.php'>Add New Record</a><br>";
    echo "<form>
        <label>Filter By Category: </label>
        <select name='filter_category' id='filter_category'>
            <option value='All'>All</option>
            <option value='Health'>Health</option>
            <option value='Education'>Education</option>
            <option value='Technology'>Technology</option>
       </select>
       <input type='submit' value='Filter' >
       </form>";
       echo "<br>";

    echo "<table border = '1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Actions</th></tr>";
    

    foreach($records as $record) {
        if($_SERVER["REQUEST_METHOD"] == "GET") {

            $filter_cat= $_GET['filter_category'];
            // echo $filter_cat;
            $flag = 0;
            if($filter_cat =='All'){
                $flag = 1;
            }
            else {
                $flag = 0;
            }
        
        if($record['category'] == $filter_cat or $flag ) {
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
   
}
        
    }
    echo "</table>";

?>