<?php

class Api {
    function DoObject($id, $ip) {
  
  $servername = "";
  $database = "";
  $username = "";
  $password = "";
        // Creating connect
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checking connect status
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM todo WHERE id='$id' AND ip='$ip'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $sql = "UPDATE todo SET zrobione='TRUE' WHERE ip='$ip' AND id='$id'";

            if ($conn->query($sql) === TRUE) {
                $url = "../";
                header('Location: ' . $url);
            } else {
            $url = "../?e=500";
            header('Location: ' . $url);
            }
            



        }
        } else {
            $url = "../";
            header('Location: ' . $url);
        }
    }
    function SelectAllObjects($ip) {
  
  $servername = "";
  $database = "";
  $username = "";
  $password = "";
        // Creating connect
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checking connect status
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM todo WHERE ip='$ip' AND zrobione='FALSE'";
        $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $text = $row['whatlikedo'];
                echo '
                
                        <div class="box">
                            ' . $text .'
                            <div class="form-check form-switch">
                                <input onclick="location.href=&quot;App/do.php?id=' . $id . '&quot;" class="form-check-input" type="checkbox" name="switch" value="do">
                            </div>
                        
                        </div>



                ';
            }
            } else {

            }
        }
    function SelectAllObjectsDo($ip) {
  
  $servername = "";
  $database = "";
  $username = "";
  $password = "";
        // Creating connect
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checking connect status
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM todo WHERE ip='$ip' AND zrobione='TRUE'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $text = $row['whatlikedo'];
            echo '
            
                    <div class="box">
                        ' . $text .'
                        <div class="form-check form-switch">
                            <input onclick="location.href=&quot;App/dod.php?id=' . $id . '&quot;" class="form-check-input" type="checkbox" name="switch" value="do" checked>
                        </div>
                    
                    </div>



            ';
        }
        } else {

        }
    }

    function DodObject($id, $ip) {
  
  $servername = "";
  $database = "";
  $username = "";
  $password = "";
        // Creating connect
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checking connect status
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 

            $sql = "UPDATE todo SET zrobione='FALSE' WHERE ip='$ip' AND id='$id'";

            if ($conn->query($sql) === TRUE) {
                $url = "../";
                header('Location: ' . $url);
            } else {
            $url = "../?e=500";
            header('Location: ' . $url);
            }
            
    }
    function AddObject($ip, $cel) {
  
  $servername = "";
  $database = "";
  $username = "";
  $password = "";
        // Creating connect
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checking connect status
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "INSERT INTO todo (whatlikedo, ip)
        VALUES ('$cel', '$ip')";
        
        if ($conn->query($sql) === TRUE) {
            $url = "../";
            header('Location: ' . $url);
        } else {
            $url = "../?e=500";
            header('Location: ' . $url);
        }

    }
}