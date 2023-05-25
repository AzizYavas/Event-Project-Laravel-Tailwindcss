@extends('layouts.master')
@section('title', 'Event Web Site')
@section('content')
    @include('layouts.partials.slider')
    {{-- BU HAFTAKİ ETKİNLİKLER --}}
    <div class="flex flex-col w-full max-w-7xl mx-auto pt-12 sm:pt-4">
        <div
            class="flex flex-row justify-between items-center pb-2 px-4 sm:flex-col sm:justify-start sm:items-start sm:p-4 sm:space-y-2 md:p-4">
            <label for="" class="text-2xl font-medium">This Week Events</label>
        </div>
        <div
            class="flex flex-row w-full h-2/3 max-h-max items-center max-w-7xl mx-auto px-4 py-8 overflow-x-auto space-x-4 hover:cursor-pointer">
            @foreach ($weeklyEvent as $takeWeeklyEvent)
                <a href="{{ route('eventdetail', ['id' => $takeWeeklyEvent->id]) }}">
                    {{-- {{ route('eventdetail') }} --}}
                    <div class="flex-none w-64 rounded-lg">
                        <div class="flex flex-col  rounded-b-xl sm:w-full">
                            <img src="{{ $takeWeeklyEvent->event_imageBase64 }}"
                                class="hover:scale-110 transition duration-700 ease-in-out hover:cursor-pointer rounded-t-xl"
                                alt="" width="281" height="150">
                            <div class="flex flex-col bg-white hover:shadow-2xl h-60 max-h-60">
                                <a href="{{ route('eventdetail', ['id' => $takeWeeklyEvent->id]) }}"
                                    class="text-gray-400 text-sm font-medium px-4 pt-4 no-underline">{{ $takeWeeklyEvent->event_category }}</a>
                                <a href="{{ route('eventdetail', ['id' => $takeWeeklyEvent->id]) }}"
                                    class="text-gray-700 font-medium px-4 pt-4 text-md leading-5">{{ $takeWeeklyEvent->event_title }}</a>
                                <div class="flex flex-row items-center px-4 pt-4 space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    <p class="text-gray-400 text-xs font-medium">
                                        {{ $takeWeeklyEvent->event_start }}-{{ $takeWeeklyEvent->event_end }}</p>
                                </div>
                                <div class="flex flex-row items-center px-4 pt-4 space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <p class="text-gray-400 text-sm font-medium">
                                        {{ Str::limit($takeWeeklyEvent->event_adress, 35) }}</p>
                                </div>
                            </div>
                            <hr class="w-full" />
                            <div class="flex flex-row bg-white p-4 rounded-b-xl">
                                <p class="font-medium text-gray-800 text-base">Free</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    {{-- BU HAFTAKİ ETKİNLİKLER --}}

    {{-- POPULER ETKİNLİKLER --}}
    <div class="flex flex-col w-full max-w-7xl mx-auto pt-12 sm:pt-4">
        <div
            class="flex flex-row justify-between items-center pb-2 px-4 sm:flex-col sm:justify-start sm:items-start sm:p-4 sm:space-y-2 md:p-4">
            <label for="" class="text-2xl font-medium">Popular Events</label>
        </div>

        <div
            class="flex flex-row w-full h-2/3 max-h-max items-center max-w-7xl mx-auto px-4 py-8 overflow-x-auto space-x-4 hover:cursor-pointer">
            @foreach ($mostRepeatedEvents as $takeMostRepeated)
            <a href="{{ route('eventdetail', ['id' => $takeMostRepeated->id]) }}">
                <div class="flex-none w-64 rounded-lg">
                    <div class="flex flex-col  rounded-b-xl sm:w-full">
                        <img src="{{ $takeMostRepeated->event_imageBase64 }}"
                            class="hover:scale-110 transition duration-700 ease-in-out hover:cursor-pointer rounded-t-xl"
                            alt="" width="281" height="150">
                        <div class="flex flex-col bg-white hover:shadow-2xl h-60 max-h-60">
                            <a href="{{ route('eventdetail', ['id' => $takeMostRepeated->id]) }}" class="text-gray-400 text-sm font-medium px-4 pt-4 no-underline">Kategori</a>
                            <a href="{{ route('eventdetail', ['id' => $takeMostRepeated->id]) }}" class="text-gray-700 font-medium px-4 pt-4 text-lg leading-5">Etkinlik Adı</a>
                            <div class="flex flex-row items-center px-4 pt-4 space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                                <p class="text-gray-400 text-sm font-medium">{{ $takeMostRepeated->event_start }}-{{ $takeMostRepeated->event_end }}</p>
                            </div>
                            <div class="flex flex-row items-center px-4 pt-4 space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="text-gray-400 text-sm font-medium">{{ Str::limit($takeMostRepeated->event_adress, 30) }}</p>
                            </div>
                        </div>
                        <hr class="w-full" />
                        <div class="flex flex-row bg-white p-4 rounded-b-xl">
                            <p class="font-medium text-gray-800 text-base">Free</p>
                        </div>
                    </div>
                </div>
            </a>     
            @endforeach
        </div>

    </div>
    {{-- POPULER ETKİNLİKLER --}}


@endsection
