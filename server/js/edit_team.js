
const avatar = document.querySelector(".avatar-team");
const fieldAvatar = document.querySelector(".field-avatar");
const id = document.querySelector("[name='team-id']");
const name = document.querySelector("[name='team-name']");
const job = document.querySelector("[name='team-job']");
const slogan = document.querySelector("[name='team-slogan']");

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

function editTeam() {
  if(name.value.trim() === "" || slogan.value.trim() === "") {
    alert("Please fill out the fields!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = `../update/edit_team.php?id=${id.value}`;
    }
  }
  xhr.open("POST", "../tasks/tasks_edit_team.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`editTeam=&id=${id.value}&avatar=${encodeURIComponent(encodeAvatar)}&name=${name.value.trim()}&job=${job.value}&slogan=${slogan.value.trim()}`);
}