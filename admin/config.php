<?php
    function get_all_categories() {
        $mysqli = new mysqli("localhost", "root", "", "moji");

        if($mysqli -> connect_errro) {
            exit("Connection failed: " . $mysqli->connect_error);
        }

        $sql_query = "SELECT * FROM category";
        $statement = mysqli_query($mysqli, $sql_query);

        $categories = array();

        while($row = mysqli_fetch_assoc($statement)) {
            $categories[] = $row;
        }

        mysqli_close($mysqli);
        return $categories;
    }
    
    function get_latest_products() {
        
    }
?>