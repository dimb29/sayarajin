

            <div class="p-6">

                <div class="slider">

                    @foreach ($trend as $postrend)

                        <div data-mdb-ripple="true"

				data-mdb-ripple-color="light" class="max-w-sm rounded overflow-hidden shadow-xl hover:bg-gray-300 mt-12 m-8

                        rounded-lg hover:text-blue-600 transition duration-150 transform hover:scale-110 hover:-translate-y-2 ">

                                <a  href="{{ url('dashboard/posts', $postrend->post_id) }}">

                                    

                                    <img class="object-cover h-48 w-96" src="{{ $postrend->url }}">

                                    <div class="p-6">

                                        <h5 class="text-gray-900 text-xl font-medium mb-4 h-16 pb-4">{{ $postrend->title }}</h5>

                                        <p class="text-gray-500 text-base mb-4">

                                        PT Istana Kemakmuran Motor

                                        </p>

                                    </div>

                                    <div div="grid grid-cols-2 gap-4">

                                        <div class="p-6 font-medium text-sm text-gray-400">

                                        

                                                            <h5 class="text-gray-900 text-xl font-medium">

                                                            {{ $postrend->first_name . ' ' . $postrend->last_name }}

                                                            </h5>

                                                            <h5 class="text-gray-900 text-xl font-medium">

                                                                {{ $postrend->regency->name }}

                                                            </h5>

                                        </div>

                                        <div class="p-6 font-medium text-sm text-gray-400">

                                        <p>

                                                            @php

                                                            $minutes = $thistime->diffInMinutes($postrend->updated_at);

                                                            $hours = $thistime->diffInHours($postrend->updated_at);

                                                            $days = $thistime->diff($postrend->updated_at)->days;

                                                            $weeks = $thistime->diffInWeeks($postrend->updated_at);

                                                            $months = $thistime->diffInMonths($postrend->updated_at);

                                                            $years = $thistime->diffInYears($postrend->updated_at);

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

                                </a>

                            

                        </div>

                @endforeach

                </div>

            </div>