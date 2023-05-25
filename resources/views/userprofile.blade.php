@extends('layouts.master')
@section('title', 'Profile Setting')
@section('content')
    <div class="w-full h-screen bg-gradient-to-r from-sky-500 via-green-500 to-green-500">
        <div class="w-full h-screen max-w-7xl mx-auto items-center">
            <div class="flex max-w-2xl mx-auto justify-center bg-white">
                <div class="flex flex-col mx-auto absolute rounded-lg border-sky-500 inset-y-32 border-2 p-8 space-y-4">
                    <div class="flex flex-col justify-center mx-auto p-3">
                        <h1 class="text-3xl font-semibold text-white">Account Settings</h1>
                    </div>
                    <form action="{{ route('profileupdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col space-y-4 my-auto">
                            <div class="flex flex-row space-x-4 items-center">
                                @foreach ($takeImage as $lastTakeImage)
                                    <img src="{{ $lastTakeImage->profile_image }}" alt="" width="100"
                                        height="100">
                                @endforeach
                                <div class="flex flex-col space-y-2">
                                    <label for="" class="text-white">Profil Resminiz</label>
                                    <input type="file" name="profileimage"
                                        class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400
                                        file:bg-transparent file:border-0
                                        file:bg-gray-100 file:mr-4
                                        file:py-3 file:px-4
                                        dark:file:bg-gray-700 dark:file:text-gray-400">
                                </div>
                            </div>
                            <label for="" class="text-white">Şifre Değiştirme</label>
                            <input type="password" name="passwordcahnge" class="border-2 rounded p-2"
                                placeholder="Yeni Şifreniz">
                            <label for="" class="text-white">Şifre Doğrulama</label>
                            <input type="password" name="passwordcahngetwo" class="border-2 rounded p-2"
                                placeholder="Şifrenizi Doğrulayınız">
                        </div>
                        <div class="flex flex-col my-2 space-y-4 text-center">
                            <button class="w-full p-2 bg-green-500 text-white rounded hover:bg-sky-500">Güncelle</button>
                            <a href="{{ route('homepage') }}"
                                class="text-white transition ease-in-out hover:scale-125">Homepage</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
