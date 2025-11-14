import { addNewOpening } from "./openings.js";

// mobile menu calls through burger menu
$(".menu").click(() => {
    $(".header-nav").toggleClass("hidden");
    $("header").toggleClass("hidden");
});

function hideMessage() {
    $(".info, .error").hide();
}

setTimeout(hideMessage, 5000);
addNewOpening();