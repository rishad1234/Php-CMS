<form action="" method="post">                        
                        <table class="table table-bordered table-hover">
                            
                    <div id="bulkOptionContainer" class="col-xs-4">    
                        <select class="form-control" name="" id="">
                            <option value="">Select Options</option>
                            <option value="">Publish</option>
                            <option value="">Draft</option>
                            <option value="">Delete</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <input type="submit" name="submit" class="btn btn-success" value="Appy">
                        <a class="btn btn-primary" href="add_post.php">Add new</a>
                    </div>
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAllBoxes"></th>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT * FROM posts";
                                $select_posts = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_posts)){
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_title = $row['post_title'];
                                    $post_catagory_id = $row['post_catagory_id'];
                                    $post_status = $row['post_status'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    $post_date = $row['post_date'];
                                    
                                    echo "<tr>";
                                    ?>
                    <td><input class='checkBoxes' type='checkbox' name='checkBOxArray[]' value='<?php echo $post_id; ?>'></td>
                                    <?php
                                    echo "<td>{$post_id}</td>";
                                    echo "<td>{$post_author}</td>";
                                    echo "<td>{$post_title}</td>";
                                    
                                    $query = "SELECT * FROM catagories WHERE cat_id = $post_catagory_id ";
                                    $select_cat_id = mysqli_query($connection, $query);
                                    $row = mysqli_fetch_assoc($select_cat_id);
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td>{$post_status}</td>";
                                    echo "<td><img src = '../images/{$post_image}' style='width:80px'></td>";
                                    echo "<td>{$post_tags}</td>";
                                    echo "<td>{$post_comment_count}</td>";
                                    echo "<td>{$post_date}</td>";
                                    echo "<td><a href='post.php?delete={$post_id}'>Delete</a></td>";
                                    echo "<td><a href='post.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                    echo "</tr>";  
                                }
                            ?>    
                            </tbody>
                        </table>
</form>

    <?php
        if(isset($_GET['delete'])){
            $post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$post_id} ";
            
            $delete_query = mysqli_query($connection, $query);
            confirmQuery($delete_query);
            
            header("Location: post.php");
        }
    ?>

































