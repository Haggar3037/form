let button = document.getElementById("openFormButton");
button.addEventListener("click", formEvent);
function formEvent(){
    $.fancybox.open('<div class="message"><h2>Hello!</h2><p>You are awesome!</p></div>');
}