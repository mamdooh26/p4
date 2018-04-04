<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Log;

class CalculatorController extends Controller
{
    public function welcome(Request $request)
    {
        $owe = $request ->session()->get('owe');
        $waysOfSplit =$request ->session()->get('waysOfSplit');
        $tabCost = $request ->session()->get('tabCost');
        $serviceRating = $request ->session()->get('serviceRating');
        $roundUp = $request ->session()->get('roundUp');

        return view('welcome')->with([
            'owe' => $owe,
            'waysOfSplit' => $waysOfSplit,
            'tabCost' => $tabCost,
            'serviceRating' => $serviceRating,
            'roundUp' => $roundUp,
        ]);
    }

    public function about(Request $request)
    {
        $this->validate($request, [
            'waysOfSplit' => 'required|numeric',
            'tabCost' => 'required|numeric',
        ]);
        $waysOfSplit = $request->input('waysOfSplit');
        $tabCost = $request->input('tabCost', null);
        $serviceRating = $request->input('serviceRating', null);
        $roundUp = $request->has('roundUp');
        if($serviceRating == -1) {
            $owe = $tabCost / $waysOfSplit;
        }
        else{
            $owe = ((($tabCost / 100) * $serviceRating) + $tabCost) / $waysOfSplit;
        }
        if ($roundUp) {
            $owe = round($owe);
        }
        return redirect('/')->with([
            'owe' => $owe,
            'waysOfSplit' => $waysOfSplit,
            'tabCost' => $tabCost,
            'serviceRating' => $serviceRating,
            'roundUp' => $request->has('roundUp')
        ]);
    }

    public function contact()
    {
        return view('pages.contact')->with([
            'email' => Config::get('app.supportEmail')
        ]);
    }
}