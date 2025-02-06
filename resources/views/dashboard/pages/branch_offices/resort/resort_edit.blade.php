@extends('dashboard.layout.templatedashboard')

@section('dashboardmain')
    <section id="section-roles-dashboard " class="flex-1">
        <div class="w-full  flex h-full justify-center items-center">

            <form method="POST" id="formpost" class="w-full flex flex-col gap-4 mt-2.5 " action="{{ route('resort.update', ["branch_id"=> $branch_id,"selectresort"=> $resort->id]) }}">
                <h2 class="text-lg font-semibold">Add Resort Data</h2>

                @csrf
                @method("PUT")

                @if ($errors->any())
                    <div class="mb-8 flex flex-col gap-4 right-0 bottom-0 mr-8 absolute">
                        @foreach ($errors->all() as $error)
                            <div id="mainalert-{{ $loop->iteration }}"
                                class=" border shadow-lg  flex gap-4 items-center min-w-72 max-w-96    bg-white px-4  py-3 rounded-lg"
                                role="alert">
                                <div class="flex w-full items-center gap-2 "><span class="text-red-500"><i
                                            class="fa-light fa-circle-xmark"></i></span><span>{{ $error }}</span>
                                </div>
                                <button onclick="alert(event,'mainalert-{{ $loop->iteration }}')" id="hidealert" class=" top-0 bottom-0 right-0 ">
                                    <i class="fa-duotone fa-light fa-xmark"></i> </button>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Pdl<span
                                    class="text-red-600">*</span></label>
                            <select name="pdl_id" id="pdl"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                @if ($resort->pdl_id)
                                <option value="{{ $resort->pdl_id }}">{{ $resort->pdl_id->pdl_name }}</option>
                                @else
                                    
                                <option value="">Select Pdl</option>
                                    
                                @endif
                                @foreach ($pdl as $item)
                                    <option value="{{ $item->id }}">{{ $item->pdl_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="branch_id" required value="{{$branch_id}}">
                <div class="grid grid-cols-1 gap-4">
                    <div class="button  bg-white border flex items-center px-4 py-1.5 rounded-xl ">
                        <div class="flex flex-col w-full">
                            <label class="text-xs text-gray-500 whitespace-nowrap">Resort Number<span
                                    class="text-red-600">*</span></label>
                            <select name="resort_number" id="resort_number"
                                class="w-full outline-hidden -translate-x-1 text-sm border-none shadow-none ">
                                <option value="{{ $resort->resort_number }}">{{ $resort->resort_number }}</option>
                                @foreach ($resortnumber as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
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
