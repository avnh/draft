<?php
session_start();
if($_SESSION['check'] != 'ok'){
  header("location:login.php");
}
$u = $_SESSION['username'];
if(($_SESSION['timeout'] + 1000) < time()){
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Home Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<!-- JS -->
		<!-- HTML5 Support for IE -->
		<!--[if lt IE 9]>
		  <script src="js/html5shim.js"></script>
		<![endif]-->
		
		<!-- Stylesheets -->
		<link href="style/bootstrap.css" rel="stylesheet">
		<link href="style/style.css" rel="stylesheet">
		<link href="style/bootstrap-responsive.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<!-- Favicons -->
		<link rel="shortcut icon" href="img/favicon/favicon.png">
		
		<style>
			.button {
			  display: inline-block;
			  padding: 7px 20px;
			  font-size: 12px;
			  cursor: pointer;
			  text-align: center;
			  text-decoration: none;
			  outline: none;
			  color: #fff;
			  background-color: #2badd7;
			  border: none;
			  border-radius: 15px;
			  box-shadow: 0 9px #999;
			  margin-left: 55px;
			}

			.button:hover {background-color: #c8c8d7}

			.button:active {
			  background-color: #c8c8d7;
			  box-shadow: 0 5px #666;
			  transform: translateY(4px);
			}
		</style>
	</head>

	<body onload=loadInfo()>
		
		<div class="outer">
			<div class="content">
			<div class="container">
				<!-- Header -->
				<header>
					<div class="logo">
					<div class="padd">
					<div class="box">
						<div class="text">
						<h1 id="ten_to">ThS. Nguyễn Mạnh Tuấn</h1>
						<p id="chucvu_to">GIẢNG VIÊN</p>
						</div>
						</div>
					</div>
					</div>
					
				</header>
				
				<!-- Main -->
				<div class="main">
				
				
					
				<!-- About -->
					<div class="aboutme">
					<div class="container">
						<div class="row">
							<div class="span3">
								<div class="padd">
								<h2>Thông tin cá nhân</h2>
								<form method="post" action="" enctype="multipart/form-data">
									<input type='file' name="avatar" id='getavt' /><br/><br/>
									<div id='avt'></div>
									<button class="button" type="submit" name="uploadclick" value="Upload"/>UpLoad</button>
    							</form>
    				<?php // Xử Lý Upload
  
					    // Nếu người dùng click Upload
					    if (isset($_POST['uploadclick']))
					    {
					    	
					        // Nếu người dùng có chọn file để upload
					        if (isset($_FILES['avatar']))
					        {
					            // Nếu file upload không bị lỗi,
					            // Tức là thuộc tính error > 0
					            if ($_FILES['avatar']['error'] > 0)
					            {
					            	echo $_FILES['avatar']['error'];
					                echo 'File Upload Bị Lỗi';
					            }
					            else{
					                // Upload file
					                move_uploaded_file($_FILES['avatar']['tmp_name'], 'image/'.$_FILES['avatar']['name']);
					                $path = 'image/'.$_FILES['avatar']['name'];
					                $link = mysqli_connect("localhost", "root", "", "web");
					                $query = "update tt_gv set anh='$path' where username='$u'";
					                mysqli_query($link, $query);
					                //mysqli_free_result($result);
        							mysqli_close($link);
					                //echo 'image/'.$_FILES['avatar']['name'];
					                //echo 'File Uploaded';
					            }
					        }
					        else{
					            echo 'Bạn chưa chọn file upload';
					        }
					    }
					?>
								</div>
							</div>
						<div class="span9">						
								<div id="padd_abo" class="padd_abo">
								<div id="abo" class="abo">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<div class="text">
									<h3 id="abo_name"></h3>
									<p id ="abo_chucvu" class="meta"></p>
									<p id="abo_bomon"></p>
									<p id="abo_vien"></p>
									<p id="abo_school"></p>
									<p id="abo_email"></p>
									<p id="abo_diachi"></p>
								</div>
								</div>
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>			
					
				<!-- Giang day -->
					<div class="education">
					<div class="container">
						<div class="row">
							<div class="span3">
								<div class="padd3">
								<div class="box_add_gd">
									<div class="text">
									<span class="add">+</span>
									
									<h2>Giảng dạy</h2>
									</div>
								</div>
								</div>
							</div>
							<div class="span9">
								<div id="padd_gd" class="padd_gdc">
								</div>
							</div>
						</div>
					</div>
					</div>
					
				<!-- Huong nghien cuu -->
					<div class="skills">
					<div class="container">
						<div class="row">
							<div class="span3">
								<div class="padd3">
									<div class="box_add_hnc">
									<div class="text">
									<span class="add">+</span>
									<h2>Hướng nghiên cứu</h2>
									</div>
								</div>
								</div>
							</div>
							<div class="span9">
								<div id="padd_hnc" class="padd_hnc">
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="hnc_tenhnc">K.L.N. College of Engineering</h3>
									</div>
									</div>
								<hr />
								</div>
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="hnc_tenhnc">Anna University, Chennai</h3>
									</div>
									</div>
									<hr />
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>	
					
				<!-- De tai nghien cuu -->
					<div class="work">
					<div class="container">
						<div class="row">
							<div class="span3">
								<div class="padd3">
									<div class="box_add_dtnc">
									<div class="text">
									<span class="add">+</span>
									<h2>Đề tài nghiên cứu</h2>
									</div>
								</div>
								</div>
							</div>
							<div class="span9">
								<div id="padd_dtnc" class="padd_dtnc">
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="dtnc_ten">Tên đề tài</h3>
									<p id="dtnc_thoigian" class="meta">Thời gian thực hiện vd 2000- 2011</p>
									<p id="dtnc_mota">Mô tả</p>
									</div>
									</div>
								<hr />
								</div>
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="dtnc_ten">Twitter, California</h3>
									<p id="dtnc_thoigian" class="meta">2011 - 2012, 1 Year</p>
									<p id="dtnc_mota">Mô tả</p>
									</div>
									</div>
									<hr />
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				
				<!-- Nghien cuu sinh -->
					<div class="education">
					<div class="container">
						<div class="row">
							<div class="span3">
								<div class="padd3">
								<div class="box_add_ncs">
									<div class="text">
									<span class="add">+</span>
									<h2>Sinh viên hướng dẫn</h2>
									</div>
								</div>
								</div>
							</div>
							<div class="span9">
								<div id="padd_svhd" class="padd_svhd">
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="ncs_ten">Tên sinh viên</h3>
									<p id="ncs_detai" class="meta">Đề tài nghiên cứu</p>
									</div>
									</div>
								<hr />
								</div>
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="ncs_ten">Tran Hung Anh</h3>
									<p id="ncs_detai" class="meta">WAF</p>
									</div>
									</div>
									<hr />
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				
				<!-- Bai bao cong bo -->
					<div class="education">
					<div class="container">
						<div class="row">
							<div class="span3">
								<div class="padd3">
								<div class="box_add_bbcb">
									<div class="text">
									<span class="add">+</span>
									<h2>Bài báo công bố</h2>
									</div>
								</div>
								</div>
							</div>
							<div class="span9">
								<div id="padd_bbcb" class="padd_bbcb">
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="bbcb_ten">Tên bài báo</h3>
									<p id="bbcb_thamgia" class="meta">Người tham gia</p>
									<p id="bbcb_bao">Tên báo đăng bài</p>
									</div>
									</div>
								<hr />
								</div>
								
								<div class="univ">
								<div class="box">
									<span class="edit">edit</span>
									<span class="save">save</span>
									<span class="delete">delete</span>
									<div class="text">
									<h3 id="bbcb_ten">Anna University, Chennai</h3>
									<p id="bbcb_thamgia" class="meta">2011 - 2012, 91 Percentage</p>
									<p id="bbcb_bao">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse porttitor luctus imperdiet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vulputate eros nec odio egestas in dictum nisi vehicula. </p>
									</div>
									</div>
									<hr />
								</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				
				<script src="js/jquery.js"></script>
				<script src="js/bootstrap.js"></script>
				<script src="js/index.js"></script>
				<script>
					function loadInfo() {
					  var xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
							console.log(this.responseText);
							var obj = JSON.parse(this.responseText);
							var txt_gd ='', txt_dtnc='', txt_bbcb='', txt_hnc='', txt_svhd='';
							console.log(obj['bbcb']['result']['tenBB']);
							console.log(Object.keys(obj['bbcb']['result']).length);
						for (i=0; i<Object.keys(obj['giangday']['result']).length; i++){
							txt_gd += '<div class="univ"><div class="box"><span class="edit">edit</span><span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="gd_tenmon">'+obj['giangday']['result'][i]['tenHP']+'</h3><p class="gd_mamon" class="meta">'+obj['giangday']['result'][i]['maHP']+'</p><p class="gd_link" ><a href="'+obj['giangday']['result'][i]['link']+'">'+obj['giangday']['result'][i]['link']+'</a></p></div></div><hr /></div>';
						}
						for (i=0; i<Object.keys(obj['dtnc']['result']).length; i++){
							txt_dtnc += '<div class="univ"><div class="box"><span class="edit">edit</span><span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="dtnc_ten">'+obj['dtnc']['result'][i]['tenDT']+'</h3><p class="dtnc_thoigian" class="meta">'+obj['dtnc']['result'][i]['thoigian']+'</p><p class="dtnc_mota">'+obj['dtnc']['result'][i]['mota']+'</p></div></div><hr /></div>';
						}
						for (i=0; i<Object.keys(obj['bbcb']['result']).length; i++){
							txt_bbcb += '<div class="univ"><div class="box"><span class="edit">edit</span><span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="bbcb_ten">'+obj['bbcb']['result'][i]['tenBB']+'</h3><p class="bbcb_thamgia" class="meta">'+obj['bbcb']['result'][i]['thamgia']+'</p><p class="bbcb_bao">'+obj['bbcb']['result'][i]['tenB']+'</p></div></div><hr /></div>';
						}
						for (i=0; i<Object.keys(obj['hnc']['result']).length; i++){
							txt_hnc += '<div class="univ"><div class="box"><span class="edit">edit</span><span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="hnc_tenhnc">'+obj['hnc']['result'][i]['tenHNC']+'</h3></div></div><hr /></div>'
						}
						for (i=0; i<Object.keys(obj['svhd']['result']).length; i++){
							txt_svhd += '<div class="univ"><div class="box"><span class="edit">edit</span><span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="ncs_ten">'+obj['svhd']['result'][i]['tenSV']+'</h3><p class="ncs_detai" class="meta">'+obj['svhd']['result'][i]['detai']+'</p></div></div><hr /></div>'
						}
						document.getElementById("padd_gd").innerHTML =txt_gd;
						document.getElementById("padd_dtnc").innerHTML =txt_dtnc;
						document.getElementById("padd_bbcb").innerHTML =txt_bbcb;
						document.getElementById("padd_hnc").innerHTML =txt_hnc;
						document.getElementById("padd_svhd").innerHTML =txt_svhd;
					    document.getElementById("abo_name").innerHTML = '<span id="te">'+obj['ttcn']['ten']+'</span>';
					    document.getElementById("ten_to").innerHTML = obj['ttcn']['ten'];
					    document.getElementById("chucvu_to").innerHTML = obj['ttcn']['chucvu'];
						document.getElementById("abo_chucvu").innerHTML = '<span id="ch">'+obj['ttcn']['chucvu']+'</span>';
						document.getElementById("abo_bomon").innerHTML = ' <span contenteditable="false"><b>Bộ Môn:  </b></span> <span id="bm">'+obj['ttcn']['bomon']+'</span>';						 
						document.getElementById("abo_vien").innerHTML = ' <span contenteditable="false"><b>Viện:  </b></span> <span id="vi">'+obj['ttcn']['vien']+'</span>'; 				 
						document.getElementById("abo_school").innerHTML = ' <span contenteditable="false"><b>Trường:  </b></span> <span id="tr">'+obj['ttcn']['truong']+'</span>';
						document.getElementById("abo_email").innerHTML = ' <span contenteditable="false"><b>Email:  </b></span> <span id="em">'+obj['ttcn']['email']+'</span>';
						document.getElementById("abo_diachi").innerHTML = ' <span contenteditable="false"><b>Địa chỉ:  </b></span> <span id="di">'+obj['ttcn']['diachi']+'</span>';}
					  };
					  xhttp.open("POST", "getdata.php", true);
					  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					  xhttp.send();
					}
				</script>
				<!-- Footer -->
				<footer>
					<div class="container">
						<!-- I worked hard to design this template. So please don't remove the below link. If you remove then you are breaking the licence. -->
						<div class="row">
						<div class="span6"><div class="fpadd">Copyright &copy; 2017 - <a href="#">Quản lý thông tin giáo viên</a></div></div>
						<div class="span6 attr"><div class="fpadd">Designed by <a href="http://responsivewebinc.com">AnhTHc-TrungNDm-LinhNT</a></div></div>
						</div>
						<div class="clearfix"></div>
					</div>
				</footer>	
			</div>
			</div>
		</div>
		
		<!-- JS -->
	
	</body>
</html>