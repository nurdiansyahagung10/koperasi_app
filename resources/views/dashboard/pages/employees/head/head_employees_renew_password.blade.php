@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        @include('dashboard.layout.errors_notification')

        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" enctype="multipart/form-data" class="w-full flex flex-col gap-4 mt-2.5 "
                action="{{ route('head_employee.renew_password', ["role" => $role,"id" => $head_employee->id]) }}">
                <h2 class="text-lg font-semibold">Add Head Office Data</h2>
                @csrf
                @method("PUT")
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">New Password<span
                                class="text-red-600">*</span></label>
                        <input type="password" required name="password" id="password"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>
                <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                    <div class="flex flex-col w-full">
                        <label class=" text-xs text-gray-500 whitespace-nowrap">Password Confirmation<span
                                class="text-red-600">*</span></label>
                        <input type="password" required name="password_confirmation" id="password_confirmation"
                            class="w-full outline-hidden  text-sm border-none shadow-none ">
                        </input>
                    </div>
                </div>



                <button class="px-4 py-2.5 bg-black text-white rounded-xl w-full">Submit</button>
            </form>
        </div>
    </section>
    <script>
       

        function alert(e, id) {
            e.preventDefault();
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
