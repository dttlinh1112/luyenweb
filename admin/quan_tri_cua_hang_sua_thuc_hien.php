<?php 
	// 1. Chuỗi kết nối đến CSDL
	$ket_noi = mysqli_connect("localhost", "root", "", "cua_hang_db");

	// 2. Lẫy dữ liệu để cập nhật tin tức
	$id_hang = $_POST["txtID"];
    $ten_hang= $_POST["txtTenHang"];
	$hang_sx= $_POST["txtHangSX"];
	$so_luong= $_POST["txtSoLuong"];
	$gia_ban= $_POST["txtGiaBan"];
	$ghi_chu= $_POST["txtGhiChu"];
	//lấy ra thông tin ảnh minh họa
	$anh_minh_hoa = "../img/".basename($_FILES["txtAnh"]["name"]);
	$file_anh_tam = $_FILES["txtAnh"]["tmp_name"];
	$thuc_hien_luu_anh = move_uploaded_file($file_anh_tam, $anh_minh_hoa);
	if(!$thuc_hien_luu_anh) {
		$anh_minh_hoa = NULL;
	}

	// 3. Viết câu lệnh SQL để cập nhật giáo viên có ID như trên
	if($anh_minh_hoa == NULL)
	{
		$sql = "
			UPDATE `tbl_hang_hoa`
			SET
				`ten_hang` = '".$ten_hang."',
				`hang_sx` = '".$hang_sx."',
				`so_luong` = '".$so_luong."',
				`gia_ban` = '".$gia_ban."',
				`ghi_chu` = '".$ghi_chu."'
			WHERE `id_hang` = '".$id_hang."' 
		";
	} else {
		$sql = "
			UPDATE `tbl_hang_hoa`
			SET
				`ten_hang` = '".$ten_hang."',
				`hang_sx` = '".$hang_sx."',
				`so_luong` = '".$so_luong."',
				`gia_ban` = '".$gia_ban."',
				`anh` = '".$anh_minh_hoa."',
				`ghi_chu` = '".$ghi_chu."'
			WHERE `id_hang` = '".$id_hang."' 
		";
	}

	// 4. Thực hiện truy vấn để thêm mới dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc thêm mới giáo viên thành công & quay trở lại trang quản lý giáo viên
		// Thông báo cho người dùng biết bài viết đã được thêm mới thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã cập nhật bài viết thành công.');
			</script>
		";

		// Chuyển người dùng vào trang quản trị giáo viên
		echo 
		"
			<script type='text/javascript'>
				window.location.href = './quan_tri_cua_hang.php'
			</script>
		";
;?>