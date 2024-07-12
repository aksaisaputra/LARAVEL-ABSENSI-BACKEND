<?php

return [
    'fontCache' => storage_path('fonts'),
    'fontPath' => base_path('vendor/dompdf/dompdf/lib/fonts/'),
    'tempDir' => storage_path('temp/'),
    'chroot' => realpath(base_path()),
    'logOutputFile' => storage_path('logs/dompdf.log'),
    'enable_remote' => true,
    'defaultMediaType' => 'screen',
    'isHtml5ParserEnabled' => true,
    'isPhpEnabled' => true,
    'isJavascriptEnabled' => true,
    'dpi' => 96,
];
