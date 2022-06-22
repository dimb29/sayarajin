<?php

namespace App\Http\Livewire\Payment;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class PayOn extends Component
{
    public function render()
    {
        $tagihan = Payment::where('user_id', '=', Auth::user()->id)->orderBy('updated_at', 'DESC')->first();
        return view('livewire.payment.pay-on',['tagihan' => $tagihan]);
    }
}
