<x-slot name="header">
<div class="flex flex-col h-48">
    <img class="object-cover h-48 w-full" src="http://localhost:8000/storage/photos/jobicon1.jpg">
    </div>
</x-slot>
<x-slot name="footer">
</x-slot>
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style>
  input[type=range]::-webkit-slider-thumb {
	pointer-events: all;
	width: 24px;
	height: 24px;
	-webkit-appearance: none;
  /* @apply w-6 h-6 appearance-none pointer-events-auto; */
  }
</style> 
<div class="h-screen flex justify-center items-center">
  <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
    <div>
    <div class="flex justify-between items-center py-5">
      <div>
        <input type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
      </div>
      <div>
        <input type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
      </div>
    </div>
      <input type="range"
             step="0.5"
             x-bind:min="min" x-bind:max="max"
             x-on:input="mintrigger"
             x-model="minprice"
             class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

      <input type="range" 
             step="0.5"
             x-bind:min="min" x-bind:max="max"
             x-on:input="maxtrigger"
             x-model="maxprice"
             class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

      <div class="relative z-10 h-2">

        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>
        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-green-300" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>
        <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-green-300 rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>
        <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-green-300 rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
 
      </div>
    </div>
  </div>

<script>
    function range() {
        return {
          minprice: 3, 
          maxprice: 10,
          min: 1, 
          max: 100,
          minthumb: 0,
          maxthumb: 0, 
          
          mintrigger() {   
            this.minprice = Math.min(this.minprice, this.maxprice - 0.5);      
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
          },
           
          maxtrigger() {
            this.maxprice = Math.max(this.maxprice, this.minprice + 0.5); 
            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
          }, 
        }
    }
</script>
</div>