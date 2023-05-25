@extends('layouts.master')
@section('title', 'Event Page')
@section('content')
    <div class="flex w-full sm:h-[27rem] h-[39rem]">
        <div class="flex flex-col w-full h-screen mx-auto">
            @foreach ($eventDetailForId as $getEventDetailForId)
                <div class="w-full h-screen max-w-full max-h-[20rem] mx-auto top-0 left-0 right-0">
                    <img class="top-0 left-0 w-full h-screen max-h-[39rem] object-cover filter blur-lg sm:max-h-[10rem]"
                        src="{{ $getEventDetailForId->event_imageBase64 }}" alt="">
                    {{-- RESİM ÜSTÜ VE YAZI --}}
                    <div
                        class="flex flex-col w-full h-screen max-w-7xl mx-auto max-h-[33rem] absolute left-0 right-0 top-20 items-center sm:max-h-[21rem]">
                        <img class="w-full h-screen max-w-7xl max-h-[33rem] object-cover sm:max-h-[10rem] rounded-md"
                            src="{{ $getEventDetailForId->event_imageBase64 }}" alt="">
                        <div class="w-full max-w-7xl m-auto absolute left-0 bottom-0 p-4 space-y-3 sm:bg-white">
                            <h4 class="text-base text-white sm:text-gray-600 uppercase">
                                {{ $getEventDetailForId->event_category }}</h4>
                            <h1 class="capitalize text-white sm:text-black text-3xl">{{ $getEventDetailForId->event_title }}
                            </h1>
                            <div class="flex flex-row items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white sm:text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                                <p class="sm:text-gray-600 text-white text-base font-medium capitalize">
                                    {{ $getEventDetailForId->event_start }}</p>
                            </div>
                            <div class="flex flex-row items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white sm:text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="sm:text-gray-600 text-white text-base font-medium capitalize">
                                    {{ $getEventDetailForId->event_adress }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- RESİM ÜSTÜ VE YAZI --}}
                </div>
            @endforeach
        </div>
    </div>
    <hr class="hidden w-full border-0 h-px bg-gray-300 sm:flex" />
    @foreach ($eventDetailForId as $getEventDetailForId)
        <div class="flex flex-row w-full h-auto mx-auto bg-gray-200 border-b-2 border-gray-300">
            <div class="flex flex-row w-full max-w-7xl p-4 mx-auto bg-gray-200 space-x-4 justify-between">
                <div class="flex space-x-2 items-center">
                    <a href="#" class="text-gray-400 hover:text-blue-500">Açıklama</a>
                    <a href="#" class="text-gray-400 hover:text-blue-500">Adres</a>
                </div>
                <div class="flex space-x-2 items-center">
                    @if (auth()->guard('alluser')->check() === true)
                        @foreach ($eventNotification as $takeAgreeData)
                            @if ($takeAgreeData->agree_data == 1)
                                <form action="{{ route('eventupdateresponse') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="eventidagreeforcheck" value="{{ $getEventDetailForId->id }}">
                                    <button type="submit" class="p-2 rounded-lg text-white bg-red-500">Katılmaktan
                                        Vazgeçtim</button>
                                </form>
                            @endif
                            @if ($takeAgreeData->agree_data == 0)
                                <form action="{{ route('eventupdateresponse') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="eventidnotagreeforcheck" value="{{ $getEventDetailForId->id }}">
                                    <button type="submit" class="p-2 rounded-lg text-white bg-green-500">Katılmak
                                        İstiyorum</button>
                                </form>
                            @endif
                        @endforeach
                        @if ($emtpyValue != 1)
                            <form action="{{ route('eventpostresponsename') }}" method="POST">
                                @csrf
                                <input type="hidden" name="eventidagree" value="{{ $getEventDetailForId->id }}">
                                <button type="submit" class="p-2 rounded-lg text-white bg-green-500">Katılıyorum</button>
                            </form>
                            <form action="{{ route('eventpostresponsename') }}" method="POST">
                                @csrf
                                <input type="hidden" name="eventidnotagree" value="{{ $getEventDetailForId->id }}">
                                <button type="submit" class="p-2 rounded-lg text-white bg-red-500">Katılmıyorum</button>
                            </form>
                        @endif
                    @else
                        <form action="{{ route('eventpostresponsename') }}" method="POST">
                            @csrf
                            <input type="hidden" name="eventidagree" value="{{ $getEventDetailForId->id }}">
                            <button type="submit" class="p-2 rounded-lg text-white bg-green-500">Katılıyorum</button>
                        </form>
                        <form action="{{ route('eventpostresponsename') }}" method="POST">
                            @csrf
                            <input type="hidden" name="eventidnotagree" value="{{ $getEventDetailForId->id }}">
                            <button type="submit" class="p-2 rounded-lg text-white bg-red-500">Katılmıyorum</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full h-auto bg-white">
            <div class="flex flex-col w-full max-w-7xl mx-auto py-8 p-4 sm:h-auto justify-start">
                <div class="flex flex-col w-full h-auto max-w-7xl mx-auto space-y-2">
                    <h1 class="text-2xl text-gray-900 capitalize">{{ $getEventDetailForId->event_title }}</h1>
                    <p class="text-gray-600 text-sm">{{ $getEventDetailForId->event_text }}</p>
                </div>
                <div class="flex flex-col w-full h-auto py-4 space-y-2">
                    <h1 class="text-2xl text-gray-900 capitalize">Adres</h1>
                    <p class="text-gray-600 text-sm">{{ $getEventDetailForId->event_adress }}</p>
                </div>
            </div>
        </div>
    @endforeach

@endsection
