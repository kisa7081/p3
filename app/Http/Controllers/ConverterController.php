<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Converter;
use Illuminate\Support\Facades\Cache;
class ConverterController extends Controller
{
    public function index(Request $req)
    {
        $conv = $this->getConverter();
        return view('index')->with(['timeValue' => time(),
            'amount' => $req->amount,
            'currency_list' => $conv->getCurrencyList(),
            'current' => $req->current,
            'target' => $req->target,
            'round' => $req->round,

            'keys' => $conv->getKeys()
        ]);
    }

    public function convert(Request $req)
    {
        $req->validate([
            'amount' => 'required|numeric'
        ]);

        $conv = $this->getConverter();
        $rates = $conv->getRatesArray();

        $converted = $conv->convert($rates[$req->current][$req->target], $req->amount, $req->round);
        return view('index')->with(['timeValue' => time(),
            'amount' => $req->amount,
            'currency_list' => $conv->getCurrencyList(),
            'current' => $req->current,
            'target' => $req->target,
            'round' => $req->round,
            'converted' => $converted,
            'keys' => $conv->getKeys()
        ]);
    }

    private function getConverter()
    {
        $conv = null;
        if (Cache::has('converter'))
        {
            $conv = Cache::get('converter');
        }
        else
        {
            $conv = new Converter();
            Cache::put('converter', $conv);
        }
        return $conv;
    }
}
