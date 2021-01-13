function login() {
  const email = document.querySelector(".email");
  const password = document.querySelector(".password");
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "Successfully") {
        window.location.href = "dashboard.php";
      } else {
        document.querySelector(".alert-danger").style.display = "block";
        document.querySelector(".alert-danger").textContent = this.responseText;
      }
    }
  };
  xhr.open("POST", "./validator/validator.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`admin=&email=${email.value.trim()}&password=${password.value}`);

  return false;
}

function verify() {
  const email = document.querySelector(".email-pass-reset");
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = "password_reset.php";
    }
  };
  xhr.open("POST", "./validator/reset.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`resetpass=&email=${email.value.trim()}`);

  return false;
}

function resetPassword() {
  const newPwd = document.querySelector(".pass-reset");
  const confirmPwd = document.querySelector(".confirmPass");
  if (
    newPwd.value.trim() !== confirmPwd.value.trim() ||
    newPwd.value.trim() === ""
  ) {
    alert("Password and confirm password does not match!");
    return;
  }
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      alert("Successfully!");
      window.location.href = "./index.php";
    }
  };
  xhr.open("POST", "./validator/change_pass.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(
    `changePassword=&newPass=${newPwd.value.trim()}&confirmPass=${confirmPwd.value.trim()}`
  );

  return false;
}

function deletePartners(target) {
  let conf = confirm("Do you want to delete it?");
  if(conf) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = "partners.php";
        alert(this.responseText);
      }
    };
    xhr.open("POST", "./update/delete_partners.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`deletePartners=&id=${target.value}`);
  }

  return false;
}

function deleteTeam(target) {
  let conf = confirm("Do you want to delete it?");
  if(conf) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = "team.php";
        alert(this.responseText);
      }
    };
    xhr.open("POST", "./update/delete_team.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`deleteTeam=&id=${target.value}`);
  }

  return false;
}

function deleteSkills(target) {
  let conf = confirm("Do you want to delete it?");
  if(conf) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = "skills.php";
        alert(this.responseText);
      }
    };
    xhr.open("POST", "./update/delete_skills.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`deleteSkills=&id=${target.value}`);
  }

  return false;
}

function deleteProjects(target) {
  let conf = confirm("Do you want to delete it?");
  if(conf) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = "projects.php";
        alert(this.responseText);
      }
    };
    xhr.open("POST", "./update/delete_projects.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`deleteProjects=&id=${target.value}`);
  }

  return false;
}

function deleteMedia(target) {
  let conf = confirm("Do you want to delete it?");
  if(conf) {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = "social_media.php";
        alert(this.responseText);
      }
    };
    xhr.open("POST", "./update/delete_sm.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(`deleteMedia=&id=${target.value}`);
  }

  return false;
}
