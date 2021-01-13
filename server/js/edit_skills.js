const nameSkill = document.querySelector("[name='skills-name']");
const id = document.querySelector("[name='skills-id']");
const icon = document.querySelector("[name='skills-icon']");
const type = document.querySelector("[name='skills-type']");
function setIcon() {
  icon.value = nameSkill.value;
}

function editSkills() {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      window.location.href = `../update/edit_skills.php?id=${id.value}`;
    }
  }
  xhr.open("POST", "../tasks/tasks_edit_skills.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`editSkills=&id=${id.value}&name=${nameSkill.options[nameSkill.selectedIndex].text}&type=${type.value}&icon=${icon.value}`);
}
