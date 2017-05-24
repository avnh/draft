<?php
session_start();
if(isset($_SESSION['username']) && $_SESSION['username']){
    $u = $_SESSION['username'];
}else{
    $u = $_POST['x'];
}

header("Content-Type: application/json; charset=UTF-8");
        $link = mysqli_connect("localhost", "root", "", "web");
        $query="select * from tt_gv where username='$u'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        if (!isset($myObj)) 
          $myObj = new stdClass();
        if (!isset($father)) 
          $father = new stdClass();
        if($row['ten'] == ''){
          $name = 'Nhập tên...';
        }else{
          $name = $row['ten'];
        }
        if($row['chucvu'] == ''){
          $chucvu = 'Nhập chức vụ...';
        }else{
          $chucvu = $row['chucvu'];
        }
        $myObj->ten =  $name;
        $myObj->chucvu = $chucvu;
        $myObj->bomon= $row['bomon'];
        $myObj->vien= $row['vien'];
        $myObj->truong= $row['truong'];
        $myObj->email = $row['email'];
        $myObj->diachi = $row['diachi'];       
        $myObj->anh = $row['anh'];
        
        $query = "select id_gv from tt_gv where username='$u'";
        $result = mysqli_query($link, $query);
        $gv_id = mysqli_fetch_array($result, MYSQLI_BOTH);
        //echo $gv_id[0];
        $query="select * from giangday where id_gv=$gv_id[0]";
        $result = mysqli_query($link, $query);      
        $row_giangday = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //echo $query;
        $query="select * from detainghiencuu where id_gv=$gv_id[0]";
        $result = mysqli_query($link, $query);      
        $row_detainghiencuu = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $query="select * from baibao where id_gv=$gv_id[0]";
        $result = mysqli_query($link, $query);      
        $row_baibao = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $query="select * from huongnghiencuu where id_gv=$gv_id[0]";
        $result = mysqli_query($link, $query);      
        $row_huongnghiencuu = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $query="select * from sinhvienhd where id_gv=$gv_id[0]";
        $result = mysqli_query($link, $query);      
        $row_sinhvienhd = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $giangday = array("result"=>$row_giangday);
        $detainghiencuu = array("result"=>$row_detainghiencuu);
        $baibao = array("result"=>$row_baibao);
        $huongnghiencuu = array("result"=>$row_huongnghiencuu);
        $sinhvienhd = array("result"=>$row_sinhvienhd);

        $father->ttcn = $myObj;
        $father->giangday = $giangday;
        $father->dtnc = $detainghiencuu;
        $father->bbcb = $baibao;
        $father->hnc = $huongnghiencuu;
        $father->svhd = $sinhvienhd;
        echo json_encode($father);
        mysqli_free_result($result);
        mysqli_close($link);
?>

