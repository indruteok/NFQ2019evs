<?php

session_start();

function connect() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "evs";
    $conn = mysqli_connect($host, $user, $pass, $db);
    mysqli_set_charset($conn, "utf8"); // put your code here
    return $conn;
}

$connection = connect();

class CRUD {

    public $conn;

    public function countAverageTimeReturn() {
        $servicedTime = mysqli_query($this->conn, "SELECT `servicedTime` FROM `serviced` ");
        $startTime = mysqli_query($this->conn, "SELECT `startTime` FROM `serviced` ");

        $total = mysqli_num_rows($servicedTime);

        $i = 0;
        $average = 0;
        while ($i < $total) {
            $servicedTimeVisi = mysqli_fetch_assoc($servicedTime);
            $servicedTimeVisi['servicedTime'];
            $startTimeVisi = mysqli_fetch_assoc($startTime);
            $startTimeVisi['startTime'];
            $countTime = abs(strtotime($servicedTimeVisi['servicedTime']) - strtotime($startTimeVisi['startTime']));
            $i++;

            $min = $countTime / $total / 10;
            $average = $average + $min;
        }


        $ats = round($average / $total);
        return $ats;

        //mysqli_close($this->conn);
    }

    public function getRowInvite($min) {
        $taip = "taip";
        $x = 0;
        $query = mysqli_query($this->conn, "SELECT * FROM `user` "
                . "LEFT JOIN `serviced` "
                . "ON user.id=serviced.userid  "
                . "WHERE `status` IS NULL"
                . " ORDER BY `number` LIMIT 5 OFFSET 1");
        $total = mysqli_num_rows($query);

        $i = 0;
        while ($i < $total) {
            $usersVisi = mysqli_fetch_assoc($query);
            echo "<b> eilės numeris " . htmlspecialchars($usersVisi['number']) . "</b>";
            $x = $x + $min;
            echo "<br>liko laukti apie " . $x . " minutes(-čių)";
            echo "<hr>";
            $i++;
        }
        // mysqli_close($this->conn);
    }

    public function getInvite() {
        $query = mysqli_query($this->conn, "SELECT MIN(number) FROM user "
                . "LEFT JOIN `serviced` "
                . "ON user.id=serviced.userid  "
                . "WHERE `status` IS NULL");

        $row = mysqli_fetch_array($query);
        echo $row[0];

        mysqli_close($this->conn);
    }

    public function create($name, $lastname) {
        $name = addslashes($name);
        $lastname = addslashes($lastname);
        $time = date("H:i");

        $query1 = mysqli_query($this->conn, "SELECT MAX(number) FROM user ");
        $row = mysqli_fetch_array($query1);
        echo "Jūsų eilės numeris ";
        echo $one = $row[0] + 1;

        $query = mysqli_query($this->conn, "INSERT INTO `user` SET `name` = '" . $name . "', "
                . "`lastname`='" . $lastname . "', "
                . "`time`='" . $time . "',"
                . "`number`='" . $one . "'");
        mysqli_close($this->conn);
    }

    public function identification() {
        $number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);
        $number;
        $query1 = mysqli_query($this->conn, "SELECT number FROM user WHERE number = '" . $number . "'");
        $count = mysqli_num_rows($query1);

