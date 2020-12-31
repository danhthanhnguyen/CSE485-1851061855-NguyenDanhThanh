<div class="app-header">
  <div class="tim1">
    <div class="tim2">
      <button class="tim3 tim17">
        <span class="tim4">
          <?php
            echo explode(" ", $admin[0]["name"])[count(explode(" ", $admin[0]["name"])) - 1];
          ?>
        </span>
        <span class="tim5 tim18"></span>
      </button>
    </div>
    <div class="tim20">
      <div class="tim6">
        <nav class="tim7">
          <ul class="tim8">
            <li class="tim9 tim17">
              <a class="scroll" href="#about">
                <span class="tim10">About</span>
                <span class="tim11 tim18"></span>
              </a>
            </li>
            <li class="tim9 tim17">
              <a class="scroll" href="#portfolio">
                <span class="tim10">Portfolio</span>
                <span class="tim11 tim18"></span>
              </a>
            </li>
            <li class="tim9 tim17">
              <a class="scroll" href="#projects">
                <span class="tim10">Projects</span>
                <span class="tim11 tim18"></span>
              </a>
            </li>
            <li class="tim9 tim17">
              <a class="scroll" href="#partners">
                <span class="tim10">Partners</span>
                <span class="tim11 tim18"></span>
              </a>
            </li>
            <li class="tim9 tim17">
              <a class="scroll" href="#contact">
                <span class="tim10">Contact</span>
                <span class="tim11 tim18"></span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="tim14">
        <nav class="tim15">
          <ul class="tim16">
            <?php
              $socialMedia = queryManipulation("SELECT * FROM social_media", "get");
              if(count($socialMedia) > 0) {
                foreach($socialMedia as $sm) {
                  echo '
                    <li class="tim12 tim17">
                      <a href="'.$sm["link"].'" target="_blank" rel="noopener noreferrer">
                        <i class="'.$sm["icon"].'"></i>
                      </a>
                      <span class="tim13 tim18"></span>
                    </li>
                  ';
                }
              }
            ?>
          </ul>
        </nav>
      </div>
    </div>
    <div class="tim21">
      <div class="tim22">
        <div class="tim23"></div>
        <div class="tim24"></div>
      </div>
    </div>
  </div>
</div>