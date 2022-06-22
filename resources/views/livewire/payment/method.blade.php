<x-slot name="header">
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container bg-white shadow-xl rounded p-4">
            <div class="flex flex-col">
                <div class="my-2 text-xl font-semibold">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                            <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                        </div>
                    @endif
                    Pembayaran
                </div>
                <div class="my-2">
                    <p class="text-lg">Anda telah memilih paket 
                        <b style="-webkit-background-clip: text;-webkit-text-fill-color: transparent;"
                        class="bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600">{{$getprice->method}}</b> 
                        dengan harga <b>Rp {{number_format($getprice->price,0,',','.')}}</b>
                    </p>
                </div>
                <div class="my-2">
                    <h1 class="text-lg font-semibold">Pilih Metode Pembayaran</h1>
                    <select name="banklist" id="banklistid" wire:model.defer="bank_code"
                    class="px-4 py-3 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="">pilih bank</option>
                            <option value="BCA">Bank Central Asia</option>
                            <option value="BNI">Bank Negara Indonesia</option>
                            <option value="MANDIRI">Bank Mandiri</option>
                            <option value="PERMATA">Bank Permata</option>
                            <!-- <option value="SAHABAT_SAMPOERNA">Bank Sahabat Sampoerna</option> -->
                            <!-- <option value="BRI">Bank Rakyat Indonesia</option> -->
                            <!-- <option value="CIMB">Bank CIMB Niaga</option> -->
                            <!-- <option value="BSI">Bank Syariah Indonesia</option> -->
                            <!-- <option value="BJB">Bank Jabar Banten</option> -->
                    </select>
                    @error('banklistid') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="my-2">
                    <button data-modal-toggle="modal-bayar"
                        class="get-edti-val inline-flex items-center my-2 px-4 py-2 bg-blue-600 
                        border border-transparent rounded-md font-semibold text-xs text-white uppercase 
                        tracking-widest hover:bg-blue-500 active:bg-blue-800 focus:outline-none 
                        focus:border-blue-800 focus:shadow-outline-blue disabled:opacity-25 transition 
                        ease-in-out duration-150">
                        Bayar
                    </button>
                </div>
                <div id="modal-bayar" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Yakin ingin melanjutkan transaksi?
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-center items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                <button data-modal-toggle="modal-bayar" wire:click="createVa()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Setuju</button>
                                <button data-modal-toggle="modal-bayar" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>