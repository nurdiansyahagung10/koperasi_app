import axios from "axios";

const ApiKey = window.apikey;

console.log(ApiKey);

const AxiosGet = async (apiurl, withtoken = true) => {
    let Headers = null;
    if (withtoken) {
        Headers = {
            "Content-Type": "application/json",
            Authorization: `Bearer ${ApiKey}`,
        };
    } else {
        Headers = {
            "Content-Type": "application/json",
        };
    }
    return await axios
        .get(apiurl, {
            headers: Headers,
        })
        .then((response) => {
            return response.data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};

const AxiosPost = async (apiurl, body_value) => {
    return await axios
        .post(apiurl, JSON.stringify(body_value), {
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${ApiKey}`,
            },
        })
        .then((response) => {
            return response.data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};

const AxiosPut = async (apiurl, body_value) => {
    return await axios
        .put(apiurl, JSON.stringify(body_value), {
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${ApiKey}`,
            },
        })
        .then((response) => {
            return response.data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};

const AxiosDelete = async (apiurl) => {
    return await axios
        .delete(apiurl, {
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${ApiKey}`,
            },
        })
        .then((response) => {
            return response.data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
};

export { AxiosGet, AxiosPost, AxiosPut, AxiosDelete };
