<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP Based Problem</title>
</head>

<body>
    <h1>User Role and Activity</h1>
    <form action="lab_task4.php" method="post">
        <label for="username">Enter Your Name:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="email">Enter Your Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="role">Select Your Role:</label>
        <select id="role" name="role" required>
            <option value="student">Student</option>
            <option value="instructor">Instructor</option>
        </select>
        <br><br>
        
        <label for="activity">Enter Activity (Course Name or Task):</label>
        <input type="text" id="activity" name="activity" required>
        <br><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>


<?php
// Base User class
abstract class User {
    protected $username;
    protected $email;

    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }

    abstract public function getRole();

    public function getUserInfo() {
        return "Name: " . $this->username . ",<br>Email: " . $this->email;
    }
}

// Student class
class Student extends User {
    public function getRole() {
        return "Student";
    }

    public function enrollCourse($course) {
        return "Enrolled in the course: " . $course;
    }
}

// Instructor class
class Instructor extends User {
    public function getRole() {
        return "Instructor";
    }

    public function createCourse($courseName) {
        return "Created the course: " . $courseName;
    }
}

// Main logic to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);
    $activity = htmlspecialchars($_POST['activity']);

    try {
        if (empty($username) || empty($email) || empty($role) || empty($activity)) {
            throw new Exception("All fields are required!");
        }

        // Instantiate the appropriate user object based on the role
        $user = null;
        if ($role === "student") {
            $user = new Student($username, $email);
            $message = $user->enrollCourse($activity);
        } elseif ($role === "instructor") {
            $user = new Instructor($username, $email);
            $message = $user->createCourse($activity);
        } else {
            throw new Exception("Invalid role selected.");
        }

        // Display user info and activity
        echo "<h2>User Info</h2>";
        echo $user->getUserInfo();
        echo "<h3>Role: " . $user->getRole() . "</h3>";
        echo "<p>Activity: " . $message . "</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
