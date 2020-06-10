<?php 
	// 1. Chuỗi kết nối đến CSDL
	$ket_noi = mysqli_connect("localhost", "root", "", "cua_hang_db");

	// 2. Lẫy ra được ID muốn xóa
	$id_hang = $_GET["id"];
	// secho $id_tin_tuc; exit();

	// 3. Viết câu lệnh SQL để xóa cửa hàng có ID như trên
	$sql = "
		DELETE
		FROM tbl_hang_hoa
		WHERE id_hang='".$id_hang."'
	";

	// 4. Thực hiện truy vấn để xóa dữ liệu
	mysqli_query($ket_noi, $sql);

	// 5. Thông báo việc xóa giáo viên thành công & quay trở lại trang quản lý giáo viên
		// Thông báo cho người dùng biết bài viết đã được xóa thành công
		echo 
		"
			<script type='text/javascript'>
				window.alert('Bạn đã xóa bài viết thành công.');
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