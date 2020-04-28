//textBoxName = id of text box to toggle
function togglePasswordVisibility(textBoxID) {
    var textBox = document.querySelector("#"+textBoxID); 
    if(textBox.type === 'text') {
        textBox.type = 'password';
    } else {
        textBox.type = 'text';
    }
}

var slideNum = 0;
slideShow();

function slideShow() {
    slideNum++;
    console.log(slideNum);
    var slides = document.getElementsByClassName("welcome-slide");
    if(slideNum == slides.length) {
        slideNum = 0;
    }
    for(var i = 0;i < slides.length;i++) {
        slides[i].style.display = "none";
    }
    slides[slideNum].style.display = "flex";
    setTimeout(slideShow,5000);
}

