<?php
$sinhNhat = new DateTime("2024-03-12");
$ngayHienTai = new DateTime();
$soNgayConLai = $ngayHienTai->diff($sinhNhat)->format("%a");
echo "Số ngày đếm ngược: $soNgayConLai ngày";
?>
