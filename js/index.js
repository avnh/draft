var mamoncu = '';
var tenhnc_cu = '';
var dtnc_cu = '';
var ncs_cu = '';
var bbcb_cu = '';

$(document).on('click', '.edit', function() {
	//alert($(this).parent().parent().parent().attr('id'));
	if($(this).parent().parent().parent().attr('id') == 'padd_gd'){
		mamoncu = $(this).parent().parent().find(".gd_mamon").text();
	}
	if($(this).parent().parent().parent().attr('id') == 'padd_hnc'){
		tenhnc_cu = $(this).parent().parent().find(".hnc_tenhnc").text();
	}
	if($(this).parent().parent().parent().attr('id') == 'padd_dtnc'){
		dtnc_cu = $(this).parent().parent().find(".dtnc_ten").text();
	}
	if($(this).parent().parent().parent().attr('id') == 'padd_svhd'){
		ncs_cu = $(this).parent().parent().find(".ncs_ten").text();
	}
	if($(this).parent().parent().parent().attr('id') == 'padd_bbcb'){
		bbcb_cu = $(this).parent().parent().find(".bbcb_ten").text();
	}
	if($(this).parent().parent().attr('class') == 'abo'){
		$(this).hide();
		$p = $(this).parent();
		document.getElementById("te").contentEditable = "true";
		document.getElementById("ch").contentEditable = "true";
		document.getElementById("bm").contentEditable = "true";
		document.getElementById("vi").contentEditable = "true";
		document.getElementById("tr").contentEditable = "true";
		document.getElementById("em").contentEditable = "true";
		document.getElementById("di").contentEditable = "true";
		$p.find(".save").show();
	}else{
		$(this).hide();
  		$p = $(this).parent();
  		$p.addClass('editable');
  		$p.find(".text").attr('contenteditable', 'true');  
  		$p.find(".save").show();
	}
});

$(document).on('click', '.delete', function() {
	if($(this).parent().parent().parent().attr('id') == 'padd_gd'){
		var obj = new Object();
		obj.mahp = $(this).parent().parent().find(".gd_mamon").text();
		obj.table = 'giangday';
		dbParam = JSON.stringify(obj);
		//alert(dbParam);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//alert(this.responseText);
			 }
		};
		xmlhttp.open("POST", "delete.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
	}

	if($(this).parent().parent().parent().attr('id') == 'padd_hnc'){
		var obj = new Object();
		obj.tenhnc = $(this).parent().parent().find(".hnc_tenhnc").text();
		obj.table = 'huongnghiencuu';
		dbParam = JSON.stringify(obj);
		//alert(dbParam);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//alert(this.responseText);
			 }
		};
		xmlhttp.open("POST", "delete.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
	}

	if($(this).parent().parent().parent().attr('id') == 'padd_dtnc'){
		var obj = new Object();
		obj.tendtnc = $(this).parent().parent().find(".dtnc_ten").text();
		obj.table = 'detainghiencuu';
		dbParam = JSON.stringify(obj);
		//alert(dbParam);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//alert(this.responseText);
			 }
		};
		xmlhttp.open("POST", "delete.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
	}

	if($(this).parent().parent().parent().attr('id') == 'padd_svhd'){
		var obj = new Object();
		obj.tensvhd = $(this).parent().parent().find(".ncs_ten").text();
		obj.table = 'sinhvienhd';
		dbParam = JSON.stringify(obj);
		//alert(dbParam);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//alert(this.responseText);
			 }
		};
		xmlhttp.open("POST", "delete.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
	}

	if($(this).parent().parent().parent().attr('id') == 'padd_bbcb'){
		var obj = new Object();
		obj.tenbbcb = $(this).parent().parent().find(".bbcb_ten").text();
		obj.table = 'baibao';
		dbParam = JSON.stringify(obj);
		//alert(dbParam);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//alert(this.responseText);
			 }
		};
		xmlhttp.open("POST", "delete.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
	}
	$(this).hide();
	$p = $(this).parent().parent().remove();
});

