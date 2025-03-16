const city_or_regency = document.getElementById("city_or_regency");
const district = document.getElementById("district");
const village = document.getElementById("village");

async function get_province() {


    province.innerHTML = `
            <option value="">Loading...</option>
        `;

    const response = await fetch(
        `https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`);
    const data = await response.json();

    if (data.length != 0) {

        province.innerHTML = `
                  <option value="">Select Province</option>
                `;

        data.forEach(item => {

            province.innerHTML +=
                `
                <option value="${item.name}" data-id="${item.id}">${item.name}</option>                            `;


        });
    } else {
        province.innerHTML = `
                <option value="">Cant Get Province Data</option>
            `;
    }
    get_city_or_regency("");

}





async function get_city_or_regency(province_id) {

    city_or_regency.innerHTML = `
            <option value="">Loading...</option>
        `;

    if (province_id == "") {
        city_or_regency.innerHTML = `
            <option value="">Select Province First</option>
        `;

    } else {
        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province_id}.json`);
        const data = await response.json();

        if (data.length != 0) {

            city_or_regency.innerHTML = `
                  <option value="">Select City Or Regency</option>
                `;

            data.forEach(item => {

                city_or_regency.innerHTML += `
            <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                    `;


            });

        } else {
            city_or_regency.innerHTML = `
                <option value="">Not Have City Or Regency</option>
            `;

        }

    }
    get_district("");
}

async function get_district(city_or_regency_id) {


    district.innerHTML = `
            <option value="">Loading...</option>
        `;

    if (city_or_regency_id == "") {
        district.innerHTML = `
            <option value="">Select City Or Regency First</option>
        `;

    } else {
        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${city_or_regency_id}.json`);
        const data = await response.json();
        if (data.length != 0) {

            district.innerHTML = `
                  <option value="">Select District</option>
                `;

            data.forEach(item => {

                district.innerHTML += `
            <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                    `;


            });

        } else {
            district.innerHTML = `
                <option value="">Not Have District</option>
            `;

        }


    }
    get_village("");
}


async function get_village(district_id) {

    village.innerHTML = `
            <option value="">Loading...</option>
        `;

    if (district_id == "") {
        village.innerHTML = `
            <option value="">Select City Or Regency First</option>
        `;
    } else {
        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${district_id}.json`);
        const data = await response.json();

        if (data.length != 0) {

            village.innerHTML = `
                  <option value="">Select Village</option>
                `;

            data.forEach(item => {

                village.innerHTML += `
            <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                    `;

            });

        } else {
            village.innerHTML = `
                <option value="">Not Have Village</option>
            `;

        }

    }


}

province.addEventListener("change", (event) => {
    get_city_or_regency(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
})

city_or_regency.addEventListener("change", (event) => {

    get_district(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
})

district.addEventListener("change", (event) => {
    get_village(event.target.options[event.target.selectedIndex].getAttribute("data-id"));
})

get_province();

