<?php

if (!empty($_FILES["image"])) {
    // var_dump( $_FILES['image']);
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (! in_array($file_extension, $allowed_image_extension)) {
        $picture_error = 'Picture must be jpg | png | jpeg';
    }    // Validate image file size
    else if (($_FILES["image"]["size"] > 2000000)) {
        $picture_error = 'Picture must be 2 mb ';
    }    // Validate image file dimension
    else if ($width > "2000" || $height > "2000") {
        $picture_error = ' Width picture must > 2000 | < 800';
    } else {
        $target = "../assets/images/" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            $image = basename($_FILES["image"]["name"]);
        } else {
            $picture_error = 'Picture Not Stored';
        }
    }
}else{
    return 'not found';
}