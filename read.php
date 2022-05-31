<?php

    require_once 'database/model.php';
    $model = new Fetch();
    $rows = $model->fetch();

?>


<table id="example" class="mdl-data-table">

    <thead>
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>MOBILE</td>
            <td>ACTIONS</td>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            if (!empty($rows)) {
                foreach($rows as $row){

                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td>
                            <a href="#" id="edit" style="font-size: 30px;" value="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="#" style="color: red; font-size: 30px;" id="delete" value="<?php echo $row['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </tbody>


</table>


