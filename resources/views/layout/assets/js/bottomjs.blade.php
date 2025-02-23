
<script>
    if (window.location.href == window.location.origin + "/login") {
        window.apikey = null;
    }else{
        window.apikey = "{{session("access_token")}}";
    }


    const sidenav = document.getElementById("sidenav");
    const section_main_dashboard = document.getElementById("section-main-dashboard");
    const texticon = document.querySelectorAll(".text-icon");
    const btnicon = document.querySelectorAll(".btn-icon");
    const drawerid = ["employees", "head", "branch", "pdlmonitor"]
    const sidenav_triger_btn = document.getElementById("sidenav-triger-btn");

    document.addEventListener("DOMContentLoaded", () => {
        if(window.location.pathname.split("/").slice(3, 4).join("") == "head_employees"){
            document.getElementById("employees_button").click();
            document.getElementById("head_button").click();
        }
        else if(window.location.pathname.split("/").slice(3, 4).join("") == "branch_employees" || window.location.pathname.split("/").slice(2, 3).join("") == "branch_employees"){
            document.getElementById("employees_button").click();
            document.getElementById("branch_button").click();
        }
    });

    function sidenavdrawer(e, idtarget) {
        if (sidenav.classList.contains("w-16")) {
            sidenav_triger()
        }

        e.currentTarget.querySelector(".arrow-drawer").classList.toggle("rotate-90");
        document.getElementById(idtarget).classList.toggle("h-0");
        if (idtarget == "employees" || idtarget == "pdlmonitor") {
            document.getElementById(idtarget).classList.toggle("hidden");
        } else if (idtarget == "head") {
            document.getElementById(idtarget).classList.toggle("h-[11.2rem]");
        } else if (idtarget == "branch") {
            document.getElementById(idtarget).classList.toggle("h-[11.2rem]");
        }
    }

    function sidenav_triger() {
        if (section_main_dashboard != null) {
            section_main_dashboard.classList.toggle("xl:w-[57rem]");
            section_main_dashboard.classList.toggle("2xl:w-[65rem]");

        }
        sidenav_triger_btn.classList.toggle("rotate-180");
        sidenav.classList.toggle("w-56");
        sidenav.classList.toggle("w-16");

        drawerid.forEach((id) => {
            if (!document.getElementById(id).classList.contains("h-0")) {
                document.getElementById(id).classList.add("h-0")
                if (id == "employees" || id == "pdlmonitor") {
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
            text.classList.toggle("justify-center!");
        })
    }
</script>
