// async function check_auth() {
//     const linknow = window.location.hostname
//     const response = await fetch("/api/v1/user", {
//         method: "get",
//         headers: {
//             'Authorization': "Bearer {{ session('access_token') }}",
//             'Content-Type': "application/json",
//         }
//     });
//     const data = await response.json()
//     if (data.message == "Unauthenticated.") {
//         window.location.href = "/logout"
//     }
// }

// check_auth();
