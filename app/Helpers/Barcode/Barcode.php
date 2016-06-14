<?php

/**
 * page: https://github.com/picqer/php-barcode-generator
 *
 * Use:
 *
 * Initiate the barcode generator for the output you want, then call the ->getBarcode()
 * routine as many times as you want.
 *
 * The ->getBarcode() routine accepts the following:
    $code:        Data for the barcode
    $type:        Type of barcode, use the constants defined in the class
    $widthFactor: Width is based on the length of the data, with this factor you can make the barcode bars wider then default
    $totalHeight: The total height of the barcode
    $color:       Hex code of the foreground color
 *
 * Accepted types

    TYPE_CODE_39
    TYPE_CODE_39_CHECKSUM
    TYPE_CODE_39E
    TYPE_CODE_39E_CHECKSUM
    TYPE_CODE_93
    TYPE_STANDARD_2_5
    TYPE_STANDARD_2_5_CHECKSUM
    TYPE_INTERLEAVED_2_5
    TYPE_INTERLEAVED_2_5_CHECKSUM
    TYPE_CODE_128
    TYPE_CODE_128_A
    TYPE_CODE_128_B
    TYPE_CODE_128_C
    TYPE_EAN_2
    TYPE_EAN_5
    TYPE_EAN_8
    TYPE_EAN_13
    TYPE_UPC_A
    TYPE_UPC_E
    TYPE_MSI
    TYPE_MSI_CHECKSUM
    TYPE_POSTNET
    TYPE_PLANET
    TYPE_RMS4CC
    TYPE_KIX
    TYPE_IMB
    TYPE_CODABAR
    TYPE_CODE_11
    TYPE_PHARMA_CODE
    TYPE_PHARMA_CODE_TWO_TRACKS
 *
 *
 * $generator = new BarcodeGeneratorPNG();

    return '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('WR-09062016-0001', $generator::TYPE_CODE_128)) . '">';
 *
 *
 */

namespace App\Helpers\Barcode;

use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorJPG;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorSVG;

class Barcode
{
    public static function BarcodeHTML($patter)
    {
        $generator = new BarcodeGeneratorHTML();

        return $generator->getBarcode($patter, $generator::TYPE_CODE_128);
    }


    public static function BarcodeSVG($patter)
    {
        $generator = new BarcodeGeneratorSVG();

        return $generator->getBarcode($patter, $generator::TYPE_CODE_128);
    }


    public static function BarcodePNG($patter)
    {
        $generator = new BarcodeGeneratorPNG();

        return $generator->getBarcode($patter, $generator::TYPE_CODE_128);
    }


    public static function BarcodeJPG($patter)
    {
        $generator = new BarcodeGeneratorJPG();

        return $generator->getBarcode($patter, $generator::TYPE_CODE_128);
    }

}