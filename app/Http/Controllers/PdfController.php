<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{
    public function attendancesPdf()
    {
        $attendances = Attendance::with('user')->get();

        // Setup Dompdf
        $dompdf = new Dompdf();

        // Load HTML template
        $html = view('pdf.attendances_pdf', compact('attendances'))->render();

        // Load HTML content
        $dompdf->loadHtml($html);

        // Render PDF (optional settings)
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream('attendances.pdf');
    }
}


