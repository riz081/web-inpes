<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller {

    public function index()
    {
        $raw_data = Booking::all();
        $data = DB::table('bookings')
        ->select('bookings.*')
        ->leftJoin('statuses', 'bookings.status_id', '=', 'statuses.id')
        ->where('statuses.status', 'Pengajuan')
        ->get();

        $pengajuan = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')
            ->where('statuses.status', 'Pengajuan')
            ->count();
        
        $status = Status::all();
        // dd($data);

        return view('pages.dashboard.request', compact('raw_data','data', 'pengajuan', 'status'));
    }

    public function show(string $id)
    {
        $data = Booking::findOrfail($id);
        return view('pages.dashboard.detail-pengajuan', compact('data'));
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->route('request')->with('error', 'Data not found.');
        }

        $booking->delete();

        return redirect()->route('request')->with('success', 'Data deleted successfully.');
    }
}