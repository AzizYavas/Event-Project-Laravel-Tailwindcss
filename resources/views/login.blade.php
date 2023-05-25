<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Sayfası</title>
    @vite('resources/css/app.css')
</head>
<body class="w-full h-screen bg-gray-600">
    <div class="flex flex-col w-1/3 h-2/3 bg-white absolute inset-0 justify-center items-center mx-auto my-auto rounded-lg p-4
    sm:w-2/3 sm:h-2/3 md:w-2/3 md:h-2/3
    ">
        <div class="flex flex-col mx-auto items-center space-y-2">
            <h1 class="text-3xl font-semibold">Giriş Sayfası</h1>
            <label for="" class="">Hesabınız yokmu ? <a href="{{ route('register') }}" class="text-blue-500">Kayıt Ol</a></label>
        </div>
        <div class="flex flex-row justify-start px-4 w-full">
            <form action="{{ route('loginpost') }}" method="POST" class="flex flex-col justify-start w-full space-y-2">
                @csrf
                <label for="" class="text-sm mb-2 text-gray-500">E-mail</label>
                <input type="email" name="email" class="p-1 border-2 border-slate-400 rounded-md border-solid">
                <label for="" class="text-sm mb-2 text-gray-500">Şifre</label>
                <input type="password" name="password" class="p-1 border-2 border-slate-400 rounded-md border-solid">
                <div class="flex flex-col w-full py-4">
                    <button class="bg-blue-500 p-1 text-white rounded-md">Giriş Yap</button>
                </div>
            </form>
        </div>
        <div class="flex flex-row items-center justify-center absolute bottom-8">
            <a href="{{ route('homepage') }}" class="text-green-500 text-lg font-medium">Anasayfa</a>
        </div>
    </div>
</body>
</html>