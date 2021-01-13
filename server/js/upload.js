const avatar = document.querySelector(".profile-avatar");
const fieldAvatar = document.querySelector(".field-avatar");
const background = document.querySelector(".background");
const fieldBackground = document.querySelector(".field-background");
const name = document.querySelector("[name='admin-profile-name']");
const address = document.querySelector("[name='admin-profile-address']");
const intro = document.querySelector("[name='admin-profile-intro']");
const about = document.querySelector("[name='admin-profile-about']");
const phone = document.querySelector("[name='admin-profile-phone']");
const job = document.querySelector("[name='admin-profile-job']");

//avatar
var encodeAvatar = "";
fieldAvatar.addEventListener("change", function() {
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
      avatar.src = e.target.result;
      encodeAvatar = e.target.result;
    });
    reader.readAsDataURL(this.files[0]);
  }
});
//background
var encodeBackground = "";
fieldBackground.addEventListener("change", function() {
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
      background.style.backgroundImage = `url(${e.target.result})`;
      encodeBackground = e.target.result;
    });
    reader.readAsDataURL(this.files[0]);
  }
});
function changeProfile() {
  const getAvatar = encodeAvatar;
  const getBackground = encodeBackground;
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = "profile.php";
    }
  }
  xhr.open("POST", "./update/update_profile.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`changeProfile=&avatar=${encodeURIComponent(getAvatar)}&background=${encodeURIComponent(getBackground)}&name=${name.value.trim()}&address=${address.value.trim()}&about=${about.value.trim()}&intro=${intro.value.trim()}&phone=${phone.value.trim()}&job=${job.value.trim()}`);
}
