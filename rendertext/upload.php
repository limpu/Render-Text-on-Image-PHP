<?php

if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

    $extensions = array("jpeg", "jpg", "png");
    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    if (empty($errors) == true) {
        $filename = str_replace(' ', '', $file_name);
        $new_name = 'ext_' . $filename;
        move_uploaded_file($file_tmp, "images/" . strtolower($new_name));

        $_SESSION['uplaodad_image'] = $new_name;
        $_SESSION['uplaodad_image_ext'] = $file_ext;
    } else {
        print_r($errors);
    }
}







