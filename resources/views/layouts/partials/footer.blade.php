<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

<script type="text/javascript">
    // $.ajaxSetup({
    //     header: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $(document).ready(function() {

        // console.log($('meta[name="csrf-token"]').attr('content'));

        // $('#agreebutton').on('submit', function(e) {
        //     e.preventDefault();

        //     var form = this;

        //     let eventidagree = $('input[name="eventidagree"]').val();
        //     let userid = $('input[name="userid"]').val();

        //     $.ajax({
        //         url: $(form).attr('action'),
        //         method: $(form).attr('method'),
        //         data: new FormData(form),
        //         processData: false,
        //         // dataType: 'JSON',
        //         contentType: false,
        //         success: function(response) {
        //             console.log(response);
        //             if(response == '/event'){
        //                 window.location.href = window.location.href
        //             }else{
        //                 window.location.href = response.redirect_url
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error("Hata:", error);
        //         }
        //     });
        // });

        /* --- Etkinlik Detay Sayfaları Kodları --- */

        //KATILIYORUM KODLARI


        // $('#notagreebutton').on('submit', function(e) {
        //     e.preventDefault();

        //     var form = this;

        //     let eventidagree = $('input[name="eventidnotagree"]').val();
        //     let userid = $('input[name="userid"]').val();

        //     $.ajax({
        //         url: $(form).attr('action'),
        //         method: $(form).attr('method'),
        //         data: new FormData(form),
        //         processData: false,
        //         // dataType: 'JSON',
        //         contentType: false,
        //         success: function(response) {
        //             console.log(response);
        //             // if(response == '/event'){
        //             //     window.location.href = window.location.href
        //             // }else{
        //             //     window.location.href = response.redirect_url
        //             // }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error("Hata:", error);
        //         }
        //     });
        // });


        //KATILMIYORUM KODLARI

        /* --- Etkinlik detay sayfaları kodları --- */

        $(".mobile-menu-button").click(function() {
            $(".mobile-menu").toggleClass("flex");
            $(".mobile-menu").toggleClass("hidden");
            $(".bacgroundArea").toggleClass("flex");
            $(".bacgroundArea").toggleClass("hidden");
        });

        $(".close-button-secound").click(function() {
            $(".mobile-menu").toggleClass("flex");
            $(".mobile-menu").toggleClass("hidden");
            $(".bacgroundArea").toggleClass("flex");
            $(".bacgroundArea").toggleClass("hidden");
        });

    });
</script>

<div class="flex flex-col bg-white">
    {{-- <div class="flex flex-row w-full max-w-7xl mx-auto p-4">
        <hr class="w-full" />
    </div> --}}
    <div class="flex flex-row w-full max-w-7xl mx-auto py-4 justify-between items-center space-x-2 sm:px-2 md:px-2">
        <div class="flex flex-row">
            <a href="#">
                <img src="{{ asset('img/my-logo.png') }}" alt="">
            </a>
        </div>
        <div class="flex flex-row space-x-2">
            <a href="#" class="text-gray-500 text-sm no-underline hover:text-blue-600">
                <span>Cookie policy</span>
            </a>
            <span class="text-gray-500 text-sm">© Etkinlik Sitesi 2023</span>
        </div>
    </div>
</div>
