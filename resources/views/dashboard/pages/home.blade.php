@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-main-dashboard" class="2xl:w-[55rem] lg:w-[38rem] xl:w-[47rem] ">
        <div class="swiper mySwiper  ">
            <div class="w-full flex justify-end">
                <div class="flex gap-6">
                    <div class="swiper-btn-prev text-2xl "><i class="text-lg fa-regular fa-angle-left"></i></div>
                    <div class="swiper-btn-next text-2xl "><i class="text-lg fa-regular fa-angle-right"></i></div>
                </div>

            </div>
            <div class="swiper-wrapper ">
                <div class="swiper-slide">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-wallet"></i>
                            </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
                            <h1 class="text-lg font-semibold">Rp 3.000.000</h1>
                            <p class="text-xs mt-1">Your Kas <br> balance</p>
                        </div>
                    </li>
                </div>
                <div class="swiper-slide ">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-user-plus"></i>
                            </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
                            <h1 class="text-lg font-semibold">12</h1>
                            <p class="text-xs mt-1">Count Dropping <br> today</p>
                        </div>
                    </li>
                </div>
                <div class="swiper-slide">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-user-check"></i> </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
                            <h1 class="text-lg font-semibold">12</h1>
                            <p class="text-xs mt-1">Count storting <br> today</p>
                        </div>
                    </li>
                </div>
                <div class="swiper-slide">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-money-simple-from-bracket"></i>
                            </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
                            <h1 class="text-lg font-semibold">Rp 2.000.000</h1>
                            <p class="text-xs mt-1">Count Nominal <br>Dropping today</p>
                        </div>
                    </li>
                </div>
                <div class="swiper-slide">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-credit-card-front"></i> </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
                            <h1 class="text-lg font-semibold">Rp 2.000.000</h1>
                            <p class="text-xs mt-1">Count Nominal <br>storting today</p>
                        </div>
                    </li>
                </div>
                <div class="swiper-slide">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-user-xmark"></i> </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
                            <h1 class="text-lg font-semibold">12</h1>
                            <p class="text-xs mt-1">Count Defaulted<br> Storting</p>
                        </div>
                    </li>
                </div>
                <div class="swiper-slide">
                    <li class="bg-white border rounded-2xl p-5 flex-1 ">
                        <div class="flex items-start justify-between">
                            <span class="text-3xl">
                                <i class="fa-light  fa-book-bookmark"></i>
                            </span>

                            <button class="text-xl rounded-full duration-150   flex items-center"><i
                                    class="fa-regular fa-ellipsis-vertical"></i></button>
                        </div>
                        <div class="mt-2">
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
                <div class="bg-white border w-full p-5 rounded-2xl ">
                    <h2 class="text-sm font-semibold">New Member</h2>
                    <div class="mt-2 flex gap-8 items-center">
                        <h1 class="text-5xl font-semibold">12</h1>
                        <button class="cursor-default bg-green-200 text-green-500 text-xs p-0.5 px-2 rounded-md">+
                            18.7%</button>
                    </div>
                </div>
                <div class="bg-white border w-full p-5 rounded-2xl ">
                    <h2 class="text-sm font-semibold">out Member</h2>
                    <div class="mt-2 flex gap-8 items-center">
                        <h1 class="text-5xl font-semibold">12</h1>
                        <button class="cursor-default bg-red-200 text-red-500 text-xs p-0.5 px-2 rounded-md">+
                            18.7%</button>
                    </div>
                </div>

            </div>
            <div class="bg-white border p-5 flex-1 rounded-2xl">
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

        <div class="w-full  mt-4 p-5 rounded-2xl bg-white border">
            <div class="p-2 border-b">
                <h2 class=" font-semibold">Recent New Member</h2>

            </div>
            <div class="overflow-y-auto h-44  hide-scrollbar">

                <table class="table-auto  text-sm  w-full">
                    <thead class="text-sm">
                        <tr class="text-left">
                            <th class="border-b p-2">Member</th>
                            <th class="border-b p-2">Resort</th>
                            <th class="border-b p-2">Datetime</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="flex  gap-4 p-2 items-center">
                                <button class="flex items-center"><img class="inline-block size-7 rounded-full "
                                        src="https://i.pinimg.com/474x/fc/a9/1c/fca91c533cc2aebdb97189dfbdde63d8.jpg"
                                        alt=""></button>
                                <span class="">Agung nurdiansyah</span>

                            </td>
                            <td class="p-2 border-x  text-gray-500 ">
                                <span >
                                    Resort c2
                                </span>

                            </td>
                            <td class="p-2 w-32  text-gray-500 ">
                                <span>
                                    02:01
                                </span>

                            </td>
                        </tr>

                        <tr>
                            <td class="flex  gap-4 p-2 items-center">
                                <button class="flex items-center"><img class="inline-block size-7 rounded-full "
                                        src="https://i.pinimg.com/474x/fc/a9/1c/fca91c533cc2aebdb97189dfbdde63d8.jpg"
                                        alt=""></button>
                                <span class="">Agung nurdiansyah</span>

                            </td>
                            <td class="p-2 border-x  text-gray-500 ">
                                <span >
                                    Resort c2
                                </span>

                            </td>
                            <td class="p-2 w-32  text-gray-500 ">
                                <span>
                                    02:01
                                </span>

                            </td>
                        </tr>

                        <tr>
                            <td class="flex  gap-4 p-2 items-center">
                                <button class="flex items-center"><img class="inline-block size-7 rounded-full "
                                        src="https://i.pinimg.com/474x/fc/a9/1c/fca91c533cc2aebdb97189dfbdde63d8.jpg"
                                        alt=""></button>
                                <span class="">Agung nurdiansyah</span>

                            </td>
                            <td class="p-2 border-x  text-gray-500 ">
                                <span >
                                    Resort c2
                                </span>

                            </td>
                            <td class="p-2 w-32  text-gray-500 ">
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
                    <button class="w-full p-2 text-sm font-semibold rounded-xl bg-white border text-black">View
                        Status</button>
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
                                class="cursor-default w-12 bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl">
                                <i class="fa-light  fa-book-bookmark"></i>
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
                                class="cursor-default w-12 bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl"><i
                                    class="fa-light  fa-chart-simple"></i></button>
                            <div class=" flex flex-col gap-1">
                                <span class="text-sm font-semibold">Dropping Target</span>
                                <span class="text-xs">Rp 0 / Rp 2.000.000</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="flex gap-4 items-center">
                            <button
                                class="cursor-default w-12 bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl">
                                <i class="fa-light  fa-credit-card-front"></i> </button>
                            <div class=" flex flex-col gap-1">
                                <span class="text-sm font-semibold">Storting</span>
                                <span class="text-xs">Rp 0 / Rp 2.000.000</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="flex gap-4 items-center">
                            <button
                                class="cursor-default w-12 bg-black text-white flex items-center justify-center  p-3 rounded-2xl text-2xl">
                                <i class="fa-light  fa-money-bill-transfer"></i>
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
            <div class="overflow-y-auto    hide-scrollbar">
                <!-- Set a specific height for the scrollable area -->
                <div class="flex gap-2 items-center">
                    <div class="w-2.5 h-2.5 bg-green-500 rounded-full"></div>
                    <span class="text-sm">Feb 02, 06:00 PM</span>
                </div>
                <p class="text-xs mt-2">you have been add dropping anggota baru bernama agung nurdiansyah senilai
                    Rp
                    500k</p>
            </div>
        </div>
    </section>
@endsection
