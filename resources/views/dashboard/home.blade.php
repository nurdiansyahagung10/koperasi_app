@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <main class="w-full h-full overflow-y-auto">
        @include('dashboard.layout.topnav')
        <div class="flex gap-6 mt-5 ">
            <section id="section-main-dashboard" class="2xl:w-[55rem] lg:w-[38rem] xl:w-[47rem]">
                <div class="swiper mySwiper  ">
                    <div class="w-full flex justify-end">
                        <div class="flex">
                            <div class="swiper-btn-prev text-2xl "><i class='bx bx-chevron-left'></i></div>
                            <div class="swiper-btn-next text-2xl "><i class='bx bx-chevron-right'></i></div>
                        </div>

                    </div>
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-wallet'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                                    <p class="text-xs mt-1">Your Kas <br> balance</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide ">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-user-plus'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">12</h1>
                                    <p class="text-xs mt-1">Count Dropping <br> today</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-user-check'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">12</h1>
                                    <p class="text-xs mt-1">Count storting <br> today</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-money-withdraw'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">Rp 2.000.000</h1>
                                    <p class="text-xs mt-1">Count Nominal <br>Dropping today</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-credit-card-front'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">Rp 2.000.000</h1>
                                    <p class="text-xs mt-1">Count Nominal <br>storting today</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-user-x'></i>
                                    </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">12</h1>
                                    <p class="text-xs mt-1">Count Defaulted<br> Storting</p>
                                </div>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li class="bg-white rounded-2xl p-5 flex-1 ">
                                <div class="flex items-start justify-between">
                                    <span class="text-4xl">
                                        <i class='bx bx-book'></i> </span>

                                    <button
                                        class="text-2xl rounded-full hover:bg-black hover:text-white duration-150  flex items-center"><i
                                            class='bx bx-dots-vertical-rounded'></i></button>
                                </div>
                                <div>
                                    <h1 class="text-lg font-semibold">12</h1>
                                    <p class="text-xs mt-1">Count Nominal <br>Defaulted Storting</p>
                                </div>
                            </li>
                        </div>

                    </div>

                </div>
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        slidesPerView: 4,
                        spaceBetween: 15,
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: false,
                        },
                        navigation: {
                            nextEl: ".swiper-btn-next",
                            prevEl: ".swiper-btn-prev",
                        },
                    });
                </script>


                <div class="flex mt-4 gap-5">
                    <div class="flex w-52 flex-col gap-4">
                        <div class="bg-white w-full p-5 rounded-2xl ">
                            <h2 class="text-sm font-semibold">New Member</h2>
                            <div class="mt-2 flex gap-8 items-center">
                                <h1 class="text-5xl font-semibold">12</h1>
                                <button class="cursor-default bg-green-200 text-green-500 text-xs p-0.5 px-2 rounded-md">+
                                    18.7%</button>
                            </div>
                        </div>
                        <div class="bg-white w-full p-5 rounded-2xl ">
                            <h2 class="text-sm font-semibold">out Member</h2>
                            <div class="mt-2 flex gap-8 items-center">
                                <h1 class="text-5xl font-semibold">12</h1>
                                <button class="cursor-default bg-red-200 text-red-500 text-xs p-0.5 px-2 rounded-md">+
                                    18.7%</button>
                            </div>
                        </div>

                    </div>
                    <div class="bg-white p-5 flex-1 rounded-2xl">
                        <div class="flex justify-between px-1">
                            <span class="text-sm font-semibold">Revenue</span>
                            <span class="text-xs">Last 7 days</span>
                        </div>

                        <div class=" w-full h-full relative pb-5 pt-2 flex justify-center items-center ">
                            <canvas id="myChart" class="absolute h-full"></canvas>

                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ['Jan 10', 'Jan 11', 'Jan 12', 'Jan 13', 'Jan 14', 'Jan 15', 'Jan 16'],
                                        datasets: [{
                                            label: 'Sales 2023',
                                            data: [65, 59, 80, 81, 56, 55, 40],
                                            borderColor: '#6b7280',
                                            borderWidth: 2,
                                            fill: false
                                        }, {
                                            label: 'Sales 2024',
                                            data: [28, 48, 40, 19, 86, 27, 90],
                                            borderColor: 'black ',
                                            borderWidth: 2,
                                            fill: false
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    stepSize: 4,
                                                    maxTicksLimit: 4
                                                }

                                            },
                                            x: {
                                                grid: {
                                                    display: false
                                                },

                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: false
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>

                </div>

                <div class="w-full h-72 mt-4 p-5 rounded-2xl bg-white">
                    <h2 class="text-sm font-semibold">Recent New Member</h2>
                    <div class="overflow-y-auto h-full ">

                        <table class="table-fixed mt-3 w-full">
                            <tbody>
                                <tr>
                                    <td class="flex gap-4 pb-3 items-center">
                                        <button class="flex items-center"><img class="inline-block size-8 rounded-full "
                                                src="https://i.pinimg.com/474x/fc/a9/1c/fca91c533cc2aebdb97189dfbdde63d8.jpg"
                                                alt=""></button>
                                        <span>Agung nurdiansyah</span>

                                    </td>
                                    <td class="text-center">
                                        <span>
                                            Resort c2
                                        </span>

                                    </td>
                                    <td class="text-center">
                                        <span>
                                            02:01
                                        </span>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


            </section>
            <section class="flex-1 flex flex-col gap-5">
                <div class="w-full bg-black rounded-xl  text-white p-5 px-7">
                    <h1 class="text-lg font-semibold">Storting status</h1>
                    <span class="text-sm">in progres</span>
                    <div class="mt-4 w-full">

                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="w-[75%] bg-gray-500 h-3">

                            </div>
                        </div>
                        <div class="mt-4 flex flex-col text-center text-sm">
                            <span class="font-semibold">Estimated processing</span>
                            <span>4-5 Members again</span>
                        </div>
                        <div class="mt-5">
                            <button class="w-full p-2.5 font-semibold rounded-xl bg-white text-black">View Status</button>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class=" font-semibold">All To-do List</h1>
                    <div class="mt-5">
                        <ul class="flex flex-col gap-5">
                            <li>
                                <div class="flex gap-4 items-center">
                                    <button
                                        class="cursor-default bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl">
                                        <i class='bx bx-book'></i>
                                    </button>
                                    <div class=" flex flex-col gap-1">
                                        <span class="text-sm font-semibold">Defaulted Storting</span>
                                        <span class="text-xs">Rp 0 / Rp 2.000.000</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-4 items-center">
                                    <button
                                        class="cursor-default bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl"><i
                                            class='bx bx-bar-chart-square  '></i></button>
                                    <div class=" flex flex-col gap-1">
                                        <span class="text-sm font-semibold">Dropping Target</span>
                                        <span class="text-xs">Rp 0 / Rp 2.000.000</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-4 items-center">
                                    <button
                                        class="cursor-default bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl">
                                        <i class='bx bx-credit-card-front'></i>
                                    </button>
                                    <div class=" flex flex-col gap-1">
                                        <span class="text-sm font-semibold">Storting</span>
                                        <span class="text-xs">Rp 0 / Rp 2.000.000</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex gap-4 items-center">
                                    <button
                                        class="cursor-default bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl">
                                        <i class='bx bx-repeat'></i>
                                    </button>
                                    <div class=" flex flex-col gap-1">
                                        <span class="text-sm font-semibold">Cash Deposite</span>
                                        <span class="text-xs">Rp 0 / Rp 2.000.000</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-2 h-full bg-black rounded-xl text-white p-5 px-7">
                    <h1 class="font-semibold">History</h1>
                    <div class="overflow-y-auto h-32 xl:h-20   hide-scrollbar"> <!-- Set a specific height for the scrollable area -->
                        <div class="flex gap-2 items-center">
                            <div class="w-2.5 h-2.5 bg-green-500 rounded-full"></div>
                            <span class="text-sm">Feb 02, 06:00 PM</span>
                        </div>
                        <p class="text-xs mt-2">you have been add dropping anggota baru bernama agung nurdiansyah senilai Rp
                            500k</p>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
