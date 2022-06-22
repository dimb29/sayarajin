<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post
    </h2>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="post-frame">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            


           
                <div class="flex-auto m-1">
                    <div class="grid grid-flow-col">
                    @foreach ($post->images as $image)
                        <div class="py-4">
                            <img class="h-72" src="{{ $image->url }}" alt="{{ $image->description }}" width="100%">
                        </div>
                    @endforeach
                    </div>
                    <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                        <div class="flex">
                            by&nbsp;<span class="italic">{{ $post->author->first_name . ' ' . $post->author->last_name }}</span>
                            &nbsp;in&nbsp;<a href="{{ url('dashboard/categories/' . $post->category->id . '/posts') }}"
                                class="underline">{{ $post->category->title }}</a>
                            &nbsp;on&nbsp;{{ $post->updated_at->format('F, d Y') }}
                        </div>
                    <div id="location" data-id="{{$post->location_id}}"></div>
                
                    <div id="content" class="text-gray-700 text-base m-auto" readonly="readonly">
                        <p>{!! $post->content !!}</p>
                    </div>



        <div class="flex flex-col">
            @php
                $tags=$post->tags->pluck('id', 'title');
            @endphp
            @if (count($tags) > 0)
                @foreach ($tags as $key => $tag)
                            
                @endforeach
            @endif
                    <div class="flex flex-col">
                        <div class="flex sm:flex-col mt-10">
                            <div class="text-xl font-medium">Informasi Tambahan :</div>                
                        </div>
                            <div class="flex flex-row mt-5">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> Tingkat Pekerjaan </p>
                                    <!-- <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}" -->
                                    <a href="{{ url('dashboard/tags/posts') }}"
                                        class="underline px-1">{{ $post->tingkatkerja->name_tk }}
                                    </a>
                                </div>
                                <div class="w-64 h-24">
                                    <p class="font-bold"> Pengalaman kerja </p>
                                    <a href="{{ url('dashboard/tags/posts') }}"
                                        class="underline px-1">{{ $post->pengalamankerja->name_pk }}
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> Kualifikasi </p>
                                    <a href="{{ url('dashboard/tags/posts') }}"
                                        class="underline px-1">{{ $post->kualifikasilulus->name_kl }}
                                    </a>
                                </div>
                                <div class="w-64 h-24">
                                    <p class="font-bold"> Jenis Pekerjaan </p>
                                    <a href="{{ url('dashboard/tags/posts') }}"
                                        class="underline px-1">{{ $post->jeniskerja->name_jk }}
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> Spesialisasi pekerjaan </p>
                                    <a href="{{ url('dashboard/tags/posts') }}"
                                        class="underline px-1">{{ $post->spesialiskerja->name_sk }}
                                    </a>
                                </div>
                                <div class="w-64 h-24">
                                    <p class="font-bold"> Industri </p>
                                    @foreach($post->perusahaan as $perusahaan)
                                        {{$perusahaan->per_nama}}
                                    @endforeach
                                </div>
                            </div>


                            <div class="flex flex-row">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> 
                                        <i class="fa-solid fa-share-nodes"></i> Bagikan
                                    </p>
                                    <button id="copy_link" data-link="{{url('dashboard/posts/'.$post->id)}}" class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-indigo-700 rounded-3xl focus:shadow-outline hover:bg-indigo-800">
                                        <i class="fa-solid fa-link"></i>
                                    </button>
                                    <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Flocalhost%3A8000%2F&ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Eshare%7Ctwgr%5E&text=Lowongan Kerja Sebagai {{$post->title}} di {{$perusahaan->per_nama}}&url={{url('dashboard/posts/'.$post->id)}}">
                                        <button class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-indigo-700 rounded-3xl hover:bg-indigo-800">
                                            <i class="fa-brands fa-twitter"></i>
                                        </button>
                                    </a>
                                    <a href="https://api.whatsapp.com/send/?text=Lowongan Kerja Sebagai {{$post->title}} di {{$perusahaan->per_nama}} | {{url('dashboard/posts/'.$post->id)}}" data-action="share/whatsapp/share" target="_blank">
                                    <button class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-green-400 rounded-3xl hover:bg-indigo-800">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </button>    
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u={{url('dashboard/posts/'.$post->id)}}&display=popup&ref=plugin&src=share_button" target="_blank">    
                                    <button class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-indigo-700 rounded-3xl hover:bg-indigo-800">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </button>  
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div id="copy_notif" class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                    <p>Tautan berhasil disalin.</p>
                                </div>
                            </div>
                    </div>
        </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="post-frame">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="flex flex-col sm:w-full overflow-x-auto sm:overflow-hidden">
                    <div class="flex flex-auto my-4">
                        <p class="text-xl font-medium ml-4">Kirim Lamaran</p>                
                    </div>
                    <div class="flex flex-row ml-4 sm:w-full">
                        <div class="place-self-center">
                            <i class="place-self-center fa-solid fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">Email</p>
                        </div>
                        <div>
                            <p class="ml-12 text-lg">:</p>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">{{ $post->email}}</p>
                        </div>
                    </div>
                    <div class="flex flex-row ml-4 sm:w-full">
                        <div class="place-self-center">
                            <i class="place-self-center fa-brands fa-whatsapp fa-lg"></i>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">Whatsapp</p>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">:</p>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">{{ $post->wa}}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
            

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then( editor => {
            const toolbarElement = editor.ui.view.toolbar.element;
            toolbarElement.style.display = "none";
            editor.enableReadOnlyMode( '#content' );
        } )
        .catch(error => {
            console.error(error);
        });

$('#copy_notif').hide();
$(document).ready(function(){
    var dataId = $('#location').attr("data-id")
    $('#copy_link').on('click',function(){
        var copyText = $(this).attr('data-link')
        navigator.clipboard.writeText(copyText);
        $('#copy_notif').fadeIn();
        $('#copy_notif').delay(1000).fadeOut();

    })
});
</script>