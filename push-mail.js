"use strict"

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();

        let error = formValidate(form);

        let formData = new FormData(form);
        

        if (error === 0) {
            form.classList.add('js-sending');
            let response = await fetch('push-mail.php', {
                metod: 'POST',
                body: formData
            }); 
            if (response.ok){
                let result = await response.json();
                alert(result.message);
                form.classList.remove('js-sending');
            } else {
                alert ("Ошибка");
                form.classList.remove('js-sending');
            }
            setTimeout(form.classList.remove('js-sending'), 1000);
        } else {
            alert("Все поля обязательны для заполнения");
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
                if (input.value.length != 17) {
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