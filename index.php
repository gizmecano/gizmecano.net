<?php
/* Implement system functions */
require_once 'system/functions.php';
/* Decode Composer variables */
$composer = json_decode(file_get_contents('composer.json'), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $composer['description']; ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php foreach ($composer['authors'] as $authorship) { ?>
    <meta name="author" content="<?php echo $authorship['name']; ?>">
  <?php } ?>
  <!-- Schema.org item properties -->
  <meta itemprop="name" content="<?php echo $composer['description']; ?>">
  <meta itemprop="description" content="A showcase built to present side projects and experiments in the web design field">
  <meta itemprop="image" content="<?php echo $composer['homepage']; ?>design/screenshot.jpg">
  <!-- OpenGraph properties -->
  <meta property="og:locale" content="fr_CH">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $composer['homepage']; ?>">
  <meta property="og:title" content="<?php echo $composer['description']; ?>">
  <meta property="og:description" content="A showcase built to present side projects and experiments in the web design field">
  <meta property="og:site_name" content="<?php echo $composer['description']; ?>">
  <meta property="og:image" content="<?php echo $composer['homepage']; ?>design/screenshot.jpg">
  <!-- Twitter names -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@gizmecano">
  <meta name="twitter:creator" content="@gizmecano">
  <!-- Implement stylesheets for assets -->
  <link rel="stylesheet" href="asset/raster/raster.css?version=20">
  <link rel="stylesheet" href="asset/inter/inter.css?version=3.19">
  <!-- Implement custom stylesheet -->
  <link rel="stylesheet" href="design/polarsken.css?version=<?php echo $composer['version']; ?>">
  <!-- Display shortcut favicon -->
  <link rel="shortcut icon" sizes="196x196" href="design/favicon-196.png">
  <link rel="icon" type="image/png" sizes="196x196" href="design/favicon-196.png">
</head>

<body>
  <r-grid columns="8">

    <r-cell span="3-6" span-s="row">
      <?php
      $path = 'matter/static/incipit.md';
      echo gzm_text($path);
      unset($path);
      ?>
    </r-cell>

    <?php
    foreach (glob('matter/casual/*', GLOB_ONLYDIR) as $folder) {
      $input = json_decode(file_get_contents($folder . '/data.json'), true);
      $image = glob($folder . '/shot.{jpg,png}', GLOB_BRACE);
    ?>
      <r-cell span="4" span-s="row">
        <h2><a href="<?php echo $input['link']; ?>"><?php echo $input['name']; ?></a></h2>
        <img class="h-16 top cover" width="100%" src="<?php echo $image[0]; ?>" alt="<?php echo $input['name']; ?>">
        <?php echo gzm_text($folder . '/text.md'); ?>
      </r-cell>
    <?php
      unset($image, $input);
    }
    unset($folder);
    ?>

    <r-cell span="3-6" span-s="row">
      <?php
      $path = 'matter/static/credits.md';
      echo gzm_text($path);
      unset($path);
      ?>
    </r-cell>

    <r-cell span="3-6" span-s="row">
      <?php
      $path = 'matter/static/imprint.md';
      echo gzm_text($path);
      unset($path);
      ?>
    </r-cell>

  </r-grid>
</body>

</html>
