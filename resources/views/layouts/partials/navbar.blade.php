<div class="flex justify-center items-center">
    {{-- navbar başlangıç  --}}
    <nav class="bg-transparent w-full max-w-7xl absolute top-0 z-10 mx-auto md:p-2 sm:p-2">
        <div class="flex justify-between items-start">
            {{-- Logo --}}
            <div class="flex items-center p-3">
                <a href="{{ route('homepage') }}">
                    <img src="{{ asset('img/my-logo.png') }}" alt="">
                </a>
            </div>
            {{-- Menüler --}}
            <div class="flex sm:hidden justify-between space-x-2">
                @if (auth()->guard('alluser')->check() === true)
                {{-- GİRİŞ YAPILDIĞINDA DURUM --}}
                <div class="flex flex-col p-3 items-end justify-start">
                    <div class="flex flex-row items-center space-x-2 peer">
                        <img src="{{ $image }}" alt="" width="50" height="50"
                        class="hover:scale-110 transition duration-700 cursor-pointer">
                    <p class="text-white uppercase ">{{ auth()->guard('alluser')->user()->name }}</p>
                    </div>
                    <div class="hidden peer-hover:flex hover:flex w-full flex-col bg-white drop-shadow-lg items-start">
                        <a href="{{ route('userprofile') }}">
                            <button class="px-6 py-3 hover:bg-slate-500 hover:text-white w-full bg-transparent">Profile</button>
                        </a>
                        <a class="w-full" href="#">
                            <form action="{{ route('logoutpost') }}" method="POST" class="flex">
                            @csrf
                            <button class="px-5 py-3 hover:bg-slate-500 hover:text-white w-full bg-transparent">Logout</button>
                            </form>
                        </a>
                    </div>
                </div>
                {{-- GİRİŞ YAPILDIĞINDA DURUM --}}
                @else
                <div class="flex flex-row p-3">
                    <ul class="flex space-x-4 items-center">
                        <li class="leading-10 h-16 items-center hover:border-white hover:border-b-2">
                            <a href="{{ route('login') }}" class="capitalize text-lg font-semibold text-white">Giriş</a>
                        </li>
                        <li class="leading-10 h-16 items-center hover:border-white hover:border-b-2">
                            <a href="{{ route('register') }}"
                                class="capitalize text-lg font-semibold text-white">Kayıt</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            {{-- Mobil Menu Button --}}
            <div class="hidden sm:flex items-center">
                <button type="button"
                    class="mobile-menu-button inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg sm:flex hover:bg-gray-100"
                    aria-controls="navbar-default" aria-expanded="false">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- MOBİLE MENU --}}
    <div class="flex">
        <div class="bacgroundArea bg-black absolute top-0 bottom-0 left-0 right-0 z-0 hidden opacity-50"></div>
        <div class="mobile-menu hidden flex-col z-50 h-screen w-3/5 bg-white absolute top-0 right-0">
            <div class="flex absolute right-0 py-4 px-2">
                <button type="button"
                    class="close-button-secound bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="pt-2">
                <div class="flex px-2 py-2">
                    <a href="#">
                        <img src="https://placehold.co/100x50" alt="">
                    </a>
                </div>
                <ul class="flex flex-col p-8 space-y-4">
                    <li class="text-black">Etkinlikler</li>
                </ul>
            </div>
            <div class="absolute bottom-4">
                <hr class="w-full" />
                <ul class="flex flex-col p-8 space-y-4">
                    <li class="text-black">Yardım</li>
                    <li class="text-black">Giriş</li>
                    <li class="text-black">Kayıt Ol</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- navbar sonu --}}

</div>
