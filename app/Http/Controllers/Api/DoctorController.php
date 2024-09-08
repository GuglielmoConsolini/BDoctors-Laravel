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
        $query = Doctor::with('specializations', 'reviews'); // Carica le specializzazioni e le recensioni insieme ai dottori

        // Aggiungi eventuali filtri per specializzazioni
        if ($request->has('specializations')) {
            $selectedSpecializations = $request->input('specializations');
            $query->whereHas('specializations', function ($q) use ($selectedSpecializations) {
                $q->whereIn('name', $selectedSpecializations);
            });
        }

        // Ordina i dottori per media delle recensioni, se richiesto
        if ($request->has('sort_by') && $request->input('sort_by') == 'reviews') {
            $query->withAvg('reviews', 'stars')->orderBy('reviews_avg_stars', 'desc');
        }

        $doctors = $query->paginate(20); // Cambia il numero di risultati per pagina come preferisci

        return response()->json($doctors);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Recupera un medico specifico dal database con lo slug fornito
        $doctor = Doctor::with(['user', 'specializations'])->where('slug', $slug)->first();

        if ($doctor) {
            return response()->json($doctor);
        } else {
            return response()->json(['error' => 'Dottore non trovato'], 404);
        }
    }


    public function getDoctors(Request $request)
    {
        $query = Doctor::query();

        Log::info('Request Parameters:', $request->all());

        if ($request->has('specializations')) {
            $specializations = $request->input('specializations');

            Log::info('Specializations Filter:', $specializations);

            if (is_array($specializations) && !empty($specializations)) {
                $query->whereHas('specializations', function ($q) use ($specializations) {
                    $q->whereIn('name', $specializations);
                });
            }
        }

        $doctors = $query->paginate(15);
        return response()->json($doctors);
    }
}
