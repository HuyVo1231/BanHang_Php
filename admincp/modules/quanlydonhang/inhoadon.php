<?php
require('../../../tfpdf/tfpdf.php');
include("../../config/config.php");
// Lấy ra chi tiết đơn hàng
$sql = "select * from tbl_cart_details,tbl_sanpham  where tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham
    AND tbl_cart_details.code_cart = '$_GET[code]'";
$query =  mysqli_query($conn, $sql);
//
$pdf = new tFPDF();
$pdf->AddPage("1"); // trang theo dạng thẳng đứng
$pdf->AddFont('DejaVu', '', 'DejaVuSansCondensed.ttf', true);
$pdf->SetFont('DejaVu', '', 14);
$pdf->Cell(0, 8, "SHOESSHOP", 0, 0, 'C');
$pdf->Write(10, 'Các sản phẩm đơn hàng bao gồm:');
$pdf->Ln(10);
$pdf->SetFillColor(193, 229, 252);  // Sét color fill.

$width_cell = array(30, 50, 80, 30, 30, 60);

$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Mã hàng', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Tên sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Số lượng', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Giá', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Tổng tiền', 1, 1, 'C', true);
$pdf->SetFillColor(235, 236, 236); // Color fill
$fill = false;
$i = 0;
$tongtien = 0;
while ($row = mysqli_fetch_array($query)) {
	$i++;
	$pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
	$pdf->Cell($width_cell[1], 10, $row['code_cart'], 1, 0, 'C', $fill);
	$pdf->Cell($width_cell[2], 10, $row['tensanpham'], 1, 0, 'C', $fill);
	$pdf->Cell($width_cell[3], 10, $row['soluongmua'], 1, 0, 'C', $fill);
	$pdf->Cell($width_cell[4], 10, number_format($row['giasp']), 1, 0, 'C', $fill);
	$pdf->Cell($width_cell[5], 10, number_format($row['soluongmua'] * $row['giasp']), 1, 1, 'C', $fill);
	$tongtien += $row['soluongmua'] * $row['giasp'];
	$fill = !$fill; // color
}
$pdf->Cell(0, 20, "Tổng hóa đơn: " . $tongtien, 0, 0, 'C');
$pdf->Write(12, 'Cảm ơn bạn đã đặt hàng tại SHOESSHOP.');
$pdf->Ln(10);
$pdf->Output();
