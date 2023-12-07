<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\Snappy\Facades\SnappyPdf;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Booking::all();
        $pengajuan = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Pengajuan')->count();
        $proses = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Proses')->count();
        $selesai = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Selesai')->count();
        $batal = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')->where('statuses.status', 'Batal')->count();
        $status = Status::all();        

        return view('pages.dashboard.dashboard', compact('data', 'pengajuan', 'proses', 'selesai', 'batal', 'status'));
    }

    public function show(string $id)
    {
        $data = Booking::findOrfail($id);
        return view('pages.dashboard.detail-dashboard', compact('data'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        if ($booking->delete()) {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal menghapus data'
        ], 500);
    }
}
