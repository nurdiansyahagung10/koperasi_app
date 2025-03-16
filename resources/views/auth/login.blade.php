@extends('layout.template')

@section('main')
    <main class="2xl:container mx-auto w-full h-screen overflow-x-hidden">

        <div class="grid lg:grid-cols-2">
            <section class="w-full h-screen flex flex-col p-10 relative">
                @include('components.errors_notification')

                <span class="font-medium text-xl">Koperasi Kita</span>

                <div class="w-full  flex h-full justify-center items-center">
                    <form method="POST" action="{{ route('auth') }}">
                        @csrf
                        <div class="text-center pb-4">
                            <h1 class="text-2xl font-semibold">
                                Welcome Back
                            </h1>
                            <p class="text-gray-500 text-sm md:text-base">
                                Welcome Back, Please enter your detail
                            </p>
                        </div>

                        <div class="button mt-4 bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                            <div class=" border-e flex items-center h-8">
                                <span class=" pe-3 text-2xl flex items-center">
                                    <i class=" text-xl fa-light fa-envelope"></i>
                                </span>
                            </div>
                            <div class="flex flex-col w-full">
                                <label class="text-xs ps-4 text-gray-500 whitespace-nowrap">Email Address <span
                                        class="text-red-600">*</span></label>
                                <input type="email" name="email"
                                    class="w-full outline-hidden text-sm border-none shadow-none ps-4"
                                    placeholder="account@gmail.com">
                            </div>
                        </div>

                        <div class="button bg-white mt-4 border flex items-center px-4 py-1.5 rounded-xl ">
                            <div class=" border-e flex items-center h-8">
                                <span class=" pe-3 text-2xl flex items-center">
                                    <i class=" text-xl fa-light fa-lock"></i>
                                </span>
                            </div>
                            <div class="flex flex-col w-full">
                                <label class="text-xs ps-4 text-gray-500 whitespace-nowrap">Password <span
                                        class="text-red-600">*</span></label>
                                <input type="password" name="password"
                                    class="w-full outline-hidden text-sm border-none shadow-none ps-4">
                            </div>
                        </div>

                        <button class="px-4 py-2.5 mt-4 bg-black text-white rounded-xl w-full">SIGN
                            IN</button>
                    </form>
                </div>
            </section>
            <section class="w-full h-screen hidden lg:block relative p-5">
                <div class="bg-gray-100 rounded-3xl rotate-6 -mt-6 -ms-5 w-28 h-28 absolute"></div>
                <img src="{{ url('img/person-working-office.jpg') }}" class="w-full h-full rounded-xl object-cover"
                    alt="">
                <div class="text-center absolute w-full pe-16 ps-6 text-white -mt-60 lg:-mt-40 xl:-mt-36">
                    <div class="backdrop-blur-sm rounded-md p-3">
                        <h1 class="text-xl font-medium ">Discovering the best <br> all you know Furniture for your home</h1>
                        <p class="text-sm mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis debitis
                            assumenda voluptatibus molestiae animi quod, at veritatis</p>
                    </div>
                </div>
            </section>

        </div>
    </main>


    <script>
        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
