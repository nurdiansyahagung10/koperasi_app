function setting_length_number(event, maxlength) {
    if (event.target.value.length > maxlength) {
        event.target.value = event.target.value.slice(0, maxlength);
    }

    if (event.target.value < 0) {
        event.target.value = 0;
    }
}

const AllInput = document.querySelectorAll("input");

AllInput.forEach((input) => {
    if (input.getAttribute("type") === "file") {
        const dragZones = new Map();

        input.addEventListener("change", (event) => {
            const inputname = event.target.name;
            const inputfile = event.target.files[0];
            const img = document.getElementById(inputname);
            const firstShowPreimage = event.target
                .closest("button")
                .querySelector(".first-show-previmage");

            console.log(event.target.files);
            img.src = URL.createObjectURL(inputfile);
            img.classList.remove("hidden");
            firstShowPreimage.classList.add("hidden");
        });

        const button = input.parentElement.closest("button");

        button.addEventListener("dragenter", (event) => {
            event.preventDefault();
            const secondShowPreimage = button.querySelector(
                ".second-show-previmage"
            );

            const currentDragZone = dragZones.get(button) || 0;
            dragZones.set(button, currentDragZone + 1);

            if (dragZones.get(button) > 0) {
                secondShowPreimage.classList.add("!visible", "!opacity-100");
            }
        });

        button.addEventListener("dragleave", (event) => {
            event.preventDefault();
            const secondShowPreimage = button.querySelector(
                ".second-show-previmage"
            );

            const currentDragZone = dragZones.get(button) || 0;
            dragZones.set(button, currentDragZone - 1);

            if (dragZones.get(button) === 0) {
                secondShowPreimage.classList.remove("!visible", "!opacity-100");
            }
        });

        button.addEventListener("dragover", (event) => {
            event.preventDefault();
        });

        button.addEventListener("drop", (event) => {
            event.preventDefault();
            const elementInput = button.querySelector("input[type='file']");
            const img = document.getElementById(elementInput.name);
            const firstShowPreimage = button.querySelector(
                ".first-show-previmage"
            );
            const secondShowPreimage = button.querySelector(
                ".second-show-previmage"
            );

            elementInput.files = event.dataTransfer.files;

            img.src = URL.createObjectURL(event.dataTransfer.files[0]);
            img.classList.remove("hidden");
            firstShowPreimage.classList.add("hidden");

            dragZones.set(button, 0);
            secondShowPreimage.classList.remove("!visible", "!opacity-100");
        });

        button.addEventListener("click", () => {
            input.click();
        });
    } else {
        if (input.getAttribute("maxlength") != "") {
            input.addEventListener("input", (event) => {
                setting_length_number(event, input.getAttribute("maxlength"));
            });
        }
        if (input.getAttribute("name") === "rt_and_rw") {
            const rt = document.getElementById("rt");
            const rw = document.getElementById("rw");
            let rtvalue = null;
            let rwvalue = null;
            const rt_and_rw = document.getElementById("rt_and_rw");
            const formpost = document.getElementById("formpost");

            formpost.addEventListener("submit", (event) => {
                event.preventDefault();
                rtvalue = rt.value;
                rwvalue = rw.value;
                rt_and_rw.value = rtvalue + "" + rwvalue;
                event.target.submit();
            });
        }
    }
});
