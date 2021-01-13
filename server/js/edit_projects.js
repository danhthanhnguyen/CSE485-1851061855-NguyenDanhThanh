//edit partners
const thumbnail = document.querySelector(".thumbnail-projects");
const fieldThumbnail = document.querySelector(".field-thumbnail");
const id = document.querySelector("[name='projects-id']");
const name = document.querySelector("[name='projects-name']");
const platform = document.querySelector("[name='projects-platform']");
const link = document.querySelector("[name='projects-link']");
const description = document.querySelector("[name='projects-description']");
const createAt = document.querySelector("[name='projects-create']");

var encodeThumbnail = "";
fieldThumbnail.addEventListener("change", function() {
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
      thumbnail.src = e.target.result;
      encodeThumbnail = e.target.result;
    });
    reader.readAsDataURL(this.files[0]);
  }
});

function editProjects() {
  if(name.value.trim() === "" || link.value.trim() === "" || description.value.trim() === "") {
    alert("Please fill out the fields!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = `../update/edit_projects.php?id=${id.value}`;
    }
  }
  xhr.open("POST", "../tasks/tasks_edit_projects.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`editProjects=&id=${id.value}&thumbnail=${encodeURIComponent(encodeThumbnail)}&name=${name.value.trim()}&link=${link.value.trim()}&description=${description.value.trim()}&platform=${platform.value}&create=${createAt.value}`);
}
