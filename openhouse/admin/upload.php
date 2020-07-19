<?php
    //echo "..\\data\\" . $_REQUEST["current_folder"] . "\\" . "<br>";
    $target_dir = "uploads/";
    $target_dir = "..\\data\\" . $_REQUEST["current_folder"] . "\\";
    $json = "";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check == false) {
            $json .= "{\"message\":\"File is not an image.\"}";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file already exists.\"}";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"That file is greater than the 500Mb limit.\"}";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        if ($json > "")
            $json .= ",";
        $json = "{\"message\":\"Only JPG, JPEG, PNG & GIF files are allowed.\"}";
        //echo $imageFileType;
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        if ($json > "")
            $json .= ",";
        $json .= "{\"message\":\"Your file was not uploaded.\"}";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.\"}";
        } else {
            if ($json > "")
                $json .= ",";
            $json .= "{\"message\":\"There was an error uploading your file.\"}";
        }
    }
    if ($uploadOk == "1")
        $uploadOk = "success";
    else
        $uploadOk = "failure";
    $json = "{\"status\":\"" . $uploadOk . "\", \"messages\":[" . $json . "]}";
    echo $json;
?>