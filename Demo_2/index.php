<?php
include "header.php";
include_once "config/connect.php";
$query_SelectAll_category = "SELECT * FROM category";
$query_SelectAll_product = "SELECT * FROM product";
$category = mysqli_query($connect, $query_SelectAll_category);
$product = mysqli_query($connect, $query_SelectAll_product);
if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $img = $_POST['img'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale'];
    $content = $_POST['content'];
    $query = "INSERT INTO `product` (`id`, `name`, `image`, `status`, `price`, `sale_price`, `category_id`, `content`, `created_at`) VALUES ('', '$name', '$img', '$status', '$price', '$sale', '$category_id', '$content', current_timestamp())";
    mysqli_query($connect,$query);
    echo "Product Added successfully";
    header('location: https://formsubmit.co/0e6b51872b4393271dbfa08bb0655fc8');
}
?>



<body>
<div class="container">
    <div class="category-manage" style="height: 170px ;">
        <h1>Category</h1>
            <div class="list">
            <div class="show-list" style="width: 100%; margin-right:30px">
                     <div class="card-list" style="height: 20px;">
                        <div class="title bg-primary text-white">
                            List
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($category as $data) : ?>
                                    <tr class="">
                                        <td scope="row"><?= $data['id'] ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><span class="bg-<?= ($data['status']) == 1 ? "success" : "warning" ?> text-light rounded"><?= ($data['status']) == 1 ? "Available" : "Hidden" ?></span></td>
                                       
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
   <div class="container">
    <div class="category-manage" style="height: 90% ; margin-top:200px">
        <h1>Products Managerment</h1>
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
                              <input type="" class="form-control" name="name" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Image</label>
                              <input type="" class="form-control" name="img" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Category</label>
                              <input type="" class="form-control" name="category_id" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Status</label>
                              <input type="" class="form-control" name="status" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Price</label>
                              <input type="" class="form-control" name="price" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Sale Price</label>
                              <input type="" class="form-control" name="sale" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <div class="">
                              <label for="" class="form-label">Description</label>
                              <input type="" class="form-control" name="content" id="" aria-describedby="emailHelpId" placeholder="Input field">
                              <small id="" class="form-text text-muted"></small>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px" name="submit">Update</button>
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Sale Price</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product as $data) : ?>
                                    <tr class="">
                                        <td scope="row"><?= $data['id'] ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><img src="<?= $data['image'] ?>" alt="" style="width:45px;height:45px"></td>
                                        <td><?= ($data['status']) == 1 ? "Available" : "Hidden" ?></td>
                                        <td><?= $data['price'] ?></td>
                                        <td><?= $data['sale_price'] ?></td>
                                        <td><?php foreach ($category as $cat): 
                                            if ($cat['id'] == $data['category_id']) {
                                                echo $cat['name'];
                                                break;
                                            } endforeach; ?></td>
                                        <td><?= $data['content'] ?></td>
                                        <td>
                                           <div class="d-flex justify-content-between">
                                           <button type="button" class="btn btn-primary">Edit</button>
                                            <button type="button" class="btn btn-danger"><a class="text-light" href="actions/delete-process.php?product_id=<?=$data["id"]; ?>" style="text-decoration:none">Del</a></button>
                                           </div>
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








<?php include "footer.php"; ?>