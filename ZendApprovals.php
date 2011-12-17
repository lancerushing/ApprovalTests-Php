<?php
require_once 'Approvals.php';
require_once 'writers/ZendPdfWriter.php';
require_once 'Zend/Pdf.php';

class ZendApprovals extends Approvals {

    public static function approvePdf(Zend_Pdf $pdf) {
        Approvals::approve(new ZendPdfWriter($pdf), new PHPUnitNamer(), self::getReporter('pdf'));
    }

}

