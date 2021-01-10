<nav id="sidebar" class="active">
  <div class="sidebar-header">
    <h5 class="admin">Admin</h5>
  </div>
  <ul class="list-unstyled components text-secondary">
    <li>
      <a href="<?php echo constant("URL")."/server/dashboard.php"; ?>"><i class="fas fa-home"></i>Dashboard</a>
    </li>
    <li>
      <a href="<?php echo constant("URL")."/server/partners.php"; ?>"><i class="fas fa-handshake"></i>Partners</a>
    </li>
    <li>
      <a href="<?php echo constant("URL")."/server/team.php"; ?>"><i class="fas fa-user-friends"></i>Team</a>
    </li>
    <li>
      <a href="<?php echo constant("URL")."/server/skills.php"; ?>"><i class="fas fa-code-branch"></i>Skills</a>
    </li>
    <li>
      <a href="<?php echo constant("URL")."/server/projects.php"; ?>"><i class="fab fa-app-store-ios"></i>Projects</a>
    </li>
    <li>
      <a href="<?php echo constant("URL")."/server/social_media.php"; ?>"><i class="fas fa-globe-americas"></i>Social Media</a>
    </li>
    <li>
      <a
        href="#pagesmenu"
        data-toggle="collapse"
        aria-expanded="false"
        class="dropdown-toggle no-caret-down"
        ><i class="fas fa-copy"></i>Pages</a
      >
      <ul class="collapse list-unstyled" id="pagesmenu">
        <li>
          <a href="<?php echo constant("URL"); ?>" target="_blank"><i class="fas fa-file"></i>CV page</a>
        </li>
        <li>
          <a href="<?php echo constant("URL")."/404.php"; ?>" target="_blank"><i class="fas fa-info-circle"></i>404 Error page</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>