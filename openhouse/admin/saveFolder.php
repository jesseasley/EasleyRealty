<?php
    $exists = 0;
    $dir = scandir("../data");
    $paths = "";
    for ($x = 1; $x < count($dir);$x++){
        if ($dir[$x] > ""){
            if ($dir[$x] != "."){
                if ($dir[$x] != ".."){
                    if ($dir[$x] == $_POST["folder"]){
                        $exists = 1;
                    }
                }
            }
        }
    }

    if ($exists == 1)
        echo "exists";
    else{
        mkdir("../data/" . $_POST["folder"]);
        file_put_contents("../data/" . $_POST["folder"] . "/registrations.json", "{\"registered\": []}");
        echo "created";
    }
?>
