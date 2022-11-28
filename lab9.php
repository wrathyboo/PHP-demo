<?php include "header.php" ;
include_once "shopdatabase.php";

$sql_get_category_data = "SELECT * FROM category";
$category = mysqli_query($connect, $sql_get_category_data);

?>



<body>
   <div class="container">
    <div class="category-manage" style="height: 90% ;">
        <h1>Category Managerment</h1>
        <div class="contents d-flex justify-content-between" style="width: 100% ; ">
            <div class="add-category " style="width: 30%; margin-right:30px; height:150px">
                     <div class="card-add" style="height: 20px;">
                        <div class="title bg-primary text-white">
                            Add Product
                        </div>
                        <div class="form-add">
                           <form action="">
                           <div class="">
                              <label for="" class="form-label">Name</label>
                              <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="emailHelpId" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Status</label>
                              <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="emailHelpId" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px">Update</button>
                           </form>
                        </div>
                     </div>
            </div>
            <div class="list" style="width: 70% ;">
            <div class="show-list" style="width: 100%; margin-right:30px">
                     <div class="card-list" style="height: 20px;">
                        <div class="title bg-primary text-white">
                            List
                        </div>
                        <div class="table-responsive">
                            <table class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($category as $data) : ?>
                                    <tr class="">
                                        <td scope="row"><?= $data['id'] ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= ($data['status']) == 1 ? "Available" : "Hidden" ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Edit</button>
                                            <button type="button" class="btn btn-danger">Del</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                     </div>
            </div>
            </div>
        </div>
    </div>
   </div>


</body>




<?php include "footer.php" ?>