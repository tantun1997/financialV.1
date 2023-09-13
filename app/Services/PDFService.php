<?php

namespace App\Services;

use Mpdf\Mpdf;

class PDFService
{
    protected $mpdf;

    public function __construct()
    {
        $this->mpdf = new Mpdf();
        $this->mpdf->mode = 'utf-8';
        $this->mpdf->format = 'A4';
        $this->mpdf->fontDir = base_path('resources/fonts/');
        $this->mpdf->fontdata = 'utf-8';
            [
            'mode' => 'utf-8',
            'format' => 'A4',
            'fontDir' => base_path('resources/fonts/'),
            'fontdata' => [
                'THSarabunIT9' => [
                    'R' => 'THSarabunIT9.ttf',
                    'I' => 'THSarabunIT9_Italic.ttf',
                    'B' => 'THSarabunIT9_Bold.ttf',
                    'BI' => 'THSarabunIT9_BoldItalic.ttf',
                ],
            ]
        ]
    }

    public function default_font($font)
    {
        $this->mpdf->default_font = $font;
    }

    public function generateFromView($view, $data = [])
    {
        $html = view($view, $data)->render();
        $this->mpdf->WriteHTML($html);
        $this->mpdf->Output();
    }
}
