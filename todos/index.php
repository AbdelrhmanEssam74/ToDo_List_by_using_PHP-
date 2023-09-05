<?php

require "conn.php";


$data = $conn->query("SELECT * FROM tasks");
$data->execute();
$rows = $data->fetchAll(PDO::FETCH_OBJ);

$completed = $conn->query("SELECT * FROM Tasks_completed");
$completed->execute();
$completed_rows = $completed->fetchAll(PDO::FETCH_OBJ);


?>

<?php include "header.php"; ?>
<div class="container">
    <form method="POST" action="insert.php" class="form-inline" id="user_form">

        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">create</label>
            <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task">
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Insert" />
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Time</th>
                <th>Done</th>
                <th>update</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>

                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->task_name; ?></td>
                    <td><?php echo $row->created_at; ?></td>
                    <td><a href="delete.php?del_id=<?php echo $row->id; ?>" class="btn btn-success">Done</a></td>
                    <td><a href="update.php?upd_id=<?php echo $row->id; ?>" class="btn btn-warning">update</a></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
    <h3>Tasks completed</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($completed_rows as $r) : ?>
                <tr>

                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $r->task_name; ?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>




<?php include "footer.php"; ?>