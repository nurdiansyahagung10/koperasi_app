<div class="relative">
    <button onclick="sidenav_triger()" id="sidenav-triger-btn"
        class="aboslute w-6 z-10 right-0 mt-[4.8rem] translate-x-3 shadow-lg rotate-180 flex items-center justify-center h-6 rounded-full bg-white absolute">
        <i class='bx bxs-chevron-right'></i></button>
    <nav id="sidenav"
        class="bg-black flex flex-col text-white overflow-y-scroll hide-scrollbar relative  h-full w-56 rounded-xl ">
        <div class="p-3 pt-10 w-full flex ">
            <span class=" font-semibold">kopsi</span>
        </div>
        <div class="flex flex-1 flex-col gap-10 px-3 justify-between">

            <div class="flex pt-8 flex-col ">
                <div class="border-b-neutral-800 py-2 flex flex-col gap-3 border-b">
                    <button class="flex gap-2 w-full btn-icon py-1  px-2 rounded-xl items-center bg-white text-black">
                        <span class="text-xl">
                            <i class='bx bx-home'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Home</span>
                    </button>
                </div>
                <div class="py-2 flex flex-col gap-3 border-b-neutral-800 border-b">

                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bxs-user-detail'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">roles</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-user'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Users</span>
                    </button>
                </div>
                <div class="py-2 flex flex-col gap-3 border-b-neutral-800 border-b">

                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-buildings'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Head Branch</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-building'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Office Branch</span>
                    </button>
                </div>
                <div class="py-2 flex flex-col gap-3 border-b-neutral-800 border-b">

                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-user-check'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Member</span>
                    </button>
                    <button onclick="sidenavdrawer(event, 'employes')"
                        class="flex items-center btn-icon py-1 justify-between px-2 rounded-xl ">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">
                                <i class='bx bx-universal-access'></i>
                            </span>
                            <span class="text-icon whitespace-nowrap">Employees</span>
                        </div>
                        <span class="-rotate-90 arrow-drawer text-icon"><i class='bx bx-chevron-left'></i></span>
                    </button>
                    <div id="employes" class="h-0 mb-3 overflow-hidden hidden">
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button onclick="sidenavdrawer(event, 'head')"
                                class="flex justify-between border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Head</span>
                                <span class="-rotate-90 arrow-drawer"><i class='bx bx-chevron-left'></i></span>
                            </button>
                        </div>
                        <div id="head" class="overflow-hidden h-0">
                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Head Leader</span>
                                </button>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Coordinator</span>

                                </button>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Cashier</span>
                                </button>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Recap</span>
                                </button>
                            </div>

                        </div>
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button onclick="sidenavdrawer(event, 'branch')"
                                class="flex justify-between border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Branch</span>
                                <span class="-rotate-90 arrow-drawer"><i class='bx bx-chevron-left'></i></span>

                            </button>
                        </div>
                        <div id="branch" class="overflow-hidden h-0">

                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Cashier</span>
                                </button>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Recap</span>
                                </button>
                            </div>
                            <div class=" flex flex-col ms-[2rem]">
                                <button
                                    class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                    <span>Pdl</span>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="py-2 flex flex-col gap-3 border-b-neutral-800 border-b">

                    <button onclick="sidenavdrawer(event, 'pdlmonitor')"
                        class="flex items-center btn-icon py-1 justify-between px-2 rounded-xl ">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">
                                <i class='bx bx-desktop'></i>
                            </span>
                            <span class="text-icon whitespace-nowrap">Pdl Monitor</span>
                        </div>
                        <span class="-rotate-90 arrow-drawer text-icon"><i class='bx bx-chevron-left'></i></span>
                    </button>

                    <div id="pdlmonitor" class="h-0 overflow-hidden hidden">
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button
                                class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Cash Monitor</span>
                            </button>
                        </div>
                        <div class=" flex flex-col ms-[1.15rem]">
                            <button
                                class="flex  border-l py-2.5 relative items-center before:bg-white before:left-0 before:w-3 before:h-[0.05rem] before:absolute gap-2 ps-5 pe-2 ">
                                <span>Target Monitor</span>
                            </button>
                        </div>

                    </div>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-repeat'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Cash Deposite</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-food-menu'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Advance Payment</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-money-withdraw'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Dropping</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-credit-card-front'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Storting</span>
                    </button>
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-layer-plus'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Payment Deposite</span>
                    </button>
                </div>
                <div class="py-2 flex flex-col gap-3 ">
                    <button class="flex gap-2 py-1  px-2 btn-icon rounded-xl items-center ">
                        <span class="text-xl">
                            <i class='bx bx-package'></i>
                        </span>
                        <span class="text-icon whitespace-nowrap">Inventaris</span>
                    </button>
                </div>
            </div>

            <div class="py-2 flex flex-col gap-3 ">
                <button class="flex gap-2 py-1 btn-icon px-2 btn-icon rounded-xl items-center ">
                    <span class="text-xl">
                        <i class='bx bx-cog'></i>
                    </span>
                    <span class="text-icon whitespace-nowrap">Settings</span>
                </button>
            </div>
        </div>

    </nav>
</div>

<script>

    const sidenav = document.getElementById("sidenav");
    const texticon = document.querySelectorAll(".text-icon");
    const btnicon = document.querySelectorAll(".btn-icon");
    const drawerid = ["employes", "head", "branch", "pdlmonitor"]
    const sidenav_triger_btn = document.getElementById("sidenav-triger-btn");

    function sidenavdrawer(e, idtarget) {
        if (sidenav.classList.contains("w-16")) {
            sidenav_triger()
        }

        e.currentTarget.querySelector(".arrow-drawer").classList.toggle("rotate-90");
        document.getElementById(idtarget).classList.toggle("h-0");
        if (idtarget == "employes" || idtarget == "pdlmonitor") {
            document.getElementById(idtarget).classList.toggle("hidden");
        }
        else if (idtarget == "head") {
            document.getElementById(idtarget).classList.toggle("h-[11.2rem]");
        } else if (idtarget == "branch") {
            document.getElementById(idtarget).classList.toggle("h-[8.2rem]");
        }
    }

    function sidenav_triger() {
        sidenav_triger_btn.classList.toggle("rotate-180");
        sidenav.classList.toggle("w-56");
        sidenav.classList.toggle("w-16");

        drawerid.forEach((id) => {
            if (!document.getElementById(id).classList.contains("h-0")) {
                document.getElementById(id).classList.add("h-0")
                if (id == "employes" || id == "pdlmonitor") {
                    document.getElementById(id).classList.add("hidden")
                }

            }

            document.querySelectorAll(".arrow-drawer").forEach((e) => {
                e.classList.remove("rotate-90");
            })

            document.getElementById(id).classList.remove("h-[11.2rem]")
            document.getElementById(id).classList.remove("h-[8.2rem]")
        })


        texticon.forEach((text) => {
            text.classList.toggle("hidden");
        })
        btnicon.forEach((text) => {
            text.classList.toggle("!justify-center");
        })
    }
</script>
