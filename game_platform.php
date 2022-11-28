<?php 

    include_once 'connect.php';
    $sql = "SELECT * FROM platform";
    $result = mysqli_query($connect, $sql);

?>
<?php include "header.php" ?>

<div class="container">
<h1>Available Game Platforms</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Platform</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result as $row) :?>
            <tr>
                <td><?= $row['id']?></td>
                <td><?= $row['name']?></td>
                <td><?= $row['status'] == 1 ? "Available" : "Not available"?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php include "footer.php" ?>