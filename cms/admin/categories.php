<?php include "includes/admin_header.php" ?>


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
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php
                                /// INSERTING DATA TO CATAGORIES TABLE
                                insert_categories();
                            ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form><br>  
                            
                            
                            <form action="" method="post">
                                    <?php ///these codes updates and edit the categories
                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                            $query = "SELECT * FROM catagories WHERE cat_id = $cat_id ";
                                            $select_cat_id = mysqli_query($connection, $query);
                                            $row = mysqli_fetch_assoc($select_cat_id);
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                    ?>
                                    <div class="form-group">
                                        <label for="cat_title">Update Category</label>
                                        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if(isset($_POST['update'])){
                                            $the_cat_title = $_POST['cat_title'];
                                    $query = "UPDATE catagories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                                            $update_query = mysqli_query($connection, $query);
                                            if(!$update_query){
                                                die("wrong " . mysqli_error($connection));
                                            }
                                        }
                                    ?>
                            </form>
                            
                            
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete Category</th>
                                        <th>Edit Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php //// show the categories in the table
                                    show_categories();
                                    ?>  
                                <?php //// delete categories
                                    delete_categories();
                                ?>
                                </tbody>
<!--
                                Example
                                <tbody>
                                    <tr>
                                        <td>BaseBall</td>
                                        <td>basketBall</td>
                                    </tr>
                                </tbody>
-->
                            </table>
                            
                        </div>
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