$(document).on('click', '.save', function() {
	if($(this).parent().parent().parent().attr('id') == 'padd_abo'){
		var obj = new Object();
		obj.abo_name = document.getElementById('te').textContent;
		obj.abo_chucvu = document.getElementById('ch').textContent;
		obj.abo_bomon = document.getElementById('bm').textContent;
		obj.abo_vien = document.getElementById('vi').textContent;
		obj.abo_school = document.getElementById('tr').textContent;
		obj.abo_email = document.getElementById('em').textContent;
		obj.abo_diachi = document.getElementById('di').textContent;
		obj.table = 'tt_gv';
		dbParam = JSON.stringify(obj);
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	//alert(this.responseText);
 				var obj = JSON.parse(this.responseText);
					      document.getElementById("abo_name").innerHTML = '<span id="te">'+obj['ten']+'</span>';
					      document.getElementById("ten_to").innerHTML = obj['ten'];
					      document.getElementById("chucvu_to").innerHTML = obj['chucvu'];
						  document.getElementById("abo_chucvu").innerHTML = '<span id="ch"'+obj['chucvu']+'</span>';
						  document.getElementById("abo_bomon").innerHTML = ' <span contenteditable="false"><b>Bộ Môn:  </b></span> <span id="bm">'+obj['bomon']+'</span>';						 
						  document.getElementById("abo_vien").innerHTML = ' <span contenteditable="false"><b>Viện:  </b></span> <span id="vi">'+obj['vien']+'</span>'; 				 
						  document.getElementById("abo_school").innerHTML = ' <span contenteditable="false"><b>Trường:  </b></span> <span id="tr">'+obj['truong']+'</span>';
						  document.getElementById("abo_email").innerHTML = ' <span contenteditable="false"><b>Email:  </b></span> <span id="em">'+obj['email']+'</span>';
						  document.getElementById("abo_diachi").innerHTML = ' <span contenteditable="false"><b>Địa chỉ:  </b></span> <span id="di">'+obj['diachi']+'</span>';
					    }
		};
		xmlhttp.open("POST", "insert.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
					
 			$(this).hide();
			$p = $(this).parent();
			document.getElementById("te").contentEditable = "false";
			document.getElementById("ch").contentEditable = "false";
			document.getElementById("bm").contentEditable = "false";
			document.getElementById("vi").contentEditable = "false";
			document.getElementById("tr").contentEditable = "false";
			document.getElementById("em").contentEditable = "false";
			document.getElementById("di").contentEditable = "false";
			$p.find(".edit").show();	
	  	//alert($(this).parent().find('#abo_email').text());
		}
		if($(this).parent().parent().parent().attr('id') == 'padd_gd'){
			var obj = new Object();
			obj.tenhp = $(this).parent().parent().find(".gd_tenmon").text();
			obj.mahp = $(this).parent().parent().find(".gd_mamon").text();
			obj.linkk = $(this).parent().parent().find(".gd_link").text();
			obj.table = 'giangday';
			obj.mamoncu = mamoncu;
			$p = $(this).parent().parent();
			dbParam = JSON.stringify(obj);
			//alert(dbParam);
			if (obj.mahp == ''){
				alert('Không được để trống mã học phần');
			}else{
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	//alert(this.responseText);
	 				var obj = JSON.parse(this.responseText);
					$(this).parent().parent().find(".gd_tenmon").innerHTML = obj['tenhp'];
			      	$(this).parent().parent().find(".gd_mamon").innerHTML = obj['mahp'];
			      	$(this).parent().parent().find(".gd_link").innerHTML = obj['link'];
				}
			};
			xmlhttp.open("POST", "insert.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x=" + dbParam);
			$p = $(this).parent();	
			$p.find(".edit").show();
			$p.removeClass('editable');
			$p.find(".text").removeAttr('contenteditable');
			$(this).hide();
			}
		}	

		if($(this).parent().parent().parent().attr('id') == 'padd_hnc'){
			var obj = new Object();
			obj.tenhnc = $(this).parent().parent().find(".hnc_tenhnc").text();
			obj.table = 'huongnghiencuu';
			obj.tenhnc_cu = tenhnc_cu;
			$p = $(this).parent().parent();
			dbParam = JSON.stringify(obj);
			//alert(dbParam);
			if (obj.tenhnc == ''){
				alert('Không được để trống nội dung');
			}else{
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	//alert(this.responseText);
	 				var obj = JSON.parse(this.responseText);
					$(this).parent().parent().find(".hnc_tenhnc").innerHTML = obj['tenhnc'];
				}
			};
			xmlhttp.open("POST", "insert.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x=" + dbParam);
			$p = $(this).parent();	
			$p.find(".edit").show();
			$p.removeClass('editable');
			$p.find(".text").removeAttr('contenteditable');
			$(this).hide();
			}
		}	
	
		if($(this).parent().parent().parent().attr('id') == 'padd_dtnc'){
			alert('kjasdfhdskf');
			var obj = new Object();
			obj.tendtnc = $(this).parent().parent().find(".dtnc_ten").text();
			obj.thoigian = $(this).parent().parent().find(".dtnc_thoigian").text();
			obj.mota = $(this).parent().parent().find(".dtnc_mota").text();
			obj.table = 'detainghiencuu';
			obj.dtnc_cu = dtnc_cu;
			$p = $(this).parent().parent();
			dbParam = JSON.stringify(obj);
			//alert(dbParam);
			if (obj.tendtnc == ''){
				alert('Không được để trống tên dtnc');
			}else{
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	//alert(this.responseText);
	 				var obj = JSON.parse(this.responseText);
					$(this).parent().parent().find(".dtnc_ten").innerHTML = obj['tendtnc'];
					$(this).parent().parent().find(".dtnc_thoigian").innerHTML = obj['thoigian'];
					$(this).parent().parent().find(".dtnc_mota").innerHTML = obj['mota'];
				}
			};
			xmlhttp.open("POST", "insert.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x=" + dbParam);
			$p = $(this).parent();	
			$p.find(".edit").show();
			$p.removeClass('editable');
			$p.find(".text").removeAttr('contenteditable');
			$(this).hide();
			}
		}	

		if($(this).parent().parent().parent().attr('id') == 'padd_svhd'){
			var obj = new Object();
			obj.tensvhd = $(this).parent().parent().find(".ncs_ten").text();
			obj.tendt = $(this).parent().parent().find(".ncs_detai").text();
			obj.table = 'sinhvienhd';
			obj.ncs_cu = ncs_cu;
			$p = $(this).parent().parent();
			dbParam = JSON.stringify(obj);
			//alert(dbParam);
			if (obj.tensvhd == ''){
				alert('Không được để trống tên sinh viên');
			}else{
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	//alert(this.responseText);
	 				var obj = JSON.parse(this.responseText);
					$(this).parent().parent().find(".ncs_ten").innerHTML = obj['tensvhd'];
					$(this).parent().parent().find(".ncs_detai").innerHTML = obj['tendt'];
				}
			};
			xmlhttp.open("POST", "insert.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x=" + dbParam);
			$p = $(this).parent();	
			$p.find(".edit").show();
			$p.removeClass('editable');
			$p.find(".text").removeAttr('contenteditable');
			$(this).hide();
			}
		}

		if($(this).parent().parent().parent().attr('id') == 'padd_bbcb'){
			var obj = new Object();
			obj.tenbbcb = $(this).parent().parent().find(".bbcb_ten").text();
			obj.thamgia = $(this).parent().parent().find(".bbcb_thamgia").text();
			obj.tenbao = $(this).parent().parent().find(".bbcb_bao").text();
			obj.table = 'baibao';
			obj.bbcb_cu = bbcb_cu;
			$p = $(this).parent().parent();
			dbParam = JSON.stringify(obj);
			//alert(dbParam);
			if (obj.tenbbcb == ''){
				alert('Không được để trống tên bài báo');
			}else{
				xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			    	//alert(this.responseText);
	 				var obj = JSON.parse(this.responseText);
					$(this).parent().parent().find(".bbcb_ten").innerHTML = obj['tenbbcb'];
					$(this).parent().parent().find(".bbcb_thamgia").innerHTML = obj['thamgia'];
					$(this).parent().parent().find(".bbcb_bao").innerHTML = obj['tenbao'];
				}
			};
			xmlhttp.open("POST", "insert.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("x=" + dbParam);
			$p = $(this).parent();	
			$p.find(".edit").show();
			$p.removeClass('editable');
			$p.find(".text").removeAttr('contenteditable');
			$(this).hide();
			}
		}		
});



