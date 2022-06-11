"use strict"

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);

    function formClose(){
        let formDiv = document.querySelector(".js-visibility");
        formDiv.classList.add("invisible");
        let foneDark = document.querySelector(".js-dark");
        foneDark.classList.add("invisible");

    };

    function waitingStart(){
        form.classList.add('js-sending');
    }
    function waitingStop(){
        form.classList.remove('js-sending');
    }
    

    async function formSend(e) {
        e.preventDefault();

        let error = formValidate(form);

        let formData = new FormData(form); 
        if (error === 0) {
            waitingStart();
            let response = await fetch('send-mail.php', {
                method: 'POST',
                body: formData
            }); 
            if (response.ok){
                let result = await response.json();
                console.log(result.message);
                setTimeout(formClose, 2000);
                setTimeout(waitingStop, 1500);
            } else {
                waitingStop();
            }
        } 
    };

    function formValidate(form) {
        let error = 0; 
        let formRequired = document.querySelectorAll(".js-formRequired");

        for (let i = 0; i < formRequired.length; i++){
            const input = formRequired[i];
            formRemoveError(input);
            if(input.value == ''){
                formAddError(input);
                error++
            } else if (input.classList.contains("phone-form")) {

                if (input.value.length != 16) {
                    formAddError(input);
                    error++
                }
            }
        }
        return error;
    };

    function formAddError(input){
        input.classList.add('error')
    };

    function formRemoveError(input){
        input.classList.remove('error')
    };
});