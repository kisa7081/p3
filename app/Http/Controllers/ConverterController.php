<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Converter;

class ConverterController extends Controller
{
    private $conv;
    private $currency_list;
    private $current;
    private $target;
    private $round;
    private $hasErrors;

    public function __construct()
    {
        $this->conv = new Converter();
        $this->currency_list = $this->conv->getCurrencyList();
        $this->current = $this->conv->getKeys()[0];
        $this->target = $this->conv->getKeys()[1];
        $this->round = false;
        $this->hasErrors = false;
    }

    public function index()
    {
        return view('index', ['timeValue' => time(),
            'amount' => 0,
            'currency_list' => $this->currency_list,
            'current' => $this->current,
            'target' => $this->target,
            'round' => $this->round,
            'hasErrors' => $this->hasErrors
        ]);
    }
}
