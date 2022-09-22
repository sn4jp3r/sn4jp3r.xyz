const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () => {
  sidebar.classList.toggle("close");
})

// modeSwitch.addEventListener("click" , () => {
//     body.classList.toggle("dark");
    
//     if(body.classList.contains("dark")){
//         modeText.innerText = "Light mode";

//     }else{
//         modeText.innerText = "Dark mode";  
//     }
// });

let darkMode = localStorage.getItem("toggle-switch");
const darkModeToggle = document.querySelector("#toggle-switch");

const disableDarkMode = () => {
  document.body.classList.remove("dark");
  localStorage.setItem("darkMode", null);
  modeText.innerText = "Light mode";
};

const enableDarkMode = () => {
  document.body.classList.add("dark");
  localStorage.setItem("darkMode", "enabled");
  modeText.innerText = "Dark mode"; 
};

if(darkMode === "enabled"){
  enableDarkMode();
}

darkModeToggle.addEventListener("click", () => {
  darkMode = localStorage.getItem("darkMode");
  if (darkMode !== "enabled"){
    enableDarkMode();
    console.log(darkMode);
  } else {
    disableDarkMode();
    console.log(darkMode);
  }
});