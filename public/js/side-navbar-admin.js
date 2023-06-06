let menu = document.querySelector("#menu-icon");
let sidenavbar = document.querySelector(".side-navbar");
let content = document.querySelector(".content");

menu.onclick = () => {
    sidenavbar.classList.toggle("active");
    content.classList.toggle("active");
};

function menuBtnChange() {
    if (sidebar.classList.contains("active")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
}

function performSearch() {
    var searchInput = document.getElementById("search-input");
    var searchText = searchInput.value.toLowerCase();

    var eventNames = document.getElementsByClassName("event-name");

    for (var i = 0; i < eventNames.length; i++) {
        var eventName = eventNames[i].innerText.toLowerCase();

        if (eventName.includes(searchText)) {
            eventNames[i].parentNode.style.display = "block";
        } else {
            eventNames[i].parentNode.style.display = "none";
        }
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var dropdown = document.querySelector(".user-dropdown");
    var dropdownMenu = document.querySelector(".dropdown-menu");

    dropdown.addEventListener("click", function (event) {
        event.stopPropagation(); // Prevent event bubbling
        dropdownMenu.classList.toggle("show");
    });

    document.addEventListener("click", function (event) {
        if (!dropdown.contains(event.target)) {
            dropdownMenu.classList.remove("show");
        }
    });
});

// Function to handle the profile button click event
function handleProfileClick(event) {
    event.preventDefault(); // Prevent the default link behavior

    // Navigate to the profile page
    window.location.href = "/profile";
}

// Attach the event listener to the profile button
document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("profileButton")
        .addEventListener("click", handleProfileClick);
});

// Get references to the dashboard and create event section elements
const dashboardSection = document.getElementById("dashboard");
const createEventSection = document.getElementById("createEventSection");

// Function to handle the dashboard link click event
function handleDashboardClick() {
    dashboardSection.style.display = "block";
    createEventSection.style.display = "none";
}

// Function to handle the create event link click event
function handleCreateEventClick() {
    dashboardSection.style.display = "none";
    createEventSection.style.display = "block";
}

// Functino to toggle
function toggleTreeView(event) {
    const menu = event.currentTarget.nextElementSibling;
    menu.classList.toggle("collapsed");
}

// Attach event listeners to the dashboard and create event links
document
    .getElementById("dashboardLink")
    .addEventListener("click", handleDashboardClick);
document
    .getElementById("createEventLink")
    .addEventListener("click", handleCreateEventClick);

// Dropdown menu script for EVENTS
function toggleDropdown(event) {
    event.stopPropagation(); // Prevent event propagation to parent elements
    var dropdownMenu =
        event.currentTarget.parentElement.querySelector(".dropdown-menu");
    dropdownMenu.classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.addEventListener("click", function (event) {
    var dropdownButton = document.querySelector(".dropdown .side-link");
    var dropdownMenu = document.querySelector(".dropdown-menu");
    if (
        !event.target.matches(".dropdown .side-link") &&
        !event.target.matches(".dropdown-menu")
    ) {
        dropdownMenu.classList.remove("show");
    }
});