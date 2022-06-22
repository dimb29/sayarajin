
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profil') }}
                    </x-jet-nav-link>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('saveloker') }}" :active="request()->routeIs('saveloker')">
                            {{ __('Lowongan Tersimpan') }}
                        </x-jet-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ url('dashboard/berita/sj_send=') }}" :active="request()->routeIs('berita')">
                            {{ __('Pendidikan') }}
                        </x-jet-nav-link>
                    </div>
                </div>
