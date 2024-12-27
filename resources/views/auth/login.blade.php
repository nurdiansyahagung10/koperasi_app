@extends('layout.template')

@section('main')
    <main class="2xl:container mx-auto w-full h-screen overflow-x-hidden">

        <div class="grid lg:grid-cols-2">
            <section class="w-full h-screen flex flex-col p-10">
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
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div id="mainalert{{$loop->iteration}}"
                                    class="bg-red-100 border mt-4 border-red-400 text-red-700 px-4 max-w-80 py-3 rounded relative"
                                    role="alert">
                                    <span class="block text-sm md:text-base sm:inline">{{ $error }}</span>
                                    <button onclick="testing(event,'mainalert{{$loop->iteration}}')" id="hidealert"
                                        class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <title>Close</title>
                                            <path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        @endif

                        <div class="button mt-4 bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                            <div class=" border-e flex items-center h-8">
                                <span class=" pe-3 text-2xl flex items-center">
                                    <i class='bx bx-envelope'></i>
                                </span>
                            </div>
                            <div class="flex flex-col w-full">
                                <label class="text-xs ps-4 text-gray-500 whitespace-nowrap">Email Address <span
                                        class="text-red-600">*</span></label>
                                <input type="email" name="email" class="w-full outline-none text-sm border-none shadow-none ps-4"
                                    placeholder="account@gmail.com">
                            </div>
                        </div>

                        <div class="button bg-white mt-4 border flex items-center px-4 py-1.5 rounded-xl ">
                            <div class=" border-e flex items-center h-8">
                                <span class=" pe-3 text-2xl flex items-center">
                                    <i class='bx bxs-key'></i>
                                </span>
                            </div>
                            <div class="flex flex-col w-full">
                                <label class="text-xs ps-4 text-gray-500 whitespace-nowrap">Password <span
                                        class="text-red-600">*</span></label>
                                <input type="password" name="password" class="w-full outline-none text-sm border-none shadow-none ps-4">
                            </div>
                        </div>

                        <button class="px-4 py-2.5 mt-4 bg-black text-white rounded-xl w-full">SIGN
                            IN</button>
                    </form>
                </div>
            </section>
            <section class="w-full h-screen relative p-5">
                <div class="bg-gray-50 rounded-3xl rotate-6 -mt-6 -ms-5 w-28 h-28 absolute"></div>
                <img src="{{ url('img/person-working-office.jpg') }}" class="w-full h-full rounded-xl object-cover"
                    alt="">
                <div class="text-center absolute w-full pe-16 ps-6 text-white -mt-60 lg:-mt-40 xl:-mt-36">
                    <div class="backdrop-blur rounded-md p-3">
                        <h1 class="text-xl font-medium ">Discovering the best <br> all you know Furniture for your home</h1>
                        <p class="text-sm mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis debitis
                            assumenda voluptatibus molestiae animi quod, at veritatis</p>
                    </div>
                </div>
            </section>

        </div>
    </main>


    <script>
        function testing(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
