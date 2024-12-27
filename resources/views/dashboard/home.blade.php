@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <main class="w-full">
        @include('dashboard.layout.topnav')
        <div class="flex gap-4 mt-7 ">
            <section class="w-[55rem]" >
                <div class="swiper mySwiper  ">
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-4 flex-1 h-36">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-wallet'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                                    <p class="text-xs mt-1">Your Kas <br> balance</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-4 flex-1 h-36">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-wallet'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                                    <p class="text-xs mt-1">Your Kas <br> balance</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-4 flex-1 h-36">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-wallet'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                                    <p class="text-xs mt-1">Your Kas <br> balance</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">Slide 4</div>
                        <div class="swiper-slide">Slide 5</div>
                        <div class="swiper-slide">Slide 6</div>
                        <div class="swiper-slide">Slide 7</div>
                        <div class="swiper-slide">Slide 8</div>
                        <div class="swiper-slide">Slide 9</div>
                    </div>
                </div>
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        slidesPerView: 4,
                        spaceBetween: 20,
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                    });
                </script>
                <ul class="flex gap-4">


                    <li class="bg-white rounded-2xl p-4 flex-1 h-36">
                        <div class="flex items-start justify-between">
                            <span class="text-4xl">
                                <i class='bx bx-wallet'></i>
                            </span>

                            <button class="text-2xl rounded-full hover:bg-black hover:text-white  flex items-center"><i
                                    class='bx bx-dots-vertical-rounded'></i></button>
                        </div>
                        <div>
                            <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                            <p class="text-xs mt-1">Your Kas <br> balance</p>
                        </div>
                    </li>
                    <li class="bg-white rounded-2xl p-4 flex-1 h-36">
                        <div class="flex items-start justify-between">
                            <span class="text-4xl">
                                <i class='bx bx-wallet'></i>
                            </span>

                            <button class="text-2xl rounded-full hover:bg-black hover:text-white  flex items-center"><i
                                    class='bx bx-dots-vertical-rounded'></i></button>
                        </div>
                        <div>
                            <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                            <p class="text-xs mt-1">Your Kas <br> balance</p>
                        </div>
                    </li>
                </ul>
            </section>
            <section class="flex-1">
                <h1>sdfsdfjk</h1>
            </section>
        </div>
    </main>
@endsection
