<div class="app-main">
  <section class="tim28">
    <div class="tim29">
      <div style="background-image:url(<?php echo $admin[0]["background"]; ?>)" id="about" class="tim30"></div>
      <div id="portfolio" class="tim31">
        <div class="tim32">
          <div class="tim33">
            <img class="tim34" src="<?php echo $admin[0]["avatar"]; ?>" alt="" />
          </div>
          <div class="tim35">
            <div class="tim36">
              <h1 class="tim37">
                <?php
                  echo explode(" ", $admin[0]["name"])[count(explode(" ", $admin[0]["name"])) - 1];
                ?>
              </h1>
              <h3 class="tim38">
                <?php
                  echo $admin[0]["job"];
                ?>
              </h3>
              <h5 class="tim39">
              <i class="fas fa-map-marker-alt"></i>
              <?php
                echo $admin[0]["address"];
              ?>
              </h5>
            </div>
          </div>
          <div class="tim40">
            <ul class="tim41">
              <?php
                $socialMedia = queryManipulation("SELECT * FROM social_media", "get");
                if(count($socialMedia) > 0) {
                  foreach($socialMedia as $sm) {
                    echo '
                      <li class="tim42 tim44">
                        <a href="'.$sm["link"].'" target="_blank" rel="noopener noreferrer">
                          <i class="'.$sm["icon"].'"></i>
                        </a>
                        <span class="tim43 tim45"></span>
                      </li>
                    ';
                  }
                }
              ?>
            </ul>
          </div>
          <div class="tim46">
            <p class="tim47">
              <?php
                $getAbout = $admin[0]["about"];
                $regex="/[^\W ]+[^\s]+[.]+[^\" ]+[^\W ]+/i";
                $aboutMe = preg_replace("$regex", "<a class=tim48 href=\"http://\\0\" target=_blank>\\0</a>",$getAbout);
                echo $aboutMe;
              ?>
            </p>
          </div>
          <div class="tim49">
            <div class="tim50">
              <div class="tim51">
                <i class="smile far fa-smile"></i>
              </div>
              <div class="tim52">
                <h2 class="tim53">Hello World!</h2>
                <h5 class="tim54">
                  <?php 
                    foreach(explode(PHP_EOL, $admin[0]["introduce"]) as $content) {
                      echo $content."<br/>";
                    }
                  ?>
                </h5>
              </div>
              <div class="tim44 tim55">
                <button class="tim56">
                  <span class="tim57"><a href="./resources/Updated Resume.pdf" target="_blank" rel="noopener noreferrer">Updated Resume</a></span>
                  <span class="tim45 tim58"></span>
                </button>
              </div>
            </div>
            <div class="tim59">
              <div class="tim60">
                <div class="tim61">
                  <div class="tim62">
                    <i class="tim63 icon ion-md-code"></i>
                  </div>
                  <div class="tim64">
                    <h5 class="tim65">Programming Languages</h5>
                  </div>
                </div>
                <div class="tim66">
                  <ul class="tim67">
                    <?php
                      $programming = queryManipulation("SELECT * FROM skills WHERE type=?", "get", ["programming"]);
                      if(count($programming) > 0) {
                        foreach($programming as $program) {
                          echo '
                            <li class="tim68">
                              <i class="tim69 '.$program["icon"].'"></i>
                              <span class="tim70">'.$program["name"].'</span>
                            </li>
                          ';
                        }
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <div class="tim71">
                <div class="tim72">
                  <div class="tim73">
                    <i class="tim74 icon ion-md-hammer"></i>
                  </div>
                  <div class="tim75">
                    <h5 class="tim76">Tools and Frameworks</h5>
                  </div>
                </div>
                <div class="tim77">
                  <ul class="tim78">
                    <?php
                      $tools = queryManipulation("SELECT * FROM skills WHERE type=?", "get", ["tools"]);
                      if(count($tools) > 0) {
                        foreach($tools as $tool) {
                          echo '
                            <li class="tim79">
                              <i class="tim80 '.$tool["icon"].'"></i>
                              <span class="tim81">'.$tool["name"].'</span>
                            </li>
                          ';
                        }
                      }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="projects" class="tim117">
        <div class="tim118">
          <div class="tim119">
            <div class="tim120">
              <!-- ->128 -->
              <h2 class="tim121">
                Some of My Awesome Projects
              </h2>
              <h5 class="tim122">
                Personal Projects that I created on my free time.
              </h5>
            </div>
            <div class="tim123">
              <!-- ->144 -->
              <div class="tim124">
                <?php
                  $projects = queryManipulation("SELECT * FROM projects", "get");
                  if(count($projects) > 0) {
                    foreach($projects as $project) {
                      echo '
                        <div class="tim125">
                          <div class="tim126">
                            <a href="'.$project["link"].'" target="_blank">
                              <div class="tim127">
                                <img src="'.$project["thumbnail"].'" alt="">
                              </div>
                            </a>
                          </div>
                          <div class="tim128">
                            <div class="tim129">
                              <h4 class="tim130">'.$project["name"].'</h4>
                              <h5 class="tim131">'.$project["platform"].'</h5>
                            </div>
                            <div class="tim132">
                              <p class="tim133">'.$project["description"].'</p>
                            </div>
                          </div>
                        </div>
                      ';
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="partners" class="tim146">
        <div class="tim147">
          <div class="tim148">
            <div class="partner-heading">
              <h1 class="content-heading">Partners</h1>
            </div>
            <div class="tim149">
              <div class="glider-contain">
                <div class="glider">
                  <?php
                    $partners = queryManipulation("SELECT * FROM partners", "get");
                    if(count($partners) > 0) {
                      foreach($partners as $partner) {
                        echo '
                          <div class="tim150">
                            <div class="tim151">
                              <a class="tim152" href="'.$partner["link"].'" target="_blank" rel="noopener noreferrer">
                                <img class="tim153" src="'.$partner["logo"].'" alt=""/>
                              </a>
                            </div>
                            <div class="tim154">
                              <div class="tim155">
                                <div class="tim156">
                                  <h2 class="tim157">'.$partner["company"].'</h2>
                                </div>
                                <div class="tim158">
                                  <span class="tim159">'.$partner["description"].'</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        ';
                      }
                    }
                  ?>
                </div>
                <button aria-label="Previous" class="glider-prev">«</button>
                <button aria-label="Next" class="glider-next">»</button>
                <div role="tablist" class="dots"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="contact" class="tim82">
        <div class="tim83">
          <div class="tim84">
            <div class="tim85">
              <h2 class="tim86">Our Amazing Team</h2>
              <h5 class="tim87">
                Together, these guys make an awesome team.
              </h5>
            </div>
            <div class="tim88">
              <?php
                $team = queryManipulation("SELECT * FROM team", "get");
                if(count($team) > 0) {
                  foreach($team as $myteam) {
                    echo '
                      <div class="tim89">
                        <div class="tim90">
                          <img class="tim91" src="'.$myteam["avatar"].'" alt=""/>
                        </div>
                        <div class="tim92">
                          <div class="tim93">
                            <h4 class="tim94">'.$myteam["name"].'</h4>
                            <h6 class="tim95">'.$myteam["job"].'</h6>
                            <p class="tim96">'.$myteam["slogan"].'</p>
                          </div>
                        </div>
                      </div>
                    ';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
