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
<main>
    <form method="POST">
        <input type="number" name='number1'><br>
        <input type="submit" name="enter" value="Enter"><br>

        <?php

        class GetDatabase
        {

            private $servername = "localhost";
            private $username = "root";
            private $password = "6880051braingames";
            private $dbname = "laba5_var4";

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

                $sqlUnion = "SELECT DISTINCT Singer, Year FROM Artists ORDER BY RAND()";

                $result = $this->conn->query($sqlUnion) or die($this->conn->error);

                if (isset($_POST['number1']) && is_numeric($_POST['number1'])) {
                    $number = (int)$_POST['number1'];

                    if ($result->num_rows > 0) {

                        echo "<table><tr><th>Singer</th><th>Year</th></tr>";
                        $i =0;
                        while (($row = $result->fetch_assoc()) && ($i < $number)) {
                            echo "<tr><td>" . $row["Singer"] . "</td><td>" . $row["Year"] . "</td></tr>";
                            $i++;
                        }
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }

                }

                $this->conn->close();
            }

        }

        $myDB = new GetDatabase();
        $myDB->ConnectDB();
        $myDB->OutputDB();
        ?>
    </form>
</main>
</body>
</html>
