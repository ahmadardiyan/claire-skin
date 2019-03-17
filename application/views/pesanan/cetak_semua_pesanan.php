<?php
// // var_dump($pesanan);
// var_dump($_SESSION);

// die();

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
$html = '
        <h2 align="center">Daftar Pesanan</h2>
        <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th  width="5%" align="center">No</th>
                            <th width="25%" align="center">ID Pesanan</th>
                            <th width="15%" align="center">Nama</th>
                            <th width="20%" align="center">Kota</th>
                            <th width="30%" align="center">Total Harga</th>
                            <th width="10%" align="center">Status</th>
                        </tr>';

foreach ($pesanan as $p) {
    $i++;
    $html .= '<tr bgcolor="#ffffff">
                <td align="center">' . $i . '</td>
                <td align="center">' . $p['id_pesanan'] . '</td>
                <td align="center">' . $p['username'] . '</td>
                <td align="center">' . $p['nama_kab'] . '</td>';

    $subtotal = 0;
    foreach ($detail as $d) {

        if ($d['id_pesanan'] == $p['id_pesanan']) {
            $subtotal += $d['total_harga'];
        }
    }

    $html .= '<td align="center"> Rp.' . number_format($subtotal, 2, ',', '.') . ' </td>';

    if ($p['status'] == 0) {
        $html .= '<td align="center"> Belum Lunas </td>
                    </tr>';
    } else {
        $html .= '<td align="center"> Lunas </td>
                    </tr>';
    }

      $total = $total+$subtotal;
}
$html .= '</table>';
$html .= '<h4 align="right"> Total : Rp ' . number_format($total , 2, ',', '.').'</h4>';

// Print text using writeHTMLCell()

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('Invoice_Pesanan.pdf', 'I');
