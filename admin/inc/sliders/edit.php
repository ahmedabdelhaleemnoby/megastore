<?php
connect();

if (isset($_GET['edit_slider'])) {

    $id = $_GET['id'];


    if (isset($_POST['description'])) {
        $description = strtolower($_POST['description']);
        $update = mysqli_query($con, "UPDATE image SET description='$description' WHERE id='$id' ");
        if ($update) {
?>
            <div class="row">
                <div class="alert col-md-12 alert-success">User Updated Successfully</div>
                <meta http-equiv="refresh" content="1;url=?slider">
            </div>
    <?php
        }
    }
    // var_dump($id)
    $select_id = mysqli_query($con, "SELECT * FROM image WHERE id='$id'");
    $my_id = mysqli_fetch_array($select_id);
    ?>


    <h1 class="text-success mt-4 mb-4 ms-2">Edit <?php echo $_GET['edit_slider']; ?></h1>
    <form action="" method="post">
        <input type="file" class="form-control mb-2" name="image" placeholder="tittle" value="<?php echo $my_id['images']; ?>">
        <input type="text" class="form-control mb-2" name="description" placeholder="tittle" value="<?php echo $my_id['description']; ?>">

        <button type="submit" class=" form-control ">Save</button>

    </form><?php
        }
            ?>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
</script>