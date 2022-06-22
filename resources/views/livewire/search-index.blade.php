

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

	

		

		<button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md active:shadow-lg transition duration-150 ease-in-out" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">

			Filters

		</button>

		

		<button wire:click="searchJob()" data-mdb-ripple="true"

			data-mdb-ripple-color="light"

			class="w-48 justify-end inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-md shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800">

			SEARCH

		</button>

		

	</div>

	<!-- px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md -->

	<!-- inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 -->



	<div class="collapse collapse-horizontal" id="collapseWidthExample">

	



	<div>

	  <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">

		<input type="search" id="search-title" list="job-list" wire:model.defer="locations" name="locations" type="text" placeholder=" Semua Lokasi" 

		class="px-4 py-3 pholderc w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">

		<datalist id="job-list">

			@foreach ($provinces as $provinsi)

				<option value="{{ ucwords(strtolower($provinsi['name'])) }}">

					{{ ucwords(strtolower($provinsi['name'])) }}

				</option>

			@endforeach

		</datalist>



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

		<button data-modal-toggle="modal-gaji"

				type="button"

				data-mdb-ripple="true"

				data-mdb-ripple-color="light"

				class="px-4 py-3 w-full rounded-md border-transparent focus:border-gray-500 focus:ring-0 text-sm inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md

				hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"

				>Gaji</button>

		<button

				type="button"

				data-mdb-ripple="true"

				data-mdb-ripple-color="light"

				wire:click="resetFilter()"

				class="px-4 py-3 w-full rounded-md border-transparent focus:border-gray-500 focus:ring-0 text-sm inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md

				hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"

			>Reset Filter

		</button>

		<div id="modal-gaji"class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">

			<div class="relative p-4 w-full max-w-md h-full md:h-auto">

				<!-- Modal content -->

				<style>

				input[type=range]::-webkit-slider-thumb {

					pointer-events: all;

					width: 24px;

					height: 24px;

					-webkit-appearance: none;

				/* @apply w-6 h-6 appearance-none pointer-events-auto; */

				}

				</style> 

				<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

					<!-- Modal body -->

					<div class="p-6 space-y-6">

						<div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">

							<div>

							<div class="flex flex-col text-center items-center py-5">

								<div>

									<p>Rentang gaji per bulan</p>

									<b class="min_price"></b> sampai <b class="max_price"></b>

								</div>

								<div class="flex justify-between items-center py-5">

									<div>

										<input type="hidden" maxlength="5" x-on:input="mintrigger" x-model="minprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">

									</div>

									<div>

										<input type="hidden" maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">

									</div>

								</div>

							</div>

							<input type="range"

									step="0.5"

									x-bind:min="min" x-bind:max="max"

									x-on:input="mintrigger"

									x-model="minprice"

									class="minrange absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">



							<input type="range" 

									step="0.5"

									x-bind:min="min" x-bind:max="max"

									x-on:input="maxtrigger"

									x-model="maxprice"

									class="maxrange absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">



							<div class="relative z-10 h-2">



								<div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

								<div class="absolute z-20 top-0 bottom-0 rounded-md bg-green-300" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

								<div class="absolute z-30 w-6 h-6 top-0 left-0 bg-green-300 rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>

								<div class="absolute z-30 w-6 h-6 top-0 right-0 bg-green-300 rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>

						

							</div>

						</div>

					</div>

					<!-- Modal footer -->

					<div class="flex justify-center items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">

						<button onclick="onclickrange()" data-modal-toggle="modal-gaji" type="button" class="mod-gaji text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Setuju</button>

						<button data-modal-toggle="modal-gaji" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>

					</div>

				</div>

			</div>

		</div>

	  </div>

	</div>

  </div>

</div>

</div>

	<div wire:loading.delay.longest class="fixed z-20 inset-0 place-content-center">

		<div class="fixed justify-center h-full w-full opacity-25 bg-gray-400"> </div>

			<div class="flex justify-center mt-56">

					<img class="object-cover w-36" src="http://localhost:8000/storage/loaders/rings.svg">

			</div>

		</div>

	</div>

<script>

$(document).ready(function() {

    $('.sel-loc').select2();

});



function range() {

        return {

          minprice: 3, 

          maxprice: 10,

          min: 1, 

          max: 20,

          minthumb: 0,

          maxthumb: 0,

          

          mintrigger() {   

            this.minprice = Math.min(this.minprice, this.maxprice - 0.5);      

            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;

		  	$(".min_price").text(this.minprice+'jt');

          },

           

          maxtrigger() {

            this.maxprice = Math.max(this.maxprice, this.minprice + 0.5); 

            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100); 

		  	$(".max_price").text(this.maxprice+'jt');

			// console.log(this.maxprice);

          },

        }

    }

		  function onclickrange(){

			var minVal = $('.minrange').val()

			var maxVal = $('.maxrange').val()

            window.livewire.emit('minRange',minVal);

            window.livewire.emit('maxRange',maxVal);

			// alert(dataVal)

		  }

</script>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>