<x-slot name="header">
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12">
    <!-- Jenis Kerja -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container">
            <div class="flex flex-col sm:flex-row">
                <div class="sm:w-1/4 m-2 text-white">
                    <div wire:click="typePaid('1')" class="flex flex-col opacity-40 bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600 
                    overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 cursor-pointer hover:shadow-2xl 
                    transition duration-150 transform hover:-translate-y-2">
                        <div class="text-center">
                            <h1 class="text-base sm:text-xl font-bold">" GOLD "</h1>
                            <h1 class=" text-sm sm:text-lg font-bold">Paket Super Efektif</h1>
                        </div>
                        <div class="justify-center text-xs sm:text-base ">
                            <h1 class="text-center font-semibold">4 kali publikasi di semua jaringan loker</h1>
                            <div class="flex flex-col">
                                <div>Website & Aplikasi</div>
                                <div>Instagram Post & Story</div>
                                <div>Hightligt Story Favorite</div>
                                <div>Google Jobs & Bisnis</div>
                                <div>Facebook Post & Story</div>
                                <div>Twitter</div>
                                <div>Linkedin</div>
                                <div>Telegram</div>
                            </div class="flex flex-col">
                        </div>
                        <div class="text-center">
                            <hr class="my-4">
                            <h1>Lowongan Rekomendasi</h1>
                            <h1>
                                Lebih banyak dilihat! 
                                Lowongan terletak di bagian paling atas halaman website & aplikasi
                            </h1>
                            <hr class="my-4">
                            <h1>Sorotan Lowongan</h1>
                            <h1>Lowongan diberikan tag "Butuh Cepat!" di website & 
                                aplikasi sehingga tampil menarik
                            </h1>
                        </div>
                        <div class="text-center mt-8">
                            <h1 class="text-2xl font-bold">Rp. 200.000</h1>
                        </div>
                    </div>
                </div>
                <div class="sm:w-1/4 m-2 text-white">
                    <div wire:click="typePaid('2')" class="flex flex-col bg-gradient-to-r from-gray-500 via-gray-400 to-gray-600 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 cursor-pointer hover:shadow-2xl
                    transition duration-150 transform hover:-translate-y-2">
                        <div class="text-center">
                            <h1 class="text-xl font-bold">" SILVER "</h1>
                            <h1 class="text-lg font-bold">Kandidat lebih banyak</h1>
                        </div>
                        <div class="justify-center">
                            <h1 class="text-center font-semibold">3 kali publikasi di semua jaringan loker</h1>
                            <div class="flex flex-col">
                                <div>Website & Aplikasi</div>
                                <div>Instagram Post & Story</div>
                                <div>Hightligt Story Favorite</div>
                                <div>Google Jobs & Bisnis</div>
                                <div>Facebook Post & Story</div>
                                <div>Twitter</div>
                                <div>Linkedin</div>
                                <div>Telegram</div>
                            </div class="flex flex-col">
                        </div>
                        <div class="text-center">
                            <hr class="my-4">
                            <h1>Lowongan Rekomendasi</h1>
                            <h1>
                                Lebih banyak dilihat! 
                                Lowongan terletak di bagian paling atas halaman website & aplikasi
                            </h1>
                        </div>
                        <div class="text-center mt-8">
                            <h1 class="text-2xl font-bold">Rp. 150.000</h1>
                        </div>
                    </div>
                </div>
                <div class="sm:w-1/4 m-2 text-white">
                    <div wire:click="typePaid('3')" class="flex flex-col bg-gradient-to-r from-amber-700 via-amber-600 to-amber-900 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 cursor-pointer hover:shadow-2xl
                    transition duration-150 transform hover:-translate-y-2">
                        <div class="text-center">
                            <h1 class="text-xl font-bold">" BRONZE "</h1>
                            <h1 class="text-lg font-bold">Jangkauan cukup luas</h1>
                        </div>
                        <div class="justify-center">
                            <h1 class="text-center font-semibold">2 kali publikasi di semua jaringan loker</h1>
                            <div class="flex flex-col">
                                <div>Website & Aplikasi</div>
                                <div>Instagram Post & Story</div>
                                <div>Hightligt Story Favorite</div>
                                <div>Google Jobs & Bisnis</div>
                                <div>Facebook Post & Story</div>
                                <div>Twitter</div>
                                <div>Linkedin</div>
                                <div>Telegram</div>
                            </div class="flex flex-col">
                        </div>
                        <div class="text-center mt-8">
                            <h1 class="text-2xl font-bold">Rp. 100.000</h1>
                        </div>
                    </div>
                </div>
                <div class="sm:w-1/4 m-2 text-white">
                    <div wire:click="typePaid('4')" class="flex flex-col bg-gradient-to-r from-gray-800 via-gray-700 to-gray-900 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 cursor-pointer hover:shadow-2xl
                    transition duration-150 transform hover:-translate-y-2">
                        <div class="text-center">
                            <h1 class="text-xl font-bold">" ECO "</h1>
                            <h1 class="text-lg font-bold">Rekrut dengan hemat</h1>
                        </div>
                        <div class="justify-center">
                            <h1 class="text-center font-semibold">1 kali publikasi di semua jaringan loker</h1>
                            <div class="flex flex-col">
                                <div>Website & Aplikasi</div>
                                <div>Instagram Post & Story</div>
                                <div>Hightligt Story Favorite</div>
                                <div>Google Jobs & Bisnis</div>
                                <div>Facebook Post & Story</div>
                                <div>Twitter</div>
                                <div>Linkedin</div>
                                <div>Telegram</div>
                            </div class="flex flex-col">
                        </div>
                        <div class="text-center mt-8">
                            <h1 class="text-2xl font-bold">Rp. 50.000</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
