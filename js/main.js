const loginImg = document.querySelector(".login-img-container img");
if (loginImg) {
    loginImg.addEventListener("load", () => {
        // Use opacity as some browsers will not attempt to load an image if display:none
        loginImg.style.opacity = "1";
        document.querySelector(".user-form-container").style.animationPlayState = "running";
    })
}

//textBoxName = id of text box to toggle
function togglePasswordVisibility(textBoxID) {
    var textBox = document.querySelector("#" + textBoxID);
    if (textBox.type === 'text') {
        textBox.type = 'password';
    } else {
        textBox.type = 'text';
    }
}

//Onloads

var slideNum;
var slides;
var dots;

window.onload = function() {
    if(document.querySelector(".welcome-body") !== null) {
        slideNum = 0;
        slides = document.getElementsByClassName("welcome-slide");
        dots = document.getElementsByClassName("welcome-dot");
        dots[0].onclick = function() { changeSlide(0); }
        dots[1].onclick = function() { changeSlide(1); }
        dots[2].onclick = function() { changeSlide(2); }
        slideShow();
    }
    if(document.querySelector(".general-container")) {
        fetchData();
        document.getElementById("in-prog").onclick = function () { inProgressSelected(); }
        document.getElementById("assigned").onclick = function () { assignedSelected(); }
        document.getElementById("completed").onclick = function () {completedSelected();}
    }
};

function slideShow() {

    slideNum++;
    if(slideNum == slides.length) {
        slideNum = 0;
    }
    for(var i = 0;i < slides.length;i++) {
        slides[i].style.display = "none";
    }
    slides[slideNum].style.display = "flex";


    for(var j = 0;j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" welcome-dot-selected","");
    }
    dots[slideNum].className += " welcome-dot-selected";
    var viewCourseHref = document.getElementById("view-course").href;
    var hiddenHrefText = slides[slideNum].getElementsByClassName("welcome-hidden-href")[0].textContent;
    viewCourseHref = hiddenHrefText;
    setTimeout(slideShow,5000);
}

function changeSlide(id) {
    for(var i = 0;i < slides.length;i++) {
        slides[i].style.display = "none";
    }
    slides[id].style.display = "flex";
    for(var j = 0;j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" welcome-dot-selected","");
    }
    dots[id].className += " welcome-dot-selected";
    var viewCourseHref = document.getElementById("view-course").href;
    var hiddenHrefText = slides[id].getElementsByClassName("welcome-hidden-href")[0].textContent;
    viewCourseHref = hiddenHrefText;
    slideNum = id;
}
// Hamburger menu 

/*const menuControl = e => {

    const overlay = document.querySelector('.hamburger-menu');
    const overlayChildren = document.querySelector('.hamburger-menu>*');
    if (e.target.id === 'open-menu') {
        overlay.style.transform = 'translateX(0)';
        overlayChildren.style.opacity = 1;

    } else {
        overlay.style.transform = 'translateX(-100%)';

        overlayChildren.style.opacity = 0;
    }
}

//document.querySelector('#close-menu').addEventListener("click", menuControl);
//document.querySelector('#open-menu').addEventListener("click", menuControl);

// Progress Bar Concept - will be adapted when the courses are created dynamically


//const progressBar = document.querySelector('.progress-done');
// Use set timeout to add an animation to it
setTimeout(() => {
    // Set the width of the blue section to how much progress has been made
    progressBar.style.width = progressBar.getAttribute('data-done') + '%';
    progressBar.style.opacity = 1;
    // Set text above progress bar to the amount of progress made
    document.querySelector('#progress-amount').textContent = 'Progress: ' + progressBar.getAttribute('data-done') + '%';
}, 200)*/