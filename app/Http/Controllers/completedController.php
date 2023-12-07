<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class completedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('bookings')
        ->select('bookings.*')
        ->leftJoin('statuses', 'bookings.status_id', '=', 'statuses.id')
        ->where('statuses.status', 'Selesai')
        ->get();

        $selesai = Booking::leftJoin('statuses', 'bookings.status_id', 'statuses.id')
            ->where('statuses.status', 'Selesai')
            ->count();

        $status = Status::all();

        return view('pages.dashboard.completed', compact('data', 'selesai', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Booking::findOrfail($id);
        return view('pages.dashboard.detail-completed', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
