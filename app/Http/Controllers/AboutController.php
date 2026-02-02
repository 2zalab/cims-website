<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Récupérer les membres du bureau exécutif (exclut membre, bénévole, volontaire)
        $bureauMembers = Member::bureauExecutif()->get();

        return view('about', compact('bureauMembers'));
    }
}
