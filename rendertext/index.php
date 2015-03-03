<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Render Text on Image</title>
        <link href="css/style.css" rel="stylesheet" />
    </head>

    <body>
        <?php include_once('upload.php'); ?>

        <!--content_wrapper-->
        <div class="content_wrapper">
            <!--all_content_area-->
            <div class="all_content_area">
                <!--file_title-->
                <div class="file_title">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="file_upload_title">
                            <label>source file</label>
                            <p><input type="file" value="ojk" name="image"/></p>
                        </div>

                        <button class="load_img">load image</button>
                    </form>
                </div>
                <!--file_title-->

                <!--content_field-->
                <form action="" method="POST">
                    <div class="content_field">
                        <div class="content_field_title">
                            <label>EXP Date:</label>
                            <p><input type="text" name="exp_date" placeholder="MM/YY" /></p>
                        </div>

                        <div class="content_field_title">
                            <label>Net Weight:</label>
                            <p><input type="text" name="net_weight" placeholder="Weight" /></p>
                        </div>

                        <div class="content_field_title">
                            <label>Additional Ingredients:</label>
                            <p><p><textarea name="addi_ingre" placeholder="Enter text here...."></textarea></p></p>
                        </div>

                        <div class="content_field_title">
                            <label>Warning text:</label>
                            <p><textarea name="warning" placeholder="Enter text here...."></textarea></p>
                        </div>
                    </div>
                    <!--content_field-->
                    <div class="clear"></div>
                    <?php
                    if (isset($_SESSION['uplaodad_image']) || isset($_POST['text_submit'])) {
                        if (isset($_POST['text_submit'])) {
                            $set_image = $_POST['add_image'];
                        } else {
                            $set_image = $_SESSION['uplaodad_image'];
                        }
                        ?>
                        <input type="text" name="add_image" value="<?php echo $set_image; ?>" style="display: none;"/>
                        <input type="text" name="add_image_ext" value="<?php echo $_SESSION['uplaodad_image_ext']; ?>" style="display: none;"/>
                        <h2 class="render_title"><button name="text_submit">render</button></h2>
                    <?php } ?>
                </form>
                <?php
                if (isset($_SESSION['uplaodad_image'])) {
                    $image = 'images/' . $_SESSION['uplaodad_image'];
                } elseif (isset($_POST['text_submit'])) {
                    $image = 'createimg.php?' . http_build_query($_POST);
                }
                ?>
                <!--image_content-->
                <div class="image_content">
                    <?php if (isset($_SESSION['uplaodad_image']) || isset($_POST['text_submit'])) { ?>
                        <img src="<?php echo $image; ?>" alt="up" />
                        <!-------------------------------->
                    <?php } ?>
                </div>
                <!--image_content-->
                <!--file_title-->
                <?php if (isset($_POST['text_submit'])) { ?>
                    <div class="file_title">
                        <div class="file_upload_title">
                            <label>Destination file</label>
                            <p><input type="text" value="<?= $_POST['add_image']; ?>" readonly/></p>
                        </div>
                        <a href="<?= 'createimg.php?' . http_build_query($_POST); ?>" download="<?= $_POST['add_image']; ?>"><button class="load_img">Export Image</button></a>
                    </div>
                <?php } ?>
                <!--file_title-->
            </div>
            <!--all_content_area-->
            <div class="clear"></div>
        </div>
        <!--content_wrapper-->
    </body>
</html>
