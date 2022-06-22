

<x-slot name="header">

<div class="flex flex-col h-48">

    <img class="object-cover h-48 w-full" src="https://sayarajin.com/storage/photos/bghd.svg">

    </div>

</x-slot>

<x-slot name="footer">

</x-slot>

<div class="py-12 bg-yellow">

    <div class="flex-auto ">

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 -mt-40">

            <div id="top" class=" justify-center">

                <livewire:search-index>

            </div>

        </div>

    </div>

<<div wire:loading wire:target="postDetail,delSaveJob,saveJob" class="fixed z-20 inset-0 place-content-center ">
    <div class="fixed justify-center h-full w-full opacity-25 bg-slate-300"> </div>
    <div class="flex justify-center my-72">
    <div
    class="my-48 dots">
</div>
    </div>
</div> 

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">

    <div class="flex flex-row">

        <div class="flex-auto m-2 space-x-8 w-96">

            <div class="flex flex-col">

            <div>
                <div>

                <div class="flex-auto m-1">


                        @if($posts != '')

                            @foreach ($posts as $post)

                            <div class="mb-8 bg-white rounded-lg shadow-xl 

                                    mt-4 transition duration-150 transform hover:scale-110 hover:-translate-y-2 

                                    text-grey-500 hover:text-blue-500 cursor-pointer transition border-b border-r" 

                                    data-mdb-ripple="true" data-mdb-ripple-color="light" id="daft_job">

                                <div wire:click="postDetail({{$post->id}})"

                                data-id="{{ $post->id}}" class="daft-job">

                                    <img class="object-cover h-48 w-screen rounded-lg"src="{{ $post->images['0']['url'] }}">

                                    <div class="pt-6 px-6 -mt-4">

                                        <h5 class="text-gray-900 text-xl font-semibold h-16  mb-8">

                                            {{ $post->title }}

                                        </h5>

                                        <h5 class="text-gray-900 text-xl font-medium">

                                            {{ $post->author->first_name . ' ' . $post->author->last_name }}

                                        </h5>

                                        <h5 class="text-gray-900 text-xl font-medium">

                                        @foreach($post->perusahaan as $perusahaan)

                                            {{$perusahaan->per_nama}}

                                        @endforeach

                                        </h5>

                                        <h5 class="text-gray-900 text-xl font-medium mb-8">

                                            {{ ucwords(strtolower($post->regency->name)) }}

                                        </h5>

                                        <p> 

                                            @php

                                            $minutes = $thistime->diffInMinutes($post->updated_at);

                                            $hours = $thistime->diffInHours($post->updated_at);

                                            $days = $thistime->diff($post->updated_at)->days;

                                            $weeks = $thistime->diffInWeeks($post->updated_at);

                                            $months = $thistime->diffInMonths($post->updated_at);

                                            $years = $thistime->diffInYears($post->updated_at);

                                            @endphp

                                            @if($minutes <= 60)

                                                {{$minutes}} menit yang lalu

                                            @elseif($hours <= 24)

                                                {{$hours}} jam yang lalu

                                            @elseif($days <= 7)

                                                {{$days}} hari yang lalu

                                            @elseif($weeks <= 4)

                                                {{$weeks}} minggu yang lalu

                                            @elseif($months <= 12)

                                                {{$months}} bulan yang lalu

                                            @else

                                                {{$years}} tahun yang lalu

                                            @endif

                                        </p>

                                    </div>

                                </div>

                                @if(Auth::user() != null)

                                @php $getpostid = null @endphp

                                @foreach($simpan_job as $simjob)

                                @if($simjob->post_id == $post->id)

                                @php $getpostid = $simjob->post_id @endphp

                                @endif

                                @endforeach

                                @if($getpostid == $post->id)

                                    <div class="mb-2 text-right z-10 px-4">

                                        <button wire:click="delSaveJob({{$post->id}})" class="w-10 h-10 focus:outline-none rounded-3xl hover:bg-gray-300">

                                            <i class="fa-solid fa-bookmark"></i>

                                        </button>

                                    </div>

                                @else

                                    <div class="mb-2 text-right z-10 px-4">

                                        <button wire:click="saveJob({{$post->id}})" class="w-10 h-10 focus:outline-none rounded-3xl hover:bg-gray-300">

                                            <i class="fa-regular fa-bookmark"></i>

                                        </button>

                                    </div>

                                @endif

                                @endif

                        </div>

                                

                            @endforeach

                        @endif

                        @if($posts->hasMorePages())

                        <div class="loadjob" hidden>

                            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>

                        </div>

                        @endif


                </div>
</div>
</div>

            </div>

        </div> 

                @if($post_detail != null)

                    <div class="hidden space-x-8 sm:flex w-4/5 myframe">

                        <div class="child top-0">

                        <livewire:post-data :post="$post_detail" :key="$post_detail['id']"/>

                        </div>

                    </div>

                @else

                    <div class="hidden flex flex-col bg-white shadow-xl sm:rounded-lg mx-12 my-8 space-x-8 sm:flex w-4/5 myframe">

                        <div>

                            <img class="mx-72 mt-48 h-48 w-48" src="https://th.jobsdb.com/assets/2982a5e7e83c56a68c79.png">

                        </div>

                        <div class="w-full sm:m-10">

                        <h5 class="font-bold font-serif text-xl text-center mr-12">

                            We have 30,226 jobs for you

                        </h5>

                        <h5 class="font-medium font-serif text-xl text-center mr-12">

                            Select a job to view details

                        </h5>

                        </div>

                    </div>

                @endif

                <div class="bg-slate-50 rounded-full section" id="anchoredCtaWeb">

                    <div class="container">

                        <lord-icon

                            src="https://cdn.lordicon.com/msoeawqm.json"

                            trigger="loop"

                            colors="primary:#b4b4b4,secondary:#08a88a"

                            style="width:50px;height:50px">

                        </lord-icon>

                    </div>

                </div>

    </div>

</div>



<script>

    $(document).ready(function(){

        $('.daft-job').click(function(){

            var dataId = $(this).attr("data-id");

            console.log(dataId);

            var url = "{{url('dashboard/posts/')}}/"+dataId+" #post-frame";

            console.log(url);

            if($('.myframe').is(":visible")){

                // $('.myframe').load("{{url('dashboard/posts/')}}/"+dataId+" #post-frame");

            } else{

                window.open("{{url('dashboard/posts/')}}/"+dataId,'_blank');

            }

        })

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

            window.onscroll = function (ev) {

                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

                    $('.loadjob').show()

                    window.livewire.emit('post-data');

                }

            };

    });



    document.addEventListener("scroll", function() {

  const anchoredCtaWeb = document.getElementById("anchoredCtaWeb");

  if (window.pageYOffset > 200) {

    anchoredCtaWeb.classList.add("show");

  }

  if (window.pageYOffset < 200) {

    anchoredCtaWeb.classList.remove("show");

  }

});



</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

@livewireScripts