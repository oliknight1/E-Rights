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

*/



function slideShow() {

    slideNum++;
    if (slideNum == slides.length) {
        slideNum = 0;
    }
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideNum].style.display = "flex";


    for (var j = 0; j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" welcome-dot-selected", "");
    }
    dots[slideNum].className += " welcome-dot-selected";
    var viewCourseHref = document.getElementById("view-course").href;
    var hiddenHrefText = slides[slideNum].getElementsByClassName("welcome-hidden-href")[0].textContent;
    viewCourseHref = hiddenHrefText;
    setTimeout(slideShow, 5000);
}

function changeSlide(id) {
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[id].style.display = "flex";
    for (var j = 0; j < dots.length; j++) {
        dots[j].className = dots[j].className.replace(" welcome-dot-selected", "");
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


var slideNum;
var slides;
var dots;
var request = new XMLHttpRequest();
request.open("GET", "learning-data.json", false);
request.send(null);
var learningJson = JSON.parse(request.responseText);
var currentLearningSlide = 0;
var allAssigned = [];
var allInProg = [];
var currentAssigned = 0;
var currentInProg = 0;



window.onload = function () {
    if (document.querySelector(".my-learning")) {
        fetchData();

        document.getElementById("in-prog").onclick = function () {
            inProgressSelected();
        }
        document.getElementById("assigned").onclick = function () {
            assignedSelected();
        }
        document.getElementById("completed").onclick = function () {
            completedSelected();

        }

    } else if (document.querySelector(".home-wrapper") || document.querySelector(".all-courses-page")) {
        fetchData();

    } else if (document.querySelector(".welcome-body")) {
        slideNum = 0;
        slides = document.getElementsByClassName("welcome-slide");
        dots = document.getElementsByClassName("welcome-dot");
        dots[0].onclick = function () {
            changeSlide(0);

        }
        dots[1].onclick = function () {
            changeSlide(1);
        }
        dots[2].onclick = function () {
            changeSlide(2);
        }
        slideShow();
    } else if (document.querySelector(".learning-container")) {
        displayLearning(0);
        document.querySelector(".learning-button-left").onclick = function () {
            learningButtons(-1);
        }
        document.querySelector(".learning-button-right").onclick = function () {
            learningButtons(1);
        }
    } else if (document.querySelector(".all-courses-page")) {
        if (screen.width <= 768) {
            modifyMobileCourseView();
        }

    }

};


function learningButtons(change) {
    var url = window.location;
    var max = 7;
    if (url.search) {
        var GETRequest = url.search.substr(13);
        if (GETRequest == "principles") {
            max = 5;
        }
    } else {
        window.location.replace("http://ok131.brighton.domains/ci536/site/e-rights/404.html");
    }
    if (currentLearningSlide + change >= 0 && currentLearningSlide + change <= max) {
        currentLearningSlide += change;
        displayLearning(currentLearningSlide);
    }
}

function displayLearning(learningSlideNum) {
    var url = window.location;
    if (url.search) {
        var GETRequest = url.search.substr(6);
        if (GETRequest == "GDPR%20rights") {
            fillLearningContent(learningJson.rights[learningSlideNum], "The Rights");
        } else if (GETRequest == "GDPR%20principles") {
            fillLearningContent(learningJson.principles[learningSlideNum], "The Principles");
        } else {
            window.location.replace("http://ok131.brighton.domains/ci536/site/e-rights/404.html");
        }
    } else {
        window.location.replace("http://ok131.brighton.domains/ci536/site/e-rights/404.html");
    }
}

function fillLearningContent(JSONContentObject, title) {
    document.querySelector(".learning-titles-container").querySelector("h1").innerHTML = title;
    document.querySelector(".learning-titles-container").querySelector("h2").innerHTML = JSONContentObject.name;
    if (document.querySelector(".learning-text").querySelector("p")) {
        document.querySelector(".learning-text").removeChild(document.querySelector(".learning-text").querySelector("p"));
    }
    var content = document.createElement("p");
    content.innerHTML = JSONContentObject.content;
    document.querySelector(".learning-text").appendChild(content);
    if (JSONContentObject.list) {
        var newList = document.createElement("ol");
        for (var i = 0; i < JSONContentObject.list.length; i++) {
            var newListObject = document.createElement("li");
            newListObject.innerHTML = JSONContentObject.list[i];
            newList.appendChild(newListObject);
        }
        document.querySelector(".learning-text").appendChild(newList);
    } else {
        if (document.querySelector(".learning-text").querySelector("ol")) {
            var elementToRemove = document.querySelector(".learning-text").querySelector("ol");
            document.querySelector(".learning-text").removeChild(elementToRemove);
        }
    }
    document.querySelector(".learning-image").querySelector("img").src = "assets/learning-img/" + JSONContentObject.img;
}



function modifyMobileCourseView() {
    var allGeneralContainers = document.getElementsByClassName("general-container");
    var allAssignedCourseContainers = allGeneralContainers[0].getElementsByClassName("course-container");
    currentAssigned = 0;
    if (allAssignedCourseContainers) {
        for (var i = 0; i < allAssignedCourseContainers.length; i++) {
            allAssigned[i] = allAssignedCourseContainers[i];
        }
    }
    currentInProg = 0;
    var allInProgCourseContainers = allGeneralContainers[1];
    if (allInProgCourseContainers) {
        for (var i = 0; i < allInProgCourseContainers.length; i++) {
            allInProg[i] = allInProgCourseContainers[i];
        }
    }
    var leftButton1 = document.createElement("BUTTON");
    var rightButton1 = document.createElement("BUTTON");
    leftButton1.innerHTML = "<-";
    rightButton1.innerHTML = "->";
    leftButton1.onclick = function () {
        scrollLeft("assigned");
    }
    rightButton1.onclick = function () {
        scrollRight("assigned");
    }
    leftButton1.classList.add("scroll-left-button");
    rightButton1.classList.add("scroll-right-button");
    allGeneralContainers[0].appendChild(leftButton1);
    allGeneralContainers[0].appendChild(rightButton1);
    var leftButton2 = document.createElement("BUTTON");
    var rightButton2 = document.createElement("BUTTON");
    leftButton2.innerHTML = "<-";
    rightButton2.innerHTML = "->";
    leftButton2.onclick = function () {
        scrollLeft("inprog");
    }
    rightButton2.onclick = function () {
        scrollRight("inprof");
    }
    leftButton2.classList.add("scroll-left-button");
    rightButton2.classList.add("scroll-right-button");
    allGeneralContainers[1].appendChild(leftButton2);
    allGeneralContainers[1].appendChild(rightButton2);
    initialiseMobileContainer(allAssigned);
    initialiseMobileContainer(allInProg);
}

function scrollLeft(section) {
    var allContainers;
    var containerNum;
    if (section == "assigned") {
        allContainers = allAssigned;
        containerNum = currentAssigned;
    } else {
        allContainers = allInProg;
        containerNum = currentInProg;
    }
    if (containerNum === 1) {
        clearAllContainers(allContainers);
        containerNum = 0;
        allContainers[0].style.display = "flex";
        allContainers[1].style.display = "flex";
    } else if (containerNum > 1) {
        clearAllContainers(allContainers);
        containerNum -= 2;
        allContainers[containerNum].style.display = "flex";
        allContainers[containerNum + 1].style.display = "flex";
    }
    if (section == "assigned") {
        currentAssigned = containerNum;
    } else {
        currentInProg = containerNum;
    }
}

function scrollRight(section) {
    var allContainers;
    var containerNum;
    if (section == "assigned") {
        allContainers = allAssigned;
        containerNum = currentAssigned;
    } else {
        allContainers = allInProg;
        containerNum = currentInProg;
    }
    if (containerNum + 3 === allContainers.length) {
        clearAllContainers(allContainers);
        containerNum++;
        allContainers[containerNum].style.display = "flex";
        allContainers[containerNum + 1].style.display = "flex";
    } else if (containerNum + 3 < allContainers.length) {
        clearAllContainers(allContainers);
        containerNum += 2;
        allContainers[containerNum].style.display = "flex";
        allContainers[containerNum].style.display = "flex";
    }
    if (section == "assigned") {
        currentAssigned = containerNum;
    } else {
        currentInProg = containerNum;
    }
}

function initialiseMobileContainer(containers) {
    clearAllContainers(containers);
    if (containers.length > 0) {
        containers[0].style.display = "flex";
    }
    if (containers.length > 1) {
        containers[1].style.display = "flex";
    }
}

function clearAllContainers(containers) {
    for (var i = 0; i < containers.length; i++) {
        containers[i].style.display = "none";
    }
}

function assignedSelected() {
    document.querySelector(".selected").classList.remove("selected");
    document.querySelector("#assigned").classList += "selected";
    var results = document.getElementsByClassName("course-container");
    if (results) {
        for (let i = 0; i < results.length; i++) {
            results[i].style.display = "flex";
        }
    }
}


function inProgressSelected() {
    document.querySelector(".selected").classList.remove("selected");
    document.querySelector("#in-prog").classList += "selected";
    var results = document.getElementsByClassName("course-container");
    if (results) {
        for (let i = 0; i < results.length; i++) {
            var dataDone = results[i].querySelector(".progress-done").getAttribute('data-done');
            if (dataDone < 1 || dataDone > 99) {

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

    if (results) {
        for (let i = 0; i < results.length; i++) {
            var dataDone = results[i].querySelector(".progress-done").getAttribute('data-done');
            if (dataDone != 100) {
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

function loadProgress(progDone, progAmount) {
    // Use set timeout to add an animation to it
    setTimeout(() => {
        // Set the width of the blue section to how much progress has been made


        progDone.style.width = progDone.getAttribute('data-done') + '%';
        progDone.style.opacity = 1;
        // Set text above progress bar to the amount of progress made
        progAmount.textContent = 'Progress: ' + progDone.getAttribute('data-done') + '%';
    }, 200);
}

function fetchData(category) {
    var url = "api.php?";
    if (arguments == 1) {
        for (var i = 0; i < category.length; i++) {
            category.replace(' ', '_');
            category.replace('%20', '_');

        }
        url += "?category=" + category;
    }
    var results;
    var xml = new XMLHttpRequest();
    xml.open("GET", url, true);
    xml.responseType = 'json';
    xml.send();
    xml.onreadystatechange = () => {
        if (xml.readyState == 4 && xml.status == 200) {
            results = xml.response;

            generateResultDivs(results);
        }
    };
}



function generateResultDivs(result) {
    var generalContainer = document.querySelectorAll(".general-container");
    if (result) {
        generalContainer.forEach(cont => {
            result.forEach(element => {
                var courseLink = document.createElement("a");
                var courseContainer = document.createElement("div");
                courseLink.href = "course-overview.php?name=" + element.name;
                courseContainer.className = "course-container";
                generateResultImage(courseContainer, element);
                generateCourseInfo(courseContainer, element);
                courseLink.appendChild(courseContainer);
                cont.appendChild(courseLink);

            });
        })

        for (var i = 0; i < result.length; i++) {
            loadProgress(document.getElementsByClassName("progress-done")[i], document.getElementsByClassName("progress-amount")[i]);
        }
    }
}

function generateResultImage(div, element) {
    var image = document.createElement("img");
    image.src = "assets/illustrations/course-images/" + element.img;
    image.style.background = element.colour
    div.appendChild(image);
}

function generateCourseInfo(div, result) {
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
    var progressTesting = Math.floor((Math.random() * 100) + 1);
    progressDone.dataset.done = progressTesting;
    progressBar.appendChild(progressDone);
    progressContainer.appendChild(progressBar);
    courseInfo.appendChild(progressContainer);
    div.appendChild(courseInfo);
}