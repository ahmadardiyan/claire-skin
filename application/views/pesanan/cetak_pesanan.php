<?php
//membuat new Pdf = TCPDF (object)
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

//info dokumen
$pdf->SetCreator('Claire Skin Yogyakarta');
$pdf->SetTitle('Invoice Pesanan');

//header data
$pdf->setHeaderData('', 0, 'Invoice Pesanan', 'Bukti Pemesanan Produk Claire Skin', array(0, 0, 0), array(0, 0, 0));
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

//page break
$pdf->SetAutoPageBreak(true);

//scaling image
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//font subsetting
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 14, '', true);

$pdf->AddPage();

// Set some content to print
$i = 0;
$total = 0;
$html = '<h1 align="center">Daftar Pesanan</h1>
        <table>
        <tr> 
            <td width="25%">Tanggal Pesanan</td>
            <td> : ' . date('d M Y',strtotime($pesanan['created_at'])) . '</td>
        </tr>
        <tr> 
            <td width="25%">ID Pesanan</td>
            <td> : ' . $pesanan['id_pesanan'] . '</td>
        </tr>
        <tr> 
            <td width="25%">Nama</td>
            <td> : ' . $pesanan['username'] . '</td>
        </tr>
        <tr> 
            <td width="25%">No.Telephone </td>
            <td> : '. $pesanan['phone'] . '</td>
        </tr>
        </table>
     
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="10%" align="center">No</th>
                            <th width="40%" align="center">Nama Produk</th>
                            <th width="10%" align="center">Jumlah Produk</th>
                            <th width="40%" align="center">Harga</th>
                        </tr>';
foreach ($detail as $d) {
    $i++;
    $html .= '<tr bgcolor="#ffffff">
                <td align="center">' . $i . '</td>
                <td>' . $d['nama_produk'] . '</td>
                <td align="center">' . $d['jumlah_produk'] . '</td>
                <td align="center"> Rp ' . number_format($d['total_harga'], 2, ",", ",") . '</td>
              </tr>';
              $total = $total+$d['total_harga'];
}
$html .= '</table>';
$html .= '<h4 align="right"> Total : Rp ' . number_format($total , 2, ',', '.').'</h4>';

// Print text using writeHTMLCell()

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('Invoice_Pesanan.pdf', 'I');