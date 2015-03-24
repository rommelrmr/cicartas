<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Incluimos el archivo fpdf
require_once APPPATH . "/third_party/fpdf/fpdf.php";

//Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
class pdf_personal extends FPDF
{

    // El encabezado del PDF
    public function Header()
    {
        //$this->Image('imagenes/logo.png', 10, 8, 22);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(30);
        $this->Cell(120, 10, utf8_decode('Reporte de Personal '), 0, 0, 'L');
        $this->Ln('5');
        $this->SetFont('Arial', 'B', 8);
        $this->Ln(5);

    }



    // El pie del pdf
    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

    }



}
