<?php

$fileName= $_FILES['myFile']['name'];
$tmp_name=$_FILES['myFile']['tmp_name'];
copy($tmp_name, "source/".$fileName);


/* if ($_FILES["file"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}else{
    $target_path="./Data/avatar/";
    $target_path=$target_path.basename($_FILES["file"]["name"]);
    
    if(file_exists($target_path)){
        echo $_FILES['file']['name']." already exists";
    }else{
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
    }
} */



?>