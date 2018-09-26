<?php include "includes/admin_header.php" ?>

<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
        
    }
?>

<?php
    if(isset($_POST['edit_user'])){
        //$the_user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE username = '{$_SESSION['username']}' ";
        
        $user_update = mysqli_query($connection, $query);
        confirmQuery($user_update);
    }
?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    
    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    
    <div class="form-group">
        <select name="user_role" id="user_role">
            <option value="subscriber"><?php echo $user_role;?></option>
            <?php
                if($user_role == "admin"){
                    echo '<option value="subscriber">subscriber</option>';
                }else{
                    echo '<option value="admin">admin</option>';
                }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
    
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
</form>
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php" ?>