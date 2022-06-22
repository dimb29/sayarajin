<div class="modal-cred fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-full mx-auto sm:px-6 lg:px-8"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="title" placeholder="Enter Title" wire:model="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div wire:ignore class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="content" wire:model="content" placeholder="Enter Content"></textarea>
                            @error('content') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                            <select name="category" id="category" wire:model="category"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <div x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <div class="flex">
                                    <label for="photos"
                                        class="block text-gray-700 text-sm font-bold mb-2">Images:</label>
                                    {{-- <div class="px-2" wire:loading
                                        wire:target="photos">Uploading</div> --}}
                                    <div x-show="isUploading" class="px-2">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                                <input type="file" multiple name="photos" id="photos"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    wire:model="photos">
                                @error('photos') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tagids" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
                            <select multiple name="tagids[]" id="tagids[]" wire:model="tagids"
                                class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex flex-row">
                            <div class="w-1/2 mr-1 mb-4">
                                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Lokasi:</label>
                                <select name="location" id="location" wire:model="location"
                                    class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select Lokasi</option>
                                    @foreach ($provinces as $provinsi)
                                        <option value="{{ $provinsi->id }}">{{ ucwords(strtolower($provinsi->name)) }}</option>
                                    @endforeach
                                    @foreach($cities as $kota)
                                        <option value="{{ $kota->id }}">{{ ucwords(strtolower($kota->name)) }}</option>
                                    @endforeach
                                </select>
                                @error('location') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="w-1/2 ml-1 mb-4">
                                <label for="jenker" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kerja:</label>
                                <select name="jenker" id="jenker" wire:model="jenker"
                                    class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select Jenis Pekerjaan</option>
                                    @foreach ($jenkers as $jenker)
                                        <option value="{{ $jenker->id }}">{{ $jenker->name_jk }}</option>
                                    @endforeach
                                </select>
                                @error('jenker') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <div class="w-1/2 mr-1 mb-4">
                                <label for="kualif" class="block text-gray-700 text-sm font-bold mb-2">Kualifikasi Lulusan:</label>
                                <select name="kualif" id="kualif" wire:model="kualif"
                                    class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select Lulusan</option>
                                    @foreach ($kualifs as $kualif)
                                        <option value="{{ $kualif->id }}">{{ $kualif->name_kl }}</option>
                                    @endforeach
                                </select>
                                @error('kualif') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="w-1/2 ml-1 mb-4">
                                <label for="pengkerja" class="block text-gray-700 text-sm font-bold mb-2">Pengalaman Kerja:</label>
                                <select name="pengkerja" id="pengkerja" wire:model="pengkerja"
                                    class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select Pengalaman</option>
                                    @foreach ($pengkerjas as $pengkerja)
                                        <option value="{{ $pengkerja->id }}">{{ $pengkerja->name_pk }}</option>
                                    @endforeach
                                </select>
                                @error('pengkerja') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <div class="w-1/2 mr-1 mb-4">
                                <label for="spesialis" class="block text-gray-700 text-sm font-bold mb-2">Spesialis Pekerjaan:</label>
                                <select name="spesialis" id="spesialis" wire:model="spesialis"
                                    class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select Spesialis</option>
                                    @foreach ($spesialises as $spesialis)
                                        <option value="{{ $spesialis->id }}">{{ $spesialis->name_sk }}</option>
                                    @endforeach
                                </select>
                                @error('spesialis') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="w-1/2 ml-1 mb-4">
                                <label for="tingker" class="block text-gray-700 text-sm font-bold mb-2">Tingkat Kerja:</label>
                                <select name="tingker" id="tingker" wire:model="tingker"
                                    class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="" selected>Select Tingkat</option>
                                    @foreach ($tingkers as $tingker)
                                        <option value="{{ $tingker->id }}">{{ $tingker->name_tk }}</option>
                                    @endforeach
                                </select>
                                @error('tingker') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="flex flex-row">
                            <div class="w-1/2 mr-1 mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="email" placeholder="Enter Title" wire:model="email">
                                @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="w-1/2 ml-1 mb-4">
                                <label for="wa" class="block text-gray-700 text-sm font-bold mb-2">Whatsapp:</label>
                                <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="wa" placeholder="Enter Title" wire:model="wa">
                                @error('wa') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex row sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex ml-2 mr-2 rounded-md shadow-sm sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex items-center px-6 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Save
                        </button>
                    </span>
                    <span class="flex rounded-md shadow-sm sm:w-auto">
                        <button data-modal-toggle="modal-create" type="button"
                            class="close-modal inline-flex items-center px-4 py-2 my-3 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            Cancel
                        </button>
                    </span>
            </form>
        </div>

    </div>
</div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('content', editor.getData());
            })
        })
        .catch( error => {
            console.error( error );
        } );
$(document).ready(function(){
    $('.close-modal').click(function(){
        $('#modal-creates').fadeOut();
        // alert('berhasil')
    })
})
</script>