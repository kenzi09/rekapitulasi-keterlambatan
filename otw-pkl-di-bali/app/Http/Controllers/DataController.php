<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lates;
use App\Models\Students;
use App\Models\Rayon;
use App\Models\Rombel;
use PDF;

class DataController extends Controller
{
    public function index($id){
        $datas = Lates::with('students')->find($id)->toArray();
        return view('data.index', compact('datas'));
    }

    public function downloadconto(Lates $order, $id)
    {

        $order = Students::with('rayon', 'rombel')->where('id', $id)->get();
            

        // return view('data.download-pdf', compact('order'));
        $pdf = PDF::loadVIew('data.download-pdf', compact('order'));

        return $pdf->download('receipt.pdf');
    }
}
