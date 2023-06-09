<?php

  if(isset($_POST['download'])) {
    $imgUrl = $_POST['imgurl']; // getting img url from hidden input
    $ch = curl_init($imgUrl); // initializing curl
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // it tranfers data as the return value of curl_exe rather than outputting
    // it directly
    $download = curl_exec($ch); // executing
    curl_close($ch);
    header('Content-type: image/jpg'); // setting content-type of header to image/jpg so we can get img in jpg not in base64 format
    header('Content-Disposition: attachment; filename="thumbnail.jpg"');
    echo $download;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Youtube Downloader</title>
    <link rel="shortcut icon" href="assets/favicon32x32.ico" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> <!-- submitting the form to the current page -->
      <img class="logo" src="assets/youtube-logo-atual.png" alt="logotipoyt" />
      <header>Download your image</header>
      <div class="url-paste">
        <span class="title">Paste ur url here: (only url's)</span>
        <div class="input-value">
          <input
            type="text"
            name="url"
            placeholder="https://www.youtube.com/something"
            required
          />
          <input class="hidden-input" type="hidden" name="imgurl" />
          <div class="separation"></div>
        </div>
      </div>
      <div class="preview-area">
        <img class="image" src="" alt="thumb" />
        <i class="icon uil uil-cloud-download"></i>
        <span>Paste video url to see preview here</span>
      </div>
      <button class="download-btn" name="download" type="submit">Download</button>
    </form>
    

    <footer>
      <p>&copy; Copyright 2023</p>
      <span>Inspired in <a href="https://www.codingnepalweb.com/">CodingNepal</a></span>
    </footer>

    <script src="app.js"></script>
  </body>
</html>
