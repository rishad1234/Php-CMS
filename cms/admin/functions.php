
<?php

    function confirmQuery($result){
        global $connection;
        if(!$result){
            die("wrong " . mysqli_error($connection));
        }
    }


    function insert_categories(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];

            if($cat_title == "" || empty($cat_title)){
                echo "<b>This field should not be empty</b>";
            }else{
                $query = "INSERT into catagories(cat_title) ";
                $query .= "VALUE('{$cat_title}')";

                $create_catagory_query = mysqli_query($connection, $query);
                if(!$create_catagory_query){
                    die("query failed " . mysqli_error($connection));
                }
            }
        }                     
    }
    function delete_categories(){
        global $connection;
        if(isset($_GET['delete'])){
            echo "getting";
            $the_cat_id = $_GET['delete'];
            echo $the_cat_id;
            $query = "DELETE FROM catagories WHERE cat_id = {$the_cat_id} ";
            $delete_query = mysqli_query($connection, $query);
            if(!$delete_query){
                die("wrong " . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
    }

    function show_categories(){
        global $connection;
        $query = "SELECT * FROM catagories";
        $select_catagories = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_catagories)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";   
        }
    }
?>