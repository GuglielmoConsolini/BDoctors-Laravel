<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Doctor::with('specializations', 'reviews', 'sponsorships');

    // Aggiungi filtri basati su parametri di ricerca
    if ($request->has('specializations')) {
        $specializations = $request->input('specializations');
        $query->whereHas('specializations', function ($q) use ($specializations) {
            $q->whereIn('name', $specializations);
        });
    }

    // Recupera tutti i medici (sponsorizzati e non sponsorizzati)
    $doctors = $query->get();

    

    return response()->json($doctors);
}


    

    

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Recupera un medico specifico dal database con lo slug fornito
        $doctor = Doctor::with(['user', 'specializations', 'reviews' => function ($query) {
            $query->orderBy('created_at', 'desc'); // Ordina le recensioni per data di creazione in ordine decrescente
        }])->where('slug', $slug)->first();

        if ($doctor) {
            return response()->json($doctor);
        } else {
            return response()->json(['error' => 'Dottore non trovato'], 404);
        }
    }

}
