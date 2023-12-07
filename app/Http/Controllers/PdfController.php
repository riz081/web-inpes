<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Status;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $booking = Booking::all();
        $pengajuan = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Pengajuan')->count();
        $proses = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Proses')->count();
        $selesai = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Selesai')->count();
        $batal = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Batal')->count();
        $status = Status::all();  
        // Your data to pass to the view
        $data = [
            'title' => 'PDF Files',
            'booking' => $booking,
            'pengajuan' => $pengajuan,
            'proses' => $proses,
            'selesai' => $selesai,
            'batal' => $batal,
            'status' => $status,
        ];

        // Load the view
        $html = View::make('pages.pdf.pdf-dashboard', $data)->render();

        // Create PDF options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        // Initialize Dompdf
        $dompdf = new Dompdf($options);

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // Set paper size (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (first pass to get the total pages)
        $dompdf->render();

        // Stream the file for download
        return $dompdf->stream('sample.pdf');
    }
}
