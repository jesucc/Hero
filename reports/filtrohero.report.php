<?php
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once '../vendor/autoload.php';
require_once '../model/SuperHero.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {

    $superhero = new SuperHero();
    $datos = $superhero->filtro(
        $_GET['race_id'],
        $_GET['gender_id'],
        $_GET['alignment_id']);

        $titulo= $_GET['titulo'];
       
    ob_start();

    //Hoja de estilos
    include './estilos.report.html';
    //Archivoscon datos 
    include './filtros.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example01.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}