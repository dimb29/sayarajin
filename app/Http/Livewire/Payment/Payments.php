<?php

namespace App\Http\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class Payments extends Component
{
    public function render()
    {
        return view('livewire.payment.payment');
    }
    
    public function typePaid($id){
        if($id == 1){
            $return = redirect("/dashboard/payment/gold");
        }elseif($id == 2){
            $return = redirect("/dashboard/payment/silver");
        }elseif($id == 3){
            $return = redirect("/dashboard/payment/bronze");
        }elseif($id == 4){
            $return = redirect("/dashboard/payment/eco");
        }else{
            $return = response()->json('Gagal');
        }
    }
}
