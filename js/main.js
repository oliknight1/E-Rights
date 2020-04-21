
const loginImg = document.querySelector(".login-img-container img");
loginImg.addEventListener("load", () => {
    // Use opacity as somr browsers will not attempt to load an image if display:none
    loginImg.style.opacity = "1";
    document.querySelector(".user-form-container").style.animation = "loginAnimation forwards 1.5s";


})
loginImg.src = "./assets/login-img.jpeg";

//textBoxName = id of text box to toggle
function togglePasswordVisibility(textBoxID) {
    var textBox = document.querySelector("#"+textBoxID); 
    if(textBox.type === 'text') {
        textBox.type = 'password';
    } else {
        textBox.type = 'text';
    }
}
