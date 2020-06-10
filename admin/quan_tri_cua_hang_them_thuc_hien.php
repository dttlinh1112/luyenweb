<?php 
				//1. tạo chuỗi kết nối đến csdl
				$ket_noi= mysqli_connect("localhost","root","","cua_hang_db");
				mysqli_set_charset($ket_noi, 'UTF8'); 
				// 2.lấy ra dữ liệu để insert
				$ten_hang= $_POST["txtTenHang"];
				$hang_sx= $_POST["txtHangSX"];
				$so_luong= $_POST["txtSoLuong"];
				$gia_ban= $_POST["txtGiaBan"];
				$ghi_chu= $_POST["txtGhiChu"];
				//lấy ra thông tin ảnh minh họa
				$anh_minh_hoa = "../img/".basename($_FILES["txtAnh"]["name"]);
				$file_anh_tam = $_FILES["txtAnh"]["tmp_name"];
				$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
				if (!$thuc_hien_luu_anh) {
					$anh_minh_hoa = NULL;
				}
				// echo $tieu_de; exit();
				//3. Viết câu lệnh SQL để xóa được ID m=như trên lấy ra a dữ liệu mong muốn
				$sql="INSERT INTO `tbl_hang_hoa`(`id_hang`, `ten_hang`, `hang_sx`, `so_luong`, `gia_ban`, `anh`, `ghi_chu`) VALUES (NULL,'".$ten_hang."','".$hang_sx."','".$so_luong."','".$gia_ban."', '".$anh_minh_hoa."','".$ghi_chu."')
				";	
				//4 thực hiện truy vấn đẻ lấy ra dữ liệu mong muốn
				mysqli_query($ket_noi, $sql);
				// //5. thông báo việc xóa được thành công và quay trở lại trang quản trị
				echo 
					"<script type='text/javascript'>
					window.alert('Bạn đã thêm mới bài viết thành công.');
					</script>";
		// Chuyển người dùng vào trang quản trị tin tức
				echo 
					"<script type='text/javascript'>
					window.location.href = './quan_tri_cua_hang.php'
					</script>";	
;?>