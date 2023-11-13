<?php

namespace App\Http\Controllers;
use App\Models\participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
   
    public function add()
    {
        return view('accueil.subscribe');
    }
    
    public function participationSave(Request $request)
    {
        $request->validate([
            'nomComplet'         =>   'required|string',
            'email'        =>   'required|email',
            'tele'     =>   'required|string',
            'statut'     =>   'required|string'
        ]);
        $participation = new participation;
        $participation->nomComplet = $request->input('nomComplet');
        $participation->email = $request->input('email');
        $participation->tele = $request->input('tele');
        $participation->statut = $request->input('statut');
        $participation->save();
        return redirect()->back()->with('status','Participation sended Successfully');
      
    }
}
