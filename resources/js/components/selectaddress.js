import { fakedLogs } from "laravel-mix/src/Log";
import { AxiosGet } from "../package/table-package/fetch";
import { head_office } from "./selectoffice";

const province = document.getElementById("province");
const provincevalue = document.getElementById("provincevalue")?.value;
const city_or_regency = document.getElementById("city_or_regency");
const city_or_regencyvalue = document.getElementById(
    "city_or_regencyvalue"
)?.value;
const district = document.getElementById("district");
const districtvalue = document.getElementById("districtvalue")?.value;
const village = document.getElementById("village");
const villagevalue = document.getElementById("villagevalue")?.value;
const selectaddressfromvalue = document.getElementById(
    "selectaddressfromvalue"
)?.value;

async function get_province_data() {
    const data = await AxiosGet(
        `https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`,
        false
    );

    return data;
}

async function get_city_or_regency_data(province_id) {
    const data = await AxiosGet(
        `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province_id}.json`,
        false
    );
    return data;
}

async function get_district_data(city_id) {
    const data = await AxiosGet(
        `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${city_id}.json`,
        false
    );

    return data;
}

async function get_village_data(district_id) {
    const data = await AxiosGet(
        `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${district_id}.json`,
        false
    );

    return data;
}

async function get_province(selectedProvince = null) {
    province.innerHTML = `<option value="">Loading...</option>`;

    const data = await get_province_data();

    if (data.length != 0) {
        if (selectedProvince != null) {
            const selected = data.find(
                (item) => item.name === selectedProvince
            );

            if (selected) {
                province.innerHTML = `
                <option value="${selected.name}" data-id="${selected.id}">${selected.name}</option>`;
                city_or_regency &&
                    get_city_or_regency(selected.id, city_or_regencyvalue);
            }
        } else {
            province.innerHTML = `<option value="">Select Province</option>`;
            city_or_regency && get_city_or_regency(null);
        }

        data.forEach((item) => {
            if (item.name != selectedProvince) {
                province.innerHTML += `
                <option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
            }
        });
    } else {
        province.innerHTML = `
            <option value="">Cant Get Province</option>
        `;
        city_or_regency && get_city_or_regency(null);
    }
}

async function get_city_or_regency(
    province_id,
    selectedCity = null,
    getfromheadoffice = false
) {
    city_or_regency.innerHTML = `<option value="">Loading...</option>`;
    if (province_id == null) {
        if (getfromheadoffice) {
            city_or_regency.innerHTML = `
            <option value="">Select Head Office First</option>
        `;
        } else {
            city_or_regency.innerHTML = `
            <option value="">Select Province First</option>
        `;
        }
        district && get_district(null);
    } else {
        const data = await get_city_or_regency_data(province_id);

        if (data.length != 0) {
            if (selectedCity != null) {
                const selected = data.find(
                    (item) => item.name === selectedCity
                );

                if (selected) {
                    city_or_regency.innerHTML = `
                <option value="${selected.name}" data-id="${selected.id}">${selected.name}</option>`;
                    district && get_district(selected.id, districtvalue);
                } else {
                    city_or_regency.innerHTML = `<option value="">Select City Or Regency</option>`;
                    district && get_district(null);
                }
            } else {
                city_or_regency.innerHTML = `<option value="">Select City Or Regency</option>`;
                district && get_district(null);
            }

            data.forEach((item) => {
                if (item.name != selectedCity) {
                    city_or_regency.innerHTML += `
                <option value="${item.name}" data-id="${item.id}">${item.name}</option>
                `;
                }
            });
        } else {
            city_or_regency.innerHTML = `
            <option value="">Cant Get District</option>
        `;
            district && get_district(null);
        }
    }
}

async function get_district(city_id, selectedDistrict = null) {
    district.innerHTML = `<option value="">Loading...</option>`;

    if (city_id == null) {
        district.innerHTML = `
            <option value="">Select City Or Regency First</option>
        `;
        village && get_village(null);
    } else {
        const data = await get_district_data(city_id);
        if (data.length != 0) {
            if (selectedDistrict != null) {
                const selected = data.find(
                    (item) => item.name === selectedDistrict
                );

                if (selected) {
                    district.innerHTML = `
                <option value="${selected.name}" data-id="${selected.id}">${selected.name}</option>`;
                    village && get_village(selected.id, villagevalue);
                } else {
                    district.innerHTML = `<option value="">Select District</option>`;
                    village && get_village(null);
                }
            } else {
                district.innerHTML = `<option value="">Select District</option>`;
                village && get_village(null);
            }

            data.forEach((item) => {
                if (item.name != selectedDistrict) {
                    district.innerHTML += `
                <option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                }
            });
        } else {
            district.innerHTML = `
            <option value="">Cant Get District</option>
        `;
            village && get_village(null);
        }
    }
}

async function get_village(district_id, selectedVillage = null) {
    village.innerHTML = `<option value="">Loading...</option>`;

    if (district_id == null) {
        village.innerHTML = `
            <option value="">Select District First</option>
        `;
    } else {
        const data = await get_village_data(district_id);
        if (data.length != 0) {
            if (selectedVillage != null) {
                const selected = data.find(
                    (item) => item.name === selectedVillage
                );

                if (selected) {
                    village.innerHTML = `
                <option value="${selected.name}" data-id="${selected.id}">${selected.name}</option>`;
                } else {
                    village.innerHTML = `<option value="">Select Village</option>`;
                    village && get_village(null);
                }
            } else {
                village.innerHTML = `<option value="">Select Village</option>`;
            }

            data.forEach((item) => {
                if (item.name != selectedVillage) {
                    village.innerHTML += `
                <option value="${item.name}" data-id="${item.id}">${item.name}</option>                        `;
                }
            });
        } else {
            village.innerHTML = `
            <option value="">Cant Get Village</option>
        `;
        }
    }
}

province?.addEventListener("change", (event) => {
    get_city_or_regency(
        event.target.options[event.target.selectedIndex].getAttribute(
            "data-id"
        ),
        city_or_regencyvalue && city_or_regencyvalue
    );
});

city_or_regency?.addEventListener("change", (event) => {
    get_district(
        event.target.options[event.target.selectedIndex].getAttribute(
            "data-id"
        ),
        districtvalue && districtvalue
    );
});

district?.addEventListener("change", (event) => {
    get_village(
        event.target.options[event.target.selectedIndex].getAttribute(
            "data-id"
        ),
        villagevalue && villagevalue
    );
});

province && get_province(provincevalue && provincevalue);

if (!province) {
    async function updateselect(headoffice) {
        const data = await get_province_data();

        const selected = data.find(
            (item) =>
                item.name ===
                headoffice.options[headoffice.selectedIndex].textContent.trim()
        );

        if (selected) {
            city_or_regency &&
                get_city_or_regency(
                    selected.id,
                    city_or_regencyvalue && city_or_regencyvalue,
                    true
                );
        } else {
            city_or_regency &&
                get_city_or_regency(
                    null,
                    city_or_regencyvalue && city_or_regencyvalue,
                    true
                );
        }
    }

    updateselect(head_office);

    head_office.addEventListener("change", async (event) =>
        updateselect(event.target)
    );
}
