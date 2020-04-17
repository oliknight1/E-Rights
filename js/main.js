document.body.classList.add('js-loading'); //Tells the body that something is currently loading
let loginWrapper = document.querySelector(".login-wrapper");
loginWrapper.style.backgroundImage = "linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../assets/login-img.jpeg')";

let bgImg = document.createElement("img");
bgImg.style.display = 'none';
bgImg.src = 'https://picsum.photos/536/354'
document.body.appendChild(bgImg); //load random image so that background image is definitely loaded first

bgImg.addEventListener("load", () => {
    document.body.classList.remove('js-loading'); //once random image is loaded, it tells the body it's done loading things
})
