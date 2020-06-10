<!DOCTYPE html>
<html>
<head>
	<title>Thêm mới cửa hàng</title>
</head>
<body>
	<h1 style="text-align: center; font-weight: bold; color: red; padding-bottom: 20px;">THÊM MỚI CỬA HÀNG</h1>

	<form action="./quan_tri_cua_hang_them_thuc_hien.php" method="POST" enctype="multipart/form-data">
		<p>
			Tên hàng <br>
			<input type="text" name="txtTenHang" style="width: 100%;">
		</p>
		<p>
			Hãng sản xuất <br>
			<input type="text" name="txtHangSX" style="width: 100%;">
		</p>
		<p>
			Số lượng <br>
			<input type="text" name="txtSoLuong" style="width: 100%;">
		</p>
		<p>
			Giá bán <br>
			<input type="text" name="txtGiaBan" style="width: 100%;">
		</p>
		<p>
			Ảnh minh họa <br>
			<input type="file" name="txtAnh" style="width: 100%;">
		</p>
		<p>
			Ghi chú <br>
			<input type="text" name="txtGhiChu" style="width: 100%;">
		</p>
		<button type="submit">Thêm mới</button>
	</form>
</body>
</html>