$(document).on('click', '.add', function() {
	if($(this).parent().parent().attr('class') == 'box_add_gd'){
		var parent = $(this).parent().parent().parent().parent().parent().find('#padd_gd');
		//alert(parent.attr('class'));
		var length = $("#padd_gd").children().length;
		alert(length);
		var tnew = '<div class="univ"><div class="box"><span class="edit">edit</span>\n<span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="gd_tenmon">Tên môn học</h3><p class="gd_mamon">Mã môn học</p><p class="gd_link"><a href="">link</a></p></div></div><hr /></div>';
		parent.append(tnew);
	}else if($(this).parent().parent().attr('class') == 'box_add_hnc'){
		var parent = $(this).parent().parent().parent().parent().parent().find('.padd_hnc');
		var tnew = '<div class="univ"><div class="box"><span class="edit">edit</span>\n<span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="hnc_tenhnc">Tên hướng nghiên cứu</h3></div></div><hr /></div>';
		parent.append(tnew);
	}else if($(this).parent().parent().attr('class') == 'box_add_ncs'){
		var parent = $(this).parent().parent().parent().parent().parent().find('.padd_svhd');
		var tnew = '<div class="univ"><div class="box"><span class="edit">edit</span>\n<span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="ncs_ten">Tên sinh viên</h3><p class="ncs_detai" class="meta">Đề tài nghiên cứu</p></div></div><hr /></div>';
		parent.append(tnew);
	}else if($(this).parent().parent().attr('class') == 'box_add_bbcb'){
		var parent = $(this).parent().parent().parent().parent().parent().find('.padd_bbcb');
		var tnew = '<div class="univ"><div class="box"><span class="edit">edit</span>\n<span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="bbcb_ten">Tên bài báo</h3><p class="bbcb_thamgia" class="meta">Người tham gia</p><p class="bbcb_bao">Tên báo đăng bài</p></div></div><hr /></div>';
		parent.append(tnew);
	}else{
		var parent = $(this).parent().parent().parent().parent().parent().find('.padd_dtnc');
		var tnew = '<div class="univ"><div class="box"><span class="edit">edit</span>\n<span class="save">save</span><span class="delete">delete</span><div class="text"><h3 class="dtnc_ten">Tên đề tài</h3><p class="dtnc_thoigian" class="meta">Thời gian</p><p class="dtnc_mota">Mô tả</p></div></div><hr /></div>';
		parent.append(tnew);
	}
});




document.getElementById('getavt').addEventListener('change', readURL, true);
function readURL(){
    var file = document.getElementById("getavt").files[0];
    var reader = new FileReader();
    reader.onloadend = function(){
        document.getElementById('avt').style.backgroundImage = "url(" + reader.result + ")";        
    }
    if(file){
        reader.readAsDataURL(file);
    }else{
    }
}