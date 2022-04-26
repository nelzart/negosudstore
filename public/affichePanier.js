
let checkout = document.getElementById("checkout");
let checdiv = document.getElementById("chec-div");
let flag3 = false;
const checkoutHandler = () => {
    if (!flag3) {
        checkout.classList.remove("translate-x-0");
        checkout.classList.add("translate-x-full");
        setTimeout(function () {
            checdiv.classList.add("hidden");
        }, 1000);
        flag3 = true;
        } else {
        setTimeout(function () {
            checkout.classList.add("translate-x-0");
            checkout.classList.remove("translate-x-full");
        }, 1000);
        checdiv.classList.remove("hidden");
        flag3 = false;
    }
};



// let checkFilter = document.getElementById("checkout");
// let filterDiv = document.getElementById("chec-div");
// let flag4 = false;
// const checkoutFilter = () => {
//     if (!flag4) {
//         checkFilter.classList.remove("translate-x-0");
//         checkFilter.classList.add("translate-x-full");
//         setTimeout(function () {
//             filterDiv.classList.add("hidden");
//         }, 1000);
//         flag4 = true;
//         } else {
//         setTimeout(function () {
//             checkFilter.classList.add("translate-x-0");
//             checkFilter.classList.remove("translate-x-full");
//         }, 1000);
//         filterDiv.classList.remove("hidden");
//         flag4 = false;
//     }
// };