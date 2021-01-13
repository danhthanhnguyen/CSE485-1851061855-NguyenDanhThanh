const sidebarCollapse = document.querySelector("#sidebarCollapse");
const sidebar = document.querySelector("#sidebar");
const body = document.querySelector("#body");
sidebarCollapse.addEventListener("click", function () {
  sidebar.classList.toggle("active");
  body.classList.toggle("active");
});
