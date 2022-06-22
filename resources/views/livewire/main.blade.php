<x-slot name="header">
    <div class="flex flex-col h-56">
    <img class="object-cover h-56 w-full" src="http://localhost:8000/storage/photos/bghd.svg">
    </div>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12 bg-yellow bg-fixed ..." style="background-image: url(http://localhost:8000/storage/photos/bgbnww.jpg)">
    <div class="flex-auto ">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 -mt-40">
            <div class=" justify-center">
                <div class="flex justify-center ...">
                    <div class="w-full md:w-5/6 shadow-xl p-5 rounded-lg bg-white">
                        <div class="relative">
                            <div class="absolute flex items-center ml-2 h-full">
                            <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
                            </svg>
                            </div>

                            <input type="search" id="search-title" list="title-list" wire:model="searchjob" name="searchjob" type="text" placeholder="Cari berdasarkan posisi pekerjaan, kata kunci, atau nama perusahaan" 
                            class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <datalist id="title-list">
                                        @foreach ($postsearch as $post)
                                        <option value="{{$post->title}}">{{$post->title}}</option>
                                        @endforeach
                                    </datalist>
                            </div>

                            <div class="flex items-center justify-between mb-6 mt-4">
                            
                                
                                <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md active:shadow-lg transition duration-150 ease-in-out" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                    Filters
                                </button>
                                
                               
                                    <button wire:click="searchJobs()" 
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="light"
                                        class="search-myjob w-48 justify-end inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-md shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800">
                                        SEARCHS
                                    </button>
                                
                            </div>
                            <!-- px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md -->
                            <!-- inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 -->

                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                            

                            <div>
                            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
                                <style>
                                    .dropdown-menu {
                                        background: #F7F7F7;
                                        list-style: none;
                                        position: absolute;
                                        z-index: 20;
                                        padding: 5px;
                                        width: 25%;
                                    }
                                    .dropdown-item {
                                        clear: both;
                                        width: 100%;
                                    }
                                </style>
                                <input id="search-loc" wire:model.defer="locations" type="search" placeholder=" Semua Lokasi" 
                                class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                

                                <select wire:model.defer="kualif_lulus"
                                class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                <option value="">Semua Lulusan</option>
                                    @foreach ($kualifs as $kualif)
                                        <option value="{{$kualif->id}}">{{$kualif->name_kl}}</option>
                                    @endforeach
                                </select>

                                <select wire:model.defer="jenis_kerja"
                                class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                                <option value="">Semua Jenis Pekerjaan</option>
                                    @foreach ($jenkers as $jenker)
                                        <option value="{{$jenker->id}}">{{$jenker->name_jk}}</option>
                                    @endforeach
                                </select>

                                <button
                                        type="button"
                                        data-mdb-ripple="true"
                                        data-mdb-ripple-color="light"
                                        wire:click="resetFilter()"
                                        class="px-4 py-3 w-full rounded-md border-transparent focus:border-gray-500 focus:ring-0 text-sm inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md
                                        hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    >Reset Filter
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto lg:px-8 pt-15">
        <div class="cyanshadow bg-white overflow-hidden sm:rounded-lg px-4 py-4">
        <h2 class="secondary-heading mt-2 ml-4">Job Recommendation</h2>
            <livewire:slider>
        </div>
</div>
                <div class="hidden space-x-8 sm:flex w-4/5 myframe">
                </div>
            

<div class="flex justify-end">
        <div class="sm:max-w-7xl pt-24 ">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">



                    <div class="sm:flex flex-row">
                        <div class="sm:w-1/2 sm:m-10">
                            <h2 class="secondary-heading mt-4">Find the right job or</h2>
                            <h2 class="secondary-heading mb-12">internship for you</h2>
                        </div>
                        <div class="md:w-1/2 md:mt-6 md:mb-4">
                            <p class="font-medium mb-2">SUGGESTED SEARCHES</p>
                            <button type="button" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Engineering</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Business Development</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Finance</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Administrative Assistant</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Retail Associate</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Customer Service</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Operations</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Information Technology</button>
                        </div>
                    </div>

        </div>
    </div>
</div>


            <div class="max-w-7xl pt-24 ">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <div class="sm:flex flex-row my-4">
                        <div class="sm:w-1/2 sm:m-10">
                            <h2 class="secondary-heading mt-4">Explore location</h2>
                            <h2 class="secondary-heading mb-12">you are interested in</h2>
                        </div>
                        <div class="sm:w-1/2 sm:mt-10 sm:mb-4">
                            <p class="font-medium mb-2">SUGGESTED LOCATION</p>
                            <button type="button" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Jakarta Pusat</button>
                            <button type="button" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Banjarnegara</button>
                            <button type="button" class="inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Semarang</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Bandar Lampung</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Bandung</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Jakarta Selatan</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Yogyakarta</button>
                            <button type="button" class="mt-2 inline-block px-6 py-3 bg-gray-200 text-gray-700 font-medium leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 
                            hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">
                            Surabaya</button>
                        </div>
                    </div>

                </div>
            </div>


        <div class="sm:max-w-full mt-28">
        <a  href="{{ url('dashboard/berita/sj_send=') }}">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4">

                <div class="sm:flex flex-row sm:ml-48 sm:my-6">
                    <div class="sm:w-1/3 sm:ml-96 sm:mt-28">
                    <h2 class="secondary-heading">Find the right job</h2>
                    <h2 class="secondary-heading">for you now..</h2>
                    </div>

                    <div class="sm:w-1/3 ">
                    <img class=" sm:h-96" src="http://localhost:8000/storage/photos/chara22.svg">
                    </div>
                </div>
        </a>

            </div>
        </div>


        
</div>
<script>
    $(document).ready(function(){
    if($('.myframe').is(":visible")){
        $('.slider').slick({
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            draggable: true,
            touchMove: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }else{
        $('.slider').slick({
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            touchMove: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }

        // (function(){
        //     var width = screen.width,
        //     height = screen.height;
            
        //     setInterval(function () {
        //         if (screen.width !== width || screen.height !== height) {
        //             width = screen.width;
        //             height = screen.height;
        //             $(window).trigger('resolutionchange');
        //             alert("resolution change")
        //         }
        //     }, 50);
        // }());
            window.onscroll = function (ev) {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    window.livewire.emit('post-data');
                }
            };
    });
    var route = "{{ url('dashboard/autocomplete-search') }}";
    $('#search-loc').typeahead({
        source: function (query, process) {
            var dataquery = query;
            return $.get(route, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });
    $('#search-loc').on('change',function(){
        console.log($(this).val())
        $sloc_val = $(this).val()
        window.livewire.emit('dataLocation',$sloc_val)
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
@livewireScripts