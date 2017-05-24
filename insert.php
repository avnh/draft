<?php
session_start();
$u = $_SESSION['username'];
 header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
        $link = mysqli_connect("localhost", "root", "1234", "GIAOVIEN");
        if($obj -> table == 'tt_gv'){
              $update = "update " . $obj -> table . " set ten='$obj->abo_name', chucvu='$obj->abo_chucvu', bomon='$obj->abo_bomon', vien='$obj->abo_vien', truong='$obj->abo_school', email='$obj->abo_email', diachi='$obj->abo_diachi' where username='$u'";
              mysqli_query($link, $update);
              $query="select * from ".$obj -> table." where username='$u'";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_array($result, MYSQLI_BOTH);
              if (!isset($myObj)) 
                $myObj = new stdClass();
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
              
              $myObj = json_encode($myObj);
              echo $myObj;
        }

        if($obj->table == 'giangday'){
          $get_id = "select id_gv from tt_gv where username = '$u'";
          $id = mysqli_query($link, $get_id);
          $row_id = mysqli_fetch_array($id, MYSQLI_BOTH);
          $id_gv = $row_id['id_gv'];
          $check = "select * from ". $obj -> table ." where id_gv= '$id_gv' and maHP='$obj->mahp'";
          $kq_check = mysqli_query($link, $check);
          $rowcount=mysqli_num_rows($kq_check);
          if ($rowcount != 0){
            $update = "update " . $obj -> table . " set maHP='$obj->mahp', tenHP='$obj->tenhp', link='$obj->linkk' where id_gv=$id_gv and maHP='$obj->mamoncu'";
            mysqli_query($link, $update);
          }else{
            $insert = "insert into " . $obj -> table . " (id_gv, maHP, tenHP, link) values ('$id_gv', '$obj->mahp', '$obj->tenhp', '$obj->linkk')";
            mysqli_query($link, $insert);
          }
          $return = "select * from ". $obj -> table ." where id_gv= '$id_gv' and maHP='$obj->mahp'";
          $result = mysqli_query($link, $return);
          $row = mysqli_fetch_array($result, MYSQLI_BOTH);
          if (!isset($myObj)) 
                $myObj = new stdClass();
          $myObj->mahp = $row['maHP'];
          $myObj->tenhp = $row['tenHP'];
          $myObj->link = $row['link'];
          $myObj = json_encode($myObj);
              echo $myObj;
        }

        if($obj->table == 'huongnghiencuu'){
          $get_id = "select id_gv from tt_gv where username = '$u'";
          $id = mysqli_query($link, $get_id);
          $row_id = mysqli_fetch_array($id, MYSQLI_BOTH);
          $id_gv = $row_id['id_gv'];
          $check = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenHNC='$obj->tenhnc_cu'";
          $kq_check = mysqli_query($link, $check);
          $rowcount=mysqli_num_rows($kq_check);
          if ($rowcount != 0){
            $update = "update " . $obj -> table . " set tenHNC='$obj->tenhnc' where id_gv=$id_gv and tenHNC='$obj->tenhnc_cu'";
            mysqli_query($link, $update);
          }else{
            $insert = "insert into " . $obj -> table . " (id_gv, tenHNC) values ('$id_gv', '$obj->tenhnc')";
            mysqli_query($link, $insert);
          }
          $return = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenHNC='$obj->tenhnc'";
          $result = mysqli_query($link, $return);
          $row = mysqli_fetch_array($result, MYSQLI_BOTH);
          if (!isset($myObj)) 
                $myObj = new stdClass();
          $myObj->tenhnc = $row['tenHNC'];
          $myObj = json_encode($myObj);
              echo $myObj;
        }

        if($obj->table == 'detainghiencuu'){
          $get_id = "select id_gv from tt_gv where username = '$u'";
          $id = mysqli_query($link, $get_id);
          $row_id = mysqli_fetch_array($id, MYSQLI_BOTH);
          $id_gv = $row_id['id_gv'];
          $check = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenDT='$obj->dtnc_cu'";
          $kq_check = mysqli_query($link, $check);
          $rowcount=mysqli_num_rows($kq_check);
          echo $rowcount;
          if ($rowcount != 0){
            $update = "update " . $obj -> table . " set tenDT='$obj->tendtnc', thoigian='$obj->thoigian', mota='$obj->mota' where id_gv=$id_gv and tenDT='$obj->dtnc_cu'";
            mysqli_query($link, $update);
          }else{
            $insert = "insert into " . $obj -> table . " (id_gv, tenDT, thoigian, mota) values ('$id_gv', '$obj->tendtnc', '$obj->thoigian', '$obj->mota')";
            mysqli_query($link, $insert);
          }
          $return = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenDT='$obj->tendtnc'";
          $result = mysqli_query($link, $return);
          $row = mysqli_fetch_array($result, MYSQLI_BOTH);
          if (!isset($myObj)) 
                $myObj = new stdClass();
          $myObj->mahp = $row['tendtnc'];
          $myObj->tenhp = $row['thoigian'];
          $myObj->link = $row['mota'];
          $myObj = json_encode($myObj);
              echo $myObj ;
        }

        if($obj->table == 'sinhvienhd'){
          $get_id = "select id_gv from tt_gv where username = '$u'";
          $id = mysqli_query($link, $get_id);
          $row_id = mysqli_fetch_array($id, MYSQLI_BOTH);
          $id_gv = $row_id['id_gv'];
          $check = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenSV='$obj->ncs_cu'";
          $kq_check = mysqli_query($link, $check);
          $rowcount=mysqli_num_rows($kq_check);
          if ($rowcount != 0){
            $update = "update " . $obj -> table . " set tenSV='$obj->tensvhd', detai='$obj->tendt' where id_gv=$id_gv and tenSV='$obj->ncs_cu'";
            mysqli_query($link, $update);
          }else{
            $insert = "insert into " . $obj -> table . " (id_gv, tenSV, detai) values ('$id_gv', '$obj->tensvhd', '$obj->tendt')";
            mysqli_query($link, $insert);
          }
          $return = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenSV='$obj->tensvhd'";
          $result = mysqli_query($link, $return);
          $row = mysqli_fetch_array($result, MYSQLI_BOTH);
          if (!isset($myObj)) 
                $myObj = new stdClass();
          $myObj->tensvhd = $row['tenSV'];
          $myObj->tendt = $row['detai'];
          $myObj = json_encode($myObj);
          echo $myObj;
        }

        if($obj->table == 'baibao'){
          $get_id = "select id_gv from tt_gv where username = '$u'";
          $id = mysqli_query($link, $get_id);
          $row_id = mysqli_fetch_array($id, MYSQLI_BOTH);
          $id_gv = $row_id['id_gv'];
          $check = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenBB='$obj->bbcb_cu'";
          $kq_check = mysqli_query($link, $check);
          $rowcount=mysqli_num_rows($kq_check);
          if ($rowcount != 0){
            $update = "update " . $obj -> table . " set tenBB='$obj->tenbbcb', thamgia='$obj->thamgia', tenB='$obj->tenbao' where id_gv=$id_gv and tenBB='$obj->bbcb_cu'";
            mysqli_query($link, $update);
          }else{
            $insert = "insert into " . $obj -> table . " (id_gv, tenBB, thamgia, tenB) values ('$id_gv', '$obj->tenbbcb', '$obj->thamgia', '$obj->tenbao')";
            mysqli_query($link, $insert);
          }
          $return = "select * from ". $obj -> table ." where id_gv= '$id_gv' and tenBB='$obj->tenbbcb'";
          $result = mysqli_query($link, $return);
          $row = mysqli_fetch_array($result, MYSQLI_BOTH);
          if (!isset($myObj)) 
                $myObj = new stdClass();
          $myObj->tenbbcb = $row['tenBB'];
          $myObj->thamgia = $row['thamgia'];
          $myObj->tenbao = $row['tenB'];
          $myObj = json_encode($myObj);
              echo $myObj ;
        }
          mysqli_free_result($result);
          mysqli_close($link);
?>