import './bootstrap';
import * as te from "tw-elements";
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()



// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
  } else {
    document.documentElement.classList.remove('dark');
  };

  function setDarkTheme() {
    document.documentElement.classList.add("dark");
    localStorage.theme = "dark";
  };

  function setLightTheme() {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
  };

  function onThemeSwitcherItemClick(event) {
    const theme = event.target.dataset.theme;

    if (theme === "system") {
      localStorage.removeItem("theme");
      setSystemTheme();
    } else if (theme === "dark") {
      setDarkTheme();
    } else {
      setLightTheme();
    }
  };

  const themeSwitcherItems = document.querySelectorAll("#theme-switcher");
  themeSwitcherItems.forEach((item) => {
    item.addEventListener("click", onThemeSwitcherItemClick);
  });


  const sidenav2 = document.getElementById("sidenav-1");
const sidenavInstance2 = te.Sidenav.getInstance(sidenav2);

let innerWidth2 = null;

const setMode2 = (e) => {
  // Check necessary for Android devices
  if (window.innerWidth === innerWidth2) {
    return;
  }

  innerWidth2 = window.innerWidth;

  if (window.innerWidth < sidenavInstance2.getBreakpoint("xl")) {
    sidenavInstance2.changeMode("over");
    sidenavInstance2.hide();
  } else {
    sidenavInstance2.changeMode("side");
    sidenavInstance2.show();
  }
};

setMode2();

// Event listeners
window.addEventListener("resize", setMode2);
