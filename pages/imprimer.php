<?php

require '../admin/lib/php/PgConnect.php';
require '../admin/lib/php/classes/Connexion.class.php';
require '../admin/lib/php/classes/Produit.class.php';
require '../admin/lib/php/classes/ProduitDB.class.php';
$cnx = Connexion :: getInstance($dsn, $user, $pass);

$info = new ProduitDB($cnx);
$liste_produit = $info->getProduitAll();
$nbrProduit = count($liste_produit);
//var_dump($liste_jeux);

require('../admin/lib/php/fpdf/fpdf.php');

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetX(3);
$pdf->SetTextColor(41, 29, 29);
$pdf->SetDrawColor(166, 20, 20);
$pdf->Cell(16, 2, utf8_decode('Nos produits'), 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$y = 3;
$x = 3;
for ($i = 0; $i < $nbrProduit; $i++) {
    $pdf->SetXY($x, $y);
    $pdf->SetX($x);
    $pdf->Cell(5, 3.5, utf8_decode($liste_produit[$i]['description']), 1, 0, 'L');
    $pdf->SetXY($x + 8.5, $y++);
    $y += 2;
    $pdf->Cell(5, 3.5, utf8_decode($liste_produit[$i]['image']), 1, 0, 'L');
}

$pdf->Output();