        if ($count == 1) {
            if (!isset($_SESSION['number'])) {
                $_SESSION['number'] = $number;
            }
        }
        //  mysqli_close($this->conn);
    }

    public function getLeftTime($ats) {

        $query = mysqli_query($this->conn, "SELECT count(number)*'" . $ats . "' FROM user "
                . "LEFT JOIN `serviced` "
                . "ON user.id=serviced.userid  "
                . "WHERE `status` IS NULL AND number<'" . $_SESSION['number'] . "'");

        $row = mysqli_fetch_array($query);
        echo $row[0];

        //  mysqli_close($this->conn);
    }

    public function getUserId($idNumber) {
        $query = mysqli_query($this->conn, "SELECT `user`.* FROM `user`"
                . "LEFT JOIN `serviced`"
                . "ON user.id=serviced.userid  "
                . "WHERE (`status` IS NULL) AND (`number`='" . $idNumber . "')"
                . " ORDER BY `number` ");

        $usersVisi = mysqli_fetch_assoc($query);
        $usersVisi['id'];
        echo '</b><br><a href="editUser.php?id=' . $usersVisi['id'] . '" >Pavėlinti apsilankymą/ Redaguoti duomenis</a>';
        echo '<br><a href="delete.php?id=' . $usersVisi['id'] . '" >Atšaukti apsilankymą</a>';
        echo "<hr>";

        mysqli_close($this->conn);
    }

    public function getEdit($id) {
        $id = $id;
        $query = mysqli_query($this->conn, "SELECT * FROM  `user` WHERE `id` = '" . $id . "'");
        $usersVisi = mysqli_fetch_array($query);
        mysqli_close($this->conn);
        return $usersVisi;
    }

    public function updateUser($id, $name, $lastname, $visit) {
        $id = addslashes($id);
        $name = addslashes($name);
        $lastname = addslashes($lastname);
        $number = $_SESSION['number'];
        $number2 = $number + 1;
        $maxNumber = mysqli_query($this->conn, "SELECT MAX(number) FROM user ");

        if ($visit = "yes") {
            if ($number = $maxNumber) {
                echo "pavėlinti negalime..";
            } else {
                $query = mysqli_query($this->conn, "UPDATE `user` SET `name` = '" . $name . "', "
                        . "`lastname`='" . $lastname . "'"
                        . "WHERE `id` = '" . $id . "' ");
                $query2 = mysqli_query($this->conn, "UPDATE `user` SET `number` = '" . $number . "' "
                        . "WHERE `number` = '" . $number2 . "' ");
                $query3 = mysqli_query($this->conn, "UPDATE `user` SET `number` = '" . $number2 . "'"
                        . "WHERE `id` = '" . $id . "' ");
            }
        } else {
            $query = mysqli_query($this->conn, "UPDATE `user` SET `name` = '" . $name . "', "
                    . "`lastname`='" . $lastname . "', "
                    . "WHERE `id` = '" . $id . "' ");
        }
        mysqli_close($this->conn);
    }

    public function getAllToSpec() {
        $query = mysqli_query($this->conn, "SELECT `user`.* FROM `user`"
                . "LEFT JOIN `serviced`"
                . "ON user.id=serviced.userid  "
                . "WHERE `status` IS NULL"
                . " ORDER BY `number` ");

        $total = mysqli_num_rows($query);

        $i = 0;
        while ($i < $total) {
            $usersVisi = mysqli_fetch_assoc($query);

            echo "Eilės numeris<b> " . $usersVisi['number'];
            echo "</b>. Vardas:<b> " . htmlspecialchars($usersVisi['name']);
            echo "</b>. Pvardė:<b> " . htmlspecialchars($usersVisi['lastname']);
            echo "</b>. Atvyko:<b> " . $usersVisi['time'];
            echo '</b> <a href="serviced.php?id=' . $usersVisi['id'] . '" >Aptarnauta</a>';
            echo '<br><a href="edit.php?id=' . $usersVisi['id'] . '" >readaguoti</a>';
            echo '<br><a href="delete.php?id=' . $usersVisi['id'] . '" >Ištrinti</a>';
            echo "<hr>";
            $i++;
        }
        mysqli_close($this->conn);
    }

    public function servised($id) {
        $id = addslashes($id);
        $aptarnauta = "taip";
        $servicedTime = date("H:i");

        $query1 = mysqli_query($this->conn, "SELECT MAX(`servicedTime`) FROM `serviced` ");
        $row = mysqli_fetch_array($query1);
        $query1 = $row[0];

        $query = mysqli_query($this->conn, "INSERT INTO `serviced` SET `userid` = '" . $id . "', "
                . "`status`='" . $aptarnauta . "',"
                . "`servicedTime`='" . $servicedTime . "',"
                . "`startTime`='" . $query1 . "'");

        mysqli_close($this->conn);
    }

    public function update($id, $name, $lastname, $time) {
        $id = addslashes($id);
        $name = addslashes($name);
        $lastname = addslashes($lastname);
        $time = addslashes($time);

        $query = mysqli_query($this->conn, "UPDATE `user` SET `name` = '" . $name . "', "
                . "`lastname`='" . $lastname . "', "
                . "`time`='" . $time . "'"
                . "WHERE `id` = '" . $id . "' ");
        mysqli_close($this->conn);
    }

    public function delete($id) {
        $id = addslashes($id);
        $query = mysqli_query($this->conn, "DELETE FROM `user` WHERE `id` = '" . $id . "'");
        mysqli_close($this->conn);
    }

}

$crud = new CRUD;
$crud->conn = $connection;
?>