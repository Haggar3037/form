"use strict"

document.addEventListener('DOMContentLoaded', function () {
    let buttonOpen = document.querySelector(".js-open-form-button");
    buttonOpen.addEventListener("click", formEvent);

    function formEvent(){
        let formDiv = document.querySelector(".js-visibility");
        formDiv.classList.remove("invisible");
        let foneDark = document.querySelector(".js-dark");
        foneDark.classList.remove("invisible");
    };

    let buttonClose = document.querySelector(".js-close-form-button");
    buttonClose.addEventListener("click", formClose);

    function formClose(){
        let formDiv = document.querySelector(".js-visibility");
        formDiv.classList.add("invisible");
        let foneDark = document.querySelector(".js-dark");
        foneDark.classList.add("invisible");
    };
});
