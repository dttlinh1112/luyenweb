<!DOCTYPE html>
<html>
<head>
	<title>Sửa cửa hàng</title>
</head>
<body>
	<h1 style="text-align: center; font-weight: bold; color: red; padding-bottom: 20px;">SỬA CỬA HÀNG</h1>
	<?php 
		// 1. Chuỗi kết nối đến CSDL
		$ket_noi = mysqli_connect("localhost", "root", "", "cua_hang_db");

		// 2. Lẫy ra được ID muốn xóa
		$id_hang = $_GET["id"];

		// 3. Viết câu lệnh SQL để lấy giáo viên có ID như trên
		$sql = "
			SELECT * FROM `tbl_hang_hoa` WHERE id_hang='".$id_hang."'
		";

		// 4. Thực hiện truy vấn để lấy dữ liệu
		$hang_hoa = mysqli_query($ket_noi, $sql);

		// 5. Hiển thị dữ liệu lên Website
		$row = mysqli_fetch_array($hang_hoa);
	;?>
	<form action="./quan_tri_cua_hang_sua_thuc_hien.php" method="POST" enctype="multipart/form-data">
		<p>
			Tên hàng <br>
			<input type="text" name="txtTenHang" value="<?php echo $row['ten_hang'];?>" style="width: 100%;">
		</p>
		<p>
			Hãng sản xuất <br>
			<input type="text" name="txtHangSX" value="<?php echo $row['hang_sx'];?>" style="width: 100%;">
		</p>
		<p>
			Số lượng <br>
			<input type="text" name="txtSoLuong" value="<?php echo $row['so_luong'];?>" style="width: 100%;">
		</p>
		<p>
			Giá bán <br>
			<input type="text" name="txtGiaBan" value="<?php echo $row['gia_ban'];?>" style="width: 100%;">
		</p>
		<p>
			Ảnh minh họa <br>
			<input type="file" name="txtAnh" style="width: 100%;">
		</p>
		<p>
			<img src="../img/<?php 
					if ($row["anh"]<>"") {
						echo $row["anh"];
					} else {
						echo "no_image.png";
					}
				;?>" width="180px" height="auto">
		</p>
		<p>
			Ghi chú <br>
			<input type="text" name="txtGhiChu" style="width: 100% " value="<?php echo $row['ghi_chu'];?>">
		</p>
		<button type="submit">Cập nhật</button>
		<input type="hidden" name="txtID" value="<?php echo $row['id_hang'];?>">
	</form>
</body>
</html>