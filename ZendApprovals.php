<?php

class ZendApprovals extends Approvals {

    public static function approvePdf(Zend_Pdf $pdf) {
        Approvals::approve(new ZendPdfWriter($pdf), new PHPUnitNamer(), self::getReporter('pdf'));
    }

}

