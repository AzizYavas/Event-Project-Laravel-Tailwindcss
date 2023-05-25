<div class="w-full h-screen max-w-full max-h-[41rem] mx-auto top-0 left-0 right-0">
    <swiper-container class="mySwiper" centered-slides="true" autoplay-delay="3000" autoplay-disable-on-interaction="false"
        space-between="30" effect="fade">
        @foreach ($eventSliderData as $getEventDataForSlider)
        <swiper-slide>
            <img class="top-0 left-0 w-full h-screen max-h-[39rem] object-cover" src="{{ $getEventDataForSlider->event_imageBase64 }}"
                alt="">
            <div class="absolute top-20 w-full h-full max-w-7xl flex flex-col justify-center text-white">
                <div class="left-[10%] max-w-7xl m-auto absolute p-4 space-y-4">
                    <h1 class="text-5xl font-medium">{{ $getEventDataForSlider->event_title }}</h1>
                    <p class="text-2xl">{{ Str::limit($getEventDataForSlider->event_title, 40) }}</p>
                    <button class="bg-sky-500 rounded-lg text-white p-4 hover:cursor-pointer text-xl hover:opacity-80 hover:scale-105"><a href="{{ route('eventdetail', ['id' => $getEventDataForSlider->id]) }}">Detail</a></button>
                </div>
            </div>
        </swiper-slide>
        @endforeach
    </swiper-container>
</div>
