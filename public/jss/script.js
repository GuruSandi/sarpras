// const hamBurger = document.querySelector(".toggle-btn");

// hamBurger.addEventListener("click", function () {
//   document.querySelector("#sidebar").classList.toggle("expand");
// });
const hamBurger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");

hamBurger.addEventListener("click", function () {
  sidebar.classList.toggle("expand");
});

// Saat logo di-klik, tambahkan kelas "expand" ke sidebar
document.querySelector(".sidebar-logo a").addEventListener("click", function () {
  sidebar.classList.add("expand");
});


