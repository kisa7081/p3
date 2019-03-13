<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Converter;

class ConverterController extends Controller
{
    private $conv;

    public function __construct()
    {
        $this->conv = new Converter();

    }

    public function index()
    {
        return view('index', ['timeValue' => time(),
        'amount' => 0,
        'currency_list' => $this->conv->getCurrencyList()]);
    }
}
