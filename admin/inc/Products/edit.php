<?php
connect();

if (isset($_GET['edit_Product'])) {

    $id = $_GET['id'];


    if (isset($_POST['name'])) {
        $tittle = strtolower($_POST['name']);
        $price = $_POST["price"];
        $description = strtolower($_POST['description']);
        $discount = $_POST["discount"];
        $quantity =  $_POST["quantity"];
        $update = mysqli_query($con, "UPDATE product SET name='$tittle',price='$price' , description='$description' ,discount='$discount' , quantity='$quantity'WHERE id='$id' ");
        if ($update) {
?>
            <div class="row">
                <div class="alert col-md-12 alert-success">product Updated Successfully</div>
                <meta http-equiv="refresh" content="1;url=?Product">
            </div>
    <?php
        }
    }
    $select_user = mysqli_query($con, "SELECT * FROM product WHERE id='$id'");
    $user = mysqli_fetch_array($select_user);
    ?>


    <h1>Edit <?php echo $_GET['edit_Product']; ?></h1>
    <form action="" method="post">
        <input type="text" class="form-control mb-2" name="name" placeholder="name product" value="<?php echo $user['name']; ?>">
        <input type="number " class=" form-control mb-2" name="price" placeholder="Enter price" value="<?php echo $user['price']; ?>">
        <input type="text " class=" form-control mb-2" name="description" placeholder="Enter description" value="<?php echo $user['description']; ?>">
        <input type="text " class=" form-control mb-2" name="discount" placeholder="Enter discount" value="<?php echo $user['discount']; ?>">
        <input type="number " class=" form-control mb-2" name="quantity" placeholder="Enter quantity" value="<?php echo $user['quantity']; ?>">
        <button type="submit" class=" form-control ">Save</button>

    </form>
<?php
}
?>