function setting_length_number(event, maxlength) {
    if (event.target.value.length > maxlength) {
        event.target.value = event.target.value.slice(0, maxlength);
    }

    if (event.target.value < 0) {
        event.target.value = 0;
    }
}

// function delay(ms) {
//     return new Promise((resolve) => setTimeout(resolve, ms));
// }

const AllInput = document.querySelectorAll("input");
const allFilteredFromOtherInput = document.querySelectorAll(
    ".filteredfromotherinput"
);
const filteredFromOtherInputFunc = [];
let iteration = 0;
allFilteredFromOtherInput.forEach(async (element) => {
    iteration++;
    const selectId = element.getAttribute("select-id");
    const options = document.getElementById(selectId).options;
    Array.from(options).forEach((option) => {
        filteredFromOtherInputFunc.push(option);
    });

    if (iteration === 1) {
        document.getElementById(
            selectId
        ).innerHTML = `<option value="">Select ${element.getAttribute(
            "placeholder"
        )}</option>`;
    }

    function change(target) {
        const dataFiltered = filteredFromOtherInputFunc.filter((item) => {
            const filteredAttr = item.getAttribute("filtered");
            if (filteredAttr == null) {
                return true;
            }
            return filteredAttr === target.value;
        });
        const selectElement = document.getElementById(selectId);
        const placeholderText =
            dataFiltered[0]?.textContent.split(" ")[1] || null;

        if (filteredFromOtherInputFunc.length <= 1) {
            selectElement.innerHTML = dataFiltered[0].outerHTML;
        } else if (dataFiltered.length <= 1 && placeholderText != null) {
            selectElement.innerHTML = `<option value="">Not Have ${placeholderText}</option>`;
        } else {
            selectElement.innerHTML = dataFiltered[0].outerHTML;
        }
        let dataIteration = 0;

        dataFiltered.forEach((item) => {
            console.log(item);
            dataIteration++;
            if (dataIteration !== 1) {
                selectElement.innerHTML += item.outerHTML;
            }
            if (dataIteration === dataFiltered.length) {
                dataIteration = 0;
            }
    });
    }

    // await delay(700);
    // if (document.getElementById(element.value)?.value != "") {
    //     change(document.getElementById(element.value))
    // }

    document
        .getElementById(element.value)
        .addEventListener("change", (event) => change(event.target));
    iteration = 0;
});

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

            img.src = URL.createObjectURL(inputfile);
            img.classList.remove("hidden");
            firstShowPreimage.classList.add("hidden");
        });

        const button = input.parentElement.closest("button");

        button.addEventListener("dragenter", (event) => {
            console.log("sdfsdf");
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
