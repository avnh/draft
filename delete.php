<?php
session_start();
$u = $_SESSION['username'];
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
        $link = mysqli_connect("localhost", "root", "1234", "GIAOVIEN");
        $get_id = "select id_gv from tt_gv where username = '$u'";
        $id = mysqli_query($link, $get_id);
        $row_id = mysqli_fetch_array($id, MYSQLI_BOTH);
        $id_gv = $row_id['id_gv'];
        if($obj->table == 'giangday'){
          $query = "delete from ". $obj->table ." where id_gv='$id_gv' and maHP='$obj->mahp'";
          mysqli_query($link, $query);
        }
        if($obj->table == 'huongnghiencuu'){
          $query = "delete from ". $obj->table ." where id_gv='$id_gv' and tenHNC='$obj->tenhnc'";
          mysqli_query($link, $query);
        }
        if($obj->table == 'detainghiencuu'){
          $query = "delete from ". $obj->table ." where id_gv='$id_gv' and tenDT='$obj->tendtnc'";
          mysqli_query($link, $query);
        }
        if($obj->table == 'sinhvienhd'){
          $query = "delete from ". $obj->table ." where id_gv='$id_gv' and tenSV='$obj->tensvhd'";
          mysqli_query($link, $query);
        }
        if($obj->table == 'baibao'){
          $query = "delete from ". $obj->table ." where id_gv='$id_gv' and tenBB='$obj->tenbbcb'";
          mysqli_query($link, $query);
        }
        mysqli_free_result($result);
        mysqli_close($link);
?>