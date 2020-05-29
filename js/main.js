/*const loginImg = document.querySelector(".login-img-container img");
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

*/


//const progressBar = document.querySelector('.progress-done');
// Use set timeout to add an animation to it
setTimeout(() => {





window.onload = function() {
    if(document.querySelector(".general-container")) {
        fetchData();
        document.getElementById("in-prog").onclick = function () { inProgressSelected(); }
        document.getElementById("assigned").onclick = function () {
            assignedSelected();
        }
        document.getElementById("completed").onclick = function () {
            completedSelected();
        }
    }
    
};

function assignedSelected() {
    document.querySelector(".selected").classList.remove("selected");
    document.querySelector("#assigned").classList += "selected";
    var results = document.getElementsByClassName("course-container");
    if(results) {
        for(let i = 0;i < results.length; i++) {
            results[i].style.display = "flex";
        }
    }
}


function inProgressSelected() {
    document.querySelector(".selected").classList.remove("selected");
    document.querySelector("#in-prog").classList += "selected";
    var results = document.getElementsByClassName("course-container");
    if(results) {
        for(let i = 0;i < results.length; i++) {
            var dataDone = results[i].querySelector(".progress-done").getAttribute('data-done');
            console.log(dataDone);
            if(dataDone < 1 || dataDone > 99) {
                console.log("lmao");
                results[i].style.display = "none";
            } else {
                results[i].style.display = "flex";
            }
        }
    }
}

function completedSelected() {
    document.querySelector(".selected").classList.remove("selected");
    document.querySelector("#completed").classList += "selected";
    var results = document.getElementsByClassName("course-container");
    if(results) {
        for(let i = 0;i < results.length; i++) {
            var dataDone = results[i].querySelector(".progress-done").getAttribute('data-done');
            if(dataDone != 100) {
                results[i].style.display = "none";
            } else {
                results[i].style.display = "flex";
            }
        }
    }
}

//FOR REFERENCE
function loadProgressUnadapted() {
    const progressBar = document.querySelector('.progress-done');
    // Use set timeout to add an animation to it
    setTimeout(() => {
      
    // Set the width of the blue section to how much progress has been made
    progressBar.style.width = progressBar.getAttribute('data-done') + '%';
    progressBar.style.opacity = 1;
    // Set text above progress bar to the amount of progress made
    document.querySelector('#progress-amount').textContent = 'Progress: ' + progressBar.getAttribute('data-done') + '%';

    }, 200);
}

function loadProgress(progDone,progAmount) {
    // Use set timeout to add an animation to it
    setTimeout(() => {
    // Set the width of the blue section to how much progress has been made
    console.log(progDone);
    console.log(progDone.getAttribute('data-done'));
    progDone.style.width = progDone.getAttribute('data-done') + '%';
    progDone.style.opacity = 1;
    // Set text above progress bar to the amount of progress made
    progAmount.textContent = 'Progress: ' + progDone.getAttribute('data-done') + '%';
    }, 200);
}

function fetchData(category) {
    var url = "api.php?";
    if(arguments == 1) {
        for(var i = 0;i < category.length;i++) {
            category.replace(' ','_');
            category.replace('%20','_');
            
        }
        url += "?category="+category;
    }
    var results;
    var xml = new XMLHttpRequest();
    xml.open("GET",url,true);
    xml.responseType = 'json';
    xml.send();
    xml.onreadystatechange = () => {
        if(xml.readyState == 4 && xml.status == 200) {
            results = xml.response;
            console.log(results);
            generateResultDivs(results);
        }
    };
}



function generateResultDivs(result) {
    var generalContainer = document.querySelector(".general-container");
    if(result) {
        result.forEach(element => {
            var courseContainer = document.createElement("div");
            courseContainer.className = "course-container";
            generateResultImage(courseContainer,"assets/illustrations/course-images/GDPR.svg");
            generateCourseInfo(courseContainer,element);
            generalContainer.appendChild(courseContainer);
        });

        for(var i = 0;i < result.length;i++) {
            loadProgress(document.getElementsByClassName("progress-done")[i],document.getElementsByClassName("progress-amount")[i]);
        }
    }

}

function generateResultImage(div,imageSRC) {
    var image = document.createElement("img");
    image.src = imageSRC;
    div.appendChild(image);
}

function generateCourseInfo(div,result) {
    var courseInfo = document.createElement("div");
    courseInfo.className = "course-info";
    var heading = document.createElement("h3");
    heading.innerHTML = result.name;
    courseInfo.appendChild(heading);
    var progressContainer = document.createElement("div");
    var progressAmount = document.createElement("p");
    progressAmount.className = "progress-amount";
    progressContainer.appendChild(progressAmount);
    var progressBar = document.createElement("div");
    progressBar.className = "progress-bar";
    var progressDone = document.createElement("div");
    progressDone.className = "progress-done";
    var progressTesting = Math.floor((Math.random()*100)+1);
    if(progressTesting > 90) { progressTesting = 100; }
    progressDone.dataset.done = progressTesting;
    
    progressBar.appendChild(progressDone);
    progressContainer.appendChild(progressBar);
    courseInfo.appendChild(progressContainer);
    div.appendChild(courseInfo);
}

