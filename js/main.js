

const loginImg = document.querySelector(".login-img-container img");
loginImg.addEventListener("load", () => {
    // Use opacity as somr browsers will not attempt to load an image if display:none
    loginImg.style.opacity = "1";
    document.querySelector(".login-form-container").style.animation = "loginAnimation forwards 1.5s";

})
loginImg.src = "./assets/login-img.jpeg"; 

