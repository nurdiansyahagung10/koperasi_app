<div class="relative">
    <button onclick="sidenav_triger()" id="sidenav-triger-btn"
        class="aboslute w-6 z-10 right-0 mt-[4.8rem] translate-x-3 shadow-lg rotate-180 flex items-center justify-center h-6 rounded-full bg-black text-white absolute">
        <i class="text-xs fa-regular fa-angle-right"></i></button>
    <nav id="sidenav"
        class="bg-gray-100 flex flex-col text-black overflow-y-scroll hide-scrollbar relative  h-full w-56 rounded-xl ">
        <div class="p-3 pt-10 w-full flex ">
            <span class=" font-semibold">kopsi</span>
        </div>
        <div class="flex flex-1 flex-col gap-10 px-3 justify-between">

            <div class="flex pt-8 flex-col ">
                <div class="border-gray-200 py-2 flex flex-col gap-3 border-b">
                    <a href="{{ route('home') }}"
                        class="flex gap-2 w-full btn-icon py-1  px-2 rounded-xl items-center  @if (url()->current() == url('/')) bg-white border text-black @endif ">
                        <span class="">
                            <i class=" fa-light fa-house-blank"></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Home</span>
                    </a>
                </div>
                <div class="py-2 flex flex-col gap-3 border-gray-200 border-b">
                    <a href="{{ route('roles') }}"
                        class="flex gap-2 py-1 @if (url()->current() == url('/roles') ||
                                implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/permissions')) bg-white border text-black @endif  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-user-tie"></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">roles</span>
                    </a>
                    <a href="{{ route('users') }}"
                        class="flex gap-2 py-1 @if (url()->current() == url('/users')) bg-white border text-black @endif  px-2 btn-icon rounded-xl items-center ">

                        <span class="">
                            <i class=" fa-light fa-user"></i> </span>
                        <span class="text-icon whitespace-nowrap">Users</span>
                    </a>
                </div>
                <div class="py-2 flex flex-col gap-3 border-gray-200 border-b">

                    <a href="{{ route('head_offices') }}"
                        class="flex gap-2 py-1 @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_offices')) bg-white border text-black @endif  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-buildings"></i> </span>
                        <span class="text-icon whitespace-nowrap">Head Office</span>
                    </a>
                    <a href="{{ route('branch_offices') }}"
                        class="flex gap-2 py-1 @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/branch_offices')) bg-white border text-black @endif  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-building"></i> </span>
                        <span class="text-icon whitespace-nowrap">Branch Office</span>
                    </a>
                </div>
                <div class="py-2 flex flex-col gap-3 border-gray-200 border-b">

                    <a href="{{ route('members') }}"
                        class="flex gap-2 py-1 @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/members')) bg-white border text-black @endif  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-user-check"></i> </span>
                        <span class="text-icon whitespace-nowrap">Members</span>
                    </a>
                    <button id="employees_button" onclick="sidenavdrawer(event, 'employees')"
                        class="flex cursor-pointer @if (implode('/', array_slice(explode('/', url()->current()), 4, 1)) == 'employees') bg-white border text-black @endif  items-center btn-icon py-1 justify-between px-2 rounded-xl ">
                        <div class=" flex items-center gap-2">
                            <span class="">
                                <i class=" fa-light fa-user-group"></i>
                            </span>
                            <span class="text-icon whitespace-nowrap">Employees</span>
                        </div>
                        <span class="-rotate-90 arrow-drawer text-icon"><i
                                class="text-xs fa-regular fa-angle-left"></i></span>
                    </button>
                    <div id="employees" class="h-0 cursor-pointer mb-3 overflow-hidden hidden">
                        <div class="  flex flex-col ms-[1.15rem]">
                            <button id="head_button" onclick="sidenavdrawer(event, 'head')"
                                class="flex cursor-pointer justify-between border-l @if (implode('/', array_slice(explode('/', url()->current()), 4, 2)) == 'employees/head_employees') !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 4, 2)) == 'employees/branch_employees') !border-black @endif  border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Head</span>
                                <span class="-rotate-90 arrow-drawer"><i
                                        class="text-xs fa-regular fa-angle-left"></i></span>
                            </button>
                        </div>
                        <div id="head" class="overflow-hidden h-0">
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('head_employees', ['role' => 'head_leaders']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_leaders')) !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/coordinator') ||
                                            implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_cashier') ||
                                            implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_recap')) !border-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Head Leader</span>
                                </a>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('head_employees', ['role' => 'coordinator']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/coordinator')) !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_cashier') ||
                                            implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_recap')) !border-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Coordinator</span>

                                </a>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('head_employees', ['role' => 'head_cashier']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_cashier')) !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_recap')) !border-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Cashier</span>
                                </a>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('head_employees', ['role' => 'head_recap']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/head_recap')) !border-black before:!bg-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Recap</span>
                                </a>
                            </div>

                        </div>
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button id="branch_button" onclick="sidenavdrawer(event, 'branch')"
                                class="flex cursor-pointer justify-between border-l @if (implode('/', array_slice(explode('/', url()->current()), 4, 2)) == 'employees/branch_employees' ||
                                        implode('/', array_slice(explode('/', url()->current()), 4, 1)) == 'branch_employees') !border-black before:!bg-black @endif  border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Branch</span>
                                <span class="-rotate-90 arrow-drawer"><i
                                        class="text-xs fa-regular fa-angle-left"></i></span>

                            </button>
                        </div>
                        <div id="branch" class="overflow-hidden h-0">

                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('branch_employees', ['role' => 'manager']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/manager')) !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/branch_cashier') ||
                                            implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/branch_recap') ||
                                            implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/pdls')) !border-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Manager</span>
                                </a>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('branch_employees', ['role' => 'branch_cashier']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/branch_cashier')) !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/branch_recap') ||
                                            implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/pdls')) !border-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Cashier</span>
                                </a>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('branch_employees', ['role' => 'branch_recap']) }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/branch_recap')) !border-black before:!bg-black @elseif (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/pdls')) !border-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Recap</span>
                                </a>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <a href="{{ route('pdls') }}"
                                    class="flex  border-l @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/pdls')) !border-black before:!bg-black @endif border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Pdl</span>
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="py-2 flex flex-col gap-3 border-gray-200 border-b">

                    <button onclick="sidenavdrawer(event, 'pdlmonitor')"
                        class="flex items-center btn-icon py-1 justify-between px-2 rounded-xl ">
                        <div class="flex items-center gap-2">
                            <span class="">
                                <i class=" fa-light fa-desktop"></i>
                            </span>
                            <span class="text-icon whitespace-nowrap">Pdl Monitor</span>
                        </div>
                        <span class="-rotate-90 arrow-drawer text-icon"><i
                                class="text-xs fa-regular fa-angle-left"></i></span>
                    </button>

                    <div id="pdlmonitor" class="h-0 overflow-hidden hidden">
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button
                                class="flex  border-l border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Cash Monitor</span>
                            </button>
                        </div>
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button
                                class="flex  border-l border-stone-300 py-2.5 relative items-center before:bg-stone-300 before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Target Monitor</span>
                            </button>
                        </div>

                    </div>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-money-bill-transfer"></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Cash Deposite</span>
                    </button>
                    <a href="{{ route('advance_payments') }}"
                        class="flex gap-2 py-1 @if (implode('/', array_slice(explode('/', url()->current()), 0, 4)) == url('/advance_payments')) bg-white border text-black @endif  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-rectangle-history-circle-user"></i> </span>
                        <span class="text-icon whitespace-nowrap">Advance Payment</span>
                    </a>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-money-simple-from-bracket"></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Dropping</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-credit-card-front"></i> </span>
                        <span class="text-icon whitespace-nowrap">Storting</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-vault"></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Payment Deposite</span>
                    </button>
                </div>
                <div class="py-2 flex flex-col gap-3 ">
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="">
                            <i class=" fa-light fa-boxes-stacked"></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Inventory</span>
                    </button>
                </div>
            </div>

            <div class="py-2 flex flex-col gap-3 ">
                <button class="flex gap-2 py-1 btn-icon px-2 btn-icon rounded-xl items-center ">
                    <span class="">
                        <i class=" fa-light fa-gear"></i> </span>
                    <span class="text-icon whitespace-nowrap">Settings</span>
                </button>
            </div>
        </div>

    </nav>
</div>
