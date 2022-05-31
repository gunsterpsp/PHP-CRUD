<?php

    include 'database/model.php';
    $model = new Edit();
    $edit_id = $_POST['edit_id'];
    $row = $model->edit($edit_id);

    if (!empty($row)) {
    

        ?>

            <form action="" method="POST" id="form">
                <div>
                <input type="hidden" id="edit_id" value="<?php echo $row['id']; ?>">
                </div>
                    <div class="form-group">
                    <input type="text" id="edit_name" value="<?php echo $row['name']; ?>" placeholder="Name" class="form-control">
                        
                    </div><br>
                    <div class="form-group">
                        <input type="email" id="edit_email" value="<?php echo $row['email']; ?>" placeholder="Email" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <input type="number" id="edit_mobile" value="<?php echo $row['mobile']; ?>" placeholder="Mobile" class="form-control">
                    </div><br>
                    <div class="form-group">
                        <button type="submit" id="update" class="btn btn-primary">Submit</button>
                    </div><br>
                </form>
   


        <?php




    }

?>