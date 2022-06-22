<x-slot name="header">
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container bg-white shadow-xl rounded p-4">
            <div class="flex flex-col">
                <div class="my-2 text-xl font-semibold">
                    <p>
                        <h1>Tagihan</h1>
                    </p>
                </div>
                <div class="my-2 justify-center text-center">
                    @if($tagihan->status == 1)
                    <h1>Invoice : {{$tagihan->inv_id}}</h1>
                    <p>Nomor Virtual Account :</p>
                    <h1 class="text-3xl font-bold">{{$tagihan->account_number}}</h1>
                    <p>Lakukan pembayaran sebelum waktu berakhir</p>
                    <h1 id="demo" class="text-3xl font-bold"></h1>
                    @elseif($tagihan->status == 2)
                    <h1>Invoice : {{$tagihan->inv_id}}</h1>
                    <h1 class="text-3xl font-bold">Tagihan anda sudah dibayar</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date('{{$tagihan->expiration_date}}').getTime();
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Output the result in an element with id="demo"
//   document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    document.getElementById("demo").innerHTML = hours + "j "
  + minutes + "m " + seconds + "d ";
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>