<?php

if( is_array($_FILES['photo']['tmp_name']) ) {
// 멀티 업로드 된 경우
  $cnt = count($_FILES['photo']['tmp_name']);
  $rs_arr = [];
  for ($i = 0; $i < $cnt; $i++) {
    copy($_FILES["photo"]["tmp_name"][$i], "upload/".$_FILES["photo"]["name"][$i]);  
    $rs_arr[] = "upload/".$_FILES["photo"]["name"][$i];
  }

  $arr = [ "result" => "success", "img" => implode('|', $rs_arr) ];
  die(json_encode($arr));    

} else {
  copy($_FILES["photo"]["tmp_name"], "upload/".$_FILES["photo"]["name"]);
  $arr = [ "result" => "success", "img" => "upload/".$_FILES["photo"]["name"] ];
  die(json_encode($arr));
}



?>