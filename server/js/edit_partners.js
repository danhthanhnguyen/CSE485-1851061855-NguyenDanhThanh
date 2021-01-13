//edit partners
const logo = document.querySelector(".logo-partners");
const fieldLogo = document.querySelector(".field-logo");
const id = document.querySelector("[name='partners-id']");
const company = document.querySelector("[name='partners-company']");
const email = document.querySelector("[name='partners-email']");
const field = document.querySelector("[name='partners-field']");
const headquarter = document.querySelector("[name='partners-headquarter']");
const link = document.querySelector("[name='partners-link']");
const description = document.querySelector("[name='partners-description']");
const createAt = document.querySelector("[name='partners-create']");

var encodeLogo = "";
fieldLogo.addEventListener("change", function() {
  if (this.files && this.files[0]) {
    if(this.files[0].type != "image/jpeg" && this.files[0].type != "image/jpg" && this.files[0].type != "image/png") {
      alert("Sorry, only JPG, JPEG & PNG files are allowed!");
      return false;
    }
    if(this.files[0].size > 2000000) {
      alert("Sorry, your file is too large!");
      return false;
    }
    var reader = new FileReader();
    reader.addEventListener("load", function (e) {
      logo.src = e.target.result;
      encodeLogo = e.target.result;
    });
    reader.readAsDataURL(this.files[0]);
  }
});

function editPartners() {
  if(company.value.trim() === "" || email.value.trim() === "" || link.value.trim() === "" || description.value.trim() === "" || headquarter.value.trim() === "") {
    alert("Please fill out the fields!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = `../update/edit_partners.php?id=${id.value}`;
    }
  }
  xhr.open("POST", "../tasks/tasks_edit_partners.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`editPartners=&id=${id.value}&logo=${encodeURIComponent(encodeLogo)}&company=${company.value.trim()}&email=${email.value.trim()}&link=${link.value.trim()}&description=${description.value.trim()}&headquarter=${headquarter.value.trim()}&field=${field.value}&create=${createAt.value}`);
}
