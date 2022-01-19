<?php

foreach ($_POST["value"] as $key => $value) {
	
    $data["pos"]=$key+1;
    updatePosition($data, $value);
}
echo "Done sorting";

function updatePosition($data,$id){
    $conn=  mysqli_connect("localhost", "root", "", "cleanware");
	//$conn=  mysqli_connect("localhost", "root", "", "cleanware");
    if(array_key_exists("banner_img", $data)){
        $data["banner_img"]=$this->real_escape_string($data["banner_img"]);
    }
    foreach ($data as $key => $value) {
        $value="'$value'";
        $updates[]="$key=$value";
    }
    $imploadAray=  implode(",", $updates);
    $query="Update banner Set $imploadAray Where banner_id=$id";
    $result=  mysqli_query($conn,$query) or die(mysqli_error($conn));
        if($result){
            return "Category is position";
        }
        else
        {
            return "Error while updating position";
        }
}

?>
