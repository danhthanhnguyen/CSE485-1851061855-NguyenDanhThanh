<?php
  include("./server/config/path.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page not found</title>
  <link rel="icon" href="./public/favicon.ico"/> <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <style>
    @font-face {
      src: url("./fonts/cubano-regular-webfont.ttf");
      font-family: "cubano-regular";
    }
    @font-face {
      src: url("./fonts/sofiapro-light.otf");
      font-family: "sofia-pro";
    }
    .page-not-found {
      text-align: center;
    }
    .page-not-found .content h1 {
      font-family: 'cubano-regular';
      font-size: 3rem;
    }
    .page-not-found .content h5 {
      font-family: 'cubano-regular';
      font-size: 1.4rem;
    }
    .page-not-found .content p {
      font-family: 'sofia-pro';
    }
    .page-not-found .go-back a {
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="page-not-found">
    <div class="content">
      <h1>404</h1>
      <h5>Page not found.</h5>
      <p class="qoutes">We couldn't find what you were looking for!</p>
    </div>
    <div class="go-back">
      <a href="<?php echo constant("URL"); ?>">Go to the front page!</a>
    </div>
  </div>
</body>
</html>