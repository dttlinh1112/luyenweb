<!DOCTYPE html>
<html>
<head>
	<title>Quản trị cửa hàng</title>
</head>
<body>
	<h1 style="text-align: center; font-weight: bold; color: red; padding-bottom: 30px;">QUẢN TRỊ CỬA HÀNG</h1>
	<p style="text-align: right; font-weight: bold;"><a href="quan_tri_cua_hang_them.php">Thêm mới</a></p>
	<table>
		<tr>
			<td style="font-weight: bold; text-align: center;">STT</td>
			<td style="font-weight: bold; text-align: center;">Ảnh minh họa</td>
			<td style="font-weight: bold; text-align: center;">Tên hàng</td>
			<td style="font-weight: bold; text-align: center;">Hãng sản xuất</td>
			<td style="font-weight: bold; text-align: center;">Số lượng</td>
			<td style="font-weight: bold; text-align: center;">Giá bán</td>
			<td style="font-weight: bold; text-align: center;" colspan="2">Hiệu chỉnh</td>
		</tr>
		<?php 
			// 1. Chuỗi kết nối đến CSDL
			$ket_noi = mysqli_connect("localhost", "root", "", "cua_hang_db");

			// 2. Viết câu lệnh SQL để lấy ra dữ liệu mong muốn
			$sql = "
				SELECT *
				FROM tbl_hang_hoa
				ORDER BY id_hang DESC
			";

			// 3. Thực hiện truy vấn để lấy ra các dữ liệu mong muốn
			$noi_dung_hang_hoa = mysqli_query($ket_noi, $sql);

			// 4. Hiển thị dữ liệu mong muốn
			$i=0;
			while ($row = mysqli_fetch_array($noi_dung_hang_hoa)) {
				$i++;
		;?>
		<tr>
			<td><?php echo $i;?></td>
			<td>
				<img src="../img/<?php 
						if ($row["anh"]<>"") {
							echo $row["anh"];
						} else {
							echo "no_image.png";
						}
					;?>" width="180px" height="auto">
			</td>
			<td>
				<a href="../hang_hoa_chi_tiet.php?id=<?php echo $row["id_hang"];?>"s><?php echo $row["ten_hang"];?></a>
			</td>
			<td>
				<a href="../hang_hoa_chi_tiet.php?id=<?php echo $row["id_hang"];?>"s><?php echo $row["hang_sx"];?></a>
			</td>
			<td>
				<a href="../hang_hoa_chi_tiet.php?id=<?php echo $row["id_hang"];?>"s><?php echo $row["so_luong"];?></a>
			</td>
			<td>
				<a href="../hang_hoa_chi_tiet.php?id=<?php echo $row["id_hang"];?>"s><?php echo $row["gia_ban"];?></a>
			</td>
			<td>
				<a href="../hang_hoa_chi_tiet.php?id=<?php echo $row["id_hang"];?>"s><?php echo $row["ghi_chu"];?></a>
			</td>
			<td>
				<a href="quan_tri_cua_hang_sua.php?id=<?php echo $row["id_hang"];?>">Sửa</a>
			</td>
			<td>
				<a href="quan_tri_cua_hang_xoa.php?id=<?php echo $row["id_hang"];?>">Xóa</a>
			</td>
		</tr>
		<?php
			}
		;?>
	</table>
</body>
</html>