const nameSkill = document.querySelector("[name='skills-name']");
const icon = document.querySelector("[name='skills-icon']");
const type = document.querySelector("[name='skills-type']");
function setIcon() {
  icon.value = nameSkill.value;
}

function addSkills() {
  if(nameSkill.options[nameSkill.selectedIndex].text === "" || type.value === "") {
    alert("Please fill out the fields!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = "../skills.php";
      alert(this.responseText);
    }
  }
  xhr.open("POST", "../tasks/tasks_add_skills.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`addSkills=&name=${nameSkill.options[nameSkill.selectedIndex].text}&type=${type.value}&icon=${icon.value}`);
}
