<div class="container">

    <div class="row">
        <h1 class="text-success mt-4 mb-4">Add images</h1>
    </div>
    <form action="" method="post">
        <?php
        if (isset($_POST["image"])) {
            connect();
            $tittle = $_POST["image"];
            if (empty($tittle)) {
                $error = "please upload your image";
            } else {
                $select_tittle = mysqli_query($con, "SELECT images FROM image WHERE images='$tittle'");
                $count_tittle = mysqli_num_rows($select_tittle);
                if ($count_tittle > 0) {
                    $error = "tittle is exist";
                } else {
                    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '../../upload';
                    $avatar = '';
                    if ($_FILES["images"]['error'] == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["images"]['tmp_name'];
                        $image = basename($_FILES["images"]['name']);
                        move_uploaded_file($tmp_name, "$uploads_dir/$image");
                    } else {
                        $default = "../../upload/nophoto.jpg";
                    }

                    $insert = mysqli_query($con, "INSERT INTO image (images) 
                        VALUES ('$tittle')") or die(mysqli_error($con));
                    mysqli_close($con);
                    // close connection

                    if ($insert) {
                        $success = "images Success added";
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

        <div class="row ">
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload image</label>
                <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
            </div>
            <br>
            <button type="submit" class="btn btn-success col-md-2 mb-2 mt-2 ms-2">Add</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="js/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
    });
</script>