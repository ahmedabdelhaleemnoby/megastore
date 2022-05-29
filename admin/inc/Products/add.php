<div class="container">

    <div class="row">
        <h1 class="text-success mt-4 mb-4">Add Product</h1>
    </div>
    <form action="" method="post">
        <?php
        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $discount = $_POST["discount"];
            $quantity =  $_POST["quantity"];

            if (empty($name)) {
                $error = "please enter name product";
            } elseif (empty($price)) {
                $error = "please enter price";
            } elseif (empty($description)) {
                $error = "please enter description product";
            } elseif (empty($quantity)) {
                $error = "please enter quantity";
            } else {
                connect();
                $select_name = mysqli_query($con, "SELECT name FROM product WHERE name='$name'");
                $count_user = mysqli_num_rows($select_name);
                if ($count_user > 0) {
                    $error = "name is exist";
                } else {
                    $insert = mysqli_query($con, "INSERT INTO product (name,price,description,discount,quantity) 
                        VALUES ('$name','$price','$description','$discount','$quantity')") or die(mysqli_error($con));
                    mysqli_close($con);
                    // close connection

                    if ($insert) {
                        $success = "product Success added";
                    };
                }
            };
        };

        ?>
        <div class="row">
            <!-- <input type="text" class="col-md-12 form-control mb-2"> -->
            <label class="form-label-wrapper">

                <?php if (isset($error)) {

                ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php
                } ?>


                <?php if (isset($success)) {



                ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                    <!-- <meta http-equiv="refresh" content="0;url=inc/admins/done.php"> -->
                <?php
                } ?>

            </label>
        </div>

        <div class="row">
            <input type="text" name="name" class="col-md-12 form-control mb-2" placeholder="Enter name product">
            <br>
            <input type="number" name="price" class="col-md-12 form-control mb-2" placeholder="Enter price">
            <br>
            <input type="text" name="description" class="col-md-12 form-control mb-2" placeholder="Enter description">
            <br>
            <input type="text" name="discount" class="col-md-12 form-control mb-2" placeholder="Enter discount">
            <br>
            <input type="number" name="quantity" class="col-md-12 form-control mb-2" placeholder="Enter quantity">
            <button type="submit" class="btn btn-success col-md-2 mb-2">Add</button>
        </div>
    </form>
</div>