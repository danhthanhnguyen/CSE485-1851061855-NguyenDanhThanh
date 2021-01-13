const fieldThumbnail = document.querySelector(".field-projects-thumbnail");
const thumbnail = document.querySelector(".projects-thumbnail");
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
      thumbnail.style.display = "block";
      thumbnail.src = e.target.result;
      encodeThumbnail = e.target.result;
    });
    reader.readAsDataURL(this.files[0]);
  }
});

function addProjects() {
  if(encodeThumbnail === "" || name.value.trim() === "" || platform.value === "" || link.value.trim() === "" || description.value.trim() === "") {
    alert("Please fill out the fields!");
    return;
  }
  if(createAt.value === "") {
    createAt.value = (new Date()).toJSON().slice(0, 10);//get date yyyy-mm-dd
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = "../projects.php";
      alert(this.responseText);
    }
  }
  xhr.open("POST", "../tasks/tasks_add_projects.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`addProjects=&thumbnail=${encodeURIComponent(encodeThumbnail)}&name=${name.value.trim()}&platform=${platform.value}&link=${link.value.trim()}&description=${description.value.trim()}&create=${createAt.value}`);
}