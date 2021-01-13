const name = document.querySelector("[name='sm-name']");
const icon = document.querySelector("[name='sm-icon']");
const link = document.querySelector("[name='sm-link']");
function setIcon() {
  icon.value = name.value;
}

function addSocialMedia() {
  if(link.value.trim() === "") {
    alert("Please fill out the fields!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = "../social_media.php";
      alert(this.responseText);
    }
  }
  xhr.open("POST", "../tasks/tasks_add_sm.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`addSocialMedia=&name=${name.options[name.selectedIndex].text}&link=${link.value.trim()}&icon=${icon.value}`);
}
