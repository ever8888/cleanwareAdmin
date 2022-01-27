<?php

foreach ($_POST["value"] as $key => $value) {
	
    $data["pos"]=$key+1;
    updatePosition($data, $value);
}
echo "Done sorting";

function updatePosition($data,$id){
    $conn=  mysqli_connect("localhost", "root", "", "cleanware");
	//$conn=  mysqli_connect("localhost", "root", "", "cleanware");
    if(array_key_exists("pr_img", $data)){
        $data["pr_img"]=$this->real_escape_string($data["pr_img"]);
    }
    foreach ($data as $key => $value) {
        $value="'$value'";
        $updates[]="$key=$value";
    }
    $imploadAray=  implode(",", $updates);
    $query="Update prlist Set $imploadAray Where prlist_id=$id";
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