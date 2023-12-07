<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class FormPemesananController extends Controller
{

    public function store(Request $request, $lang)
    {

        // Validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric',
            'country_id' => 'required|exists:countries,id',
            'request_id' => 'required|exists:requests,id',
            'service_id' => 'required|exists:services,id',
            'message' => 'required',
        ]);

        // Buat booking baru
        $booking = new Booking;

        // Isi dengan data yang divalidasi
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->number = $request->number;
        $booking->country_id = $request->country_id;
        $booking->request_id = $request->request_id;
        $booking->service_id = $request->service_id;
        $booking->message = $request->message;
        $booking->status_id = 1;

        // Simpan ke database
        $booking->save();

       // Mengarahkan kembali pengguna ke rute yang sesuai dengan bahasa
       $redirectTo = $lang === 'en' ? '/en' : '/id';

       // Pesan sukses dalam bahasa yang sesuai
       $successMessage = $lang === 'en' ? 'Collaboration request sent successfully!' : 'Permintaan kerja sama berhasil dikirim!';

       return redirect($redirectTo)->with('success', $successMessage);

    }

}
