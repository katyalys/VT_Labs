<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<?php


    class GetDatabase
    {
        private $servername = "localhost";
        private $username = "root";
        private $password = "6880051braingames";
        private $dbname = "laba5_task1";

        public $conn;

        public function ConnectDB()
        {
            // Create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            $this->conn->set_charset("utf8");
        }

        public function OutputDB()
        {
            if (empty($this->conn)) {
                die("Not connected to database");
            }

            $sqlUnion = "SELECT * FROM student CROSS JOIN information ON student.id = information.student_id ORDER BY student.username";
            $result = $this->conn->query($sqlUnion) or die($this->conn->error);

                echo "<table><tr><th>username</th><th>password</th><th>email</th><th>data_registration</th><th>gpa</th><th>birth</th><th>internship</th></tr>";
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] . "</td><td>" . $row["data_registration"] . "</td><td>" . $row["gpa"] . "</td><td>" . $row["birth"] . "</td><td>" . $row["internship"] . "</td></tr>";
                }
                echo "</table>";

            $this->conn->close();
        }

    }

    $myDB = new GetDatabase();
    $myDB->ConnectDB();
    $myDB->OutputDB();
?>

