<?php

namespace App\Http\Livewire\Payment;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\PayMethod;
use App\Models\Payment;
use Xendit\Xendit;
use Carbon\Carbon;

class Method extends Component
{
    public $getprice,$price,$bank_code;
    private $token = 'xnd_development_oQsYfl8LdA0Dv5qIzgSnD3sdel44chkH3AjWLZaEUitsrrNozCk7T1XKDm16VU';
    public function mount($id){
        $this->getprice = PayMethod::where('method', '=', $id)->first();
        // dd($getprice);
    }
    public function render()
    {
        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();
        // return response()->json([
        //     'data' => $getVABanks
        // ])->setStatusCode(200);
        // dd(count($getVABanks));
        return view('livewire.payment.method',[
            'databank' => $getVABanks
        ]);
    }

    public function createVa(){
        Xendit::setApiKey($this->token);
        $external_id = 'va-'.time();
        // dd($this->bank_code);
        $params = ["external_id" => $external_id,
            "bank_code" => $this->bank_code,
            "name" => Auth::user()->first_name." ".Auth::user()->last_name,
            "expected_amount" => $this->getprice->price+4500,
            "is_closed" => true,
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
            "is_single_use" => true,
        ];

        $insert = Payment::insert([
            'external_id' => $external_id,
            'payment_channel' => 'Virtual Account',
            'email' => Auth::user()->email,
            'price' => $this->getprice->price,
            'user_id' => Auth::user()->id,
            'bank_code' =>  $this->bank_code,
            "expiration_date" => Carbon::now()->addDays(1),
            'admin_fee' =>  4500,

        ]);
        dd($params);

        $createVA = \Xendit\VirtualAccounts::create($params);
        session()->flash('message', 'virtual account berhasil dibuat.');
        $return = redirect("/dashboard/payment/payon");
        return $return;
    }
}
