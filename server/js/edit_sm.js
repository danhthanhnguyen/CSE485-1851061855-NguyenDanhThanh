const name = document.querySelector("[name='sm-name']");
const icon = document.querySelector("[name='sm-icon']");
const id = document.querySelector("[name='sm-id']");
const link = document.querySelector("[name='sm-link']");
function setIcon() {
  icon.value = name.value;
}

function editSocialMedia() {
  if(link.value.trim() === "") {
    alert("Please fill out the fields!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = `../update/edit_sm.php?id=${id.value}`;
    }
  }
  xhr.open("POST", "../tasks/tasks_edit_sm.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`editSocialMedia=&id=${id.value}&name=${name.options[name.selectedIndex].text}&link=${link.value.trim()}&icon=${icon.value}`);
}
