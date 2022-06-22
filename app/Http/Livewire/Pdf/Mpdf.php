<?php

namespace App\Http\Livewire\Pdf;

use Livewire\Component;
use Illuminate\Http\Request;
use PDF;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Mpdf extends Component
{
    public function render()
    {
        return view('livewire.pdf.mpdf');
    }

    public function detailPayPdf($id){
        
        $data_bayar = Payment::where('external_id', '=', $id)
        ->leftJoin('pay_methods as paym', 'paym.price', 'payments.price')->first();
        // dd($data_bayar);
    	$pdf = PDF::loadview('pdf.detail-bayar',['data_bayar' => $data_bayar]);
    	return $pdf->stream('laporan-pegawai.pdf');
    }
}
