<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::where('is_active', true);

        // Recherche par nom
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filtre par spécialité
        if ($request->filled('speciality')) {
            $query->where('speciality', 'like', "%{$request->speciality}%");
        }

        // Filtre par arrondissement
        if ($request->filled('arrondissement')) {
            $query->where('arrondissement', $request->arrondissement);
        }

        // Filtre par village
        if ($request->filled('village')) {
            $query->where('village', 'like', "%{$request->village}%");
        }

        $members = $query->orderBy('order')->orderBy('last_name')->paginate(12);

        // Récupérer les arrondissements et spécialités pour les filtres
        $arrondissements = Member::where('is_active', true)
            ->whereNotNull('arrondissement')
            ->distinct()
            ->pluck('arrondissement');

        $specialities = Member::where('is_active', true)
            ->whereNotNull('speciality')
            ->distinct()
            ->pluck('speciality');

        $villages = Member::where('is_active', true)
            ->whereNotNull('village')
            ->where('village', '!=', '')
            ->distinct()
            ->pluck('village');

        return view('members.index', compact('members', 'arrondissements', 'specialities', 'villages'));
    }

    public function show(Member $member)
    {
        if (!$member->is_active) {
            abort(404);
        }

        return view('members.show', compact('member'));
    }
}
