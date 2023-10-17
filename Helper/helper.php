<?php
if (!empty($_POST["picture"])) {
    // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["picture"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (! in_array($file_extension, $allowed_image_extension)) {
        $picture_error = 'Picture must be jpg | png | jpeg';
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
        $picture_error = 'Picture must be 2 mb ';
    }    // Validate image file dimension
    else if ($width > "300" || $height > "200") {
        $picture_error = ' Width picture must > 200 | < 300';
    } else {
        $target = "image/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target)) {
            $image = $target;
        } else {
            $picture_error = 'Picture Not Stored';
        }
    }
}