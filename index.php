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

  <!-- Implement stylesheets for assets -->
  <link rel="stylesheet" href="asset/raster/raster.css?version=20">
  <link rel="stylesheet" href="asset/inter/inter.css?version=3.15">
  <!-- Implement custom stylesheet -->
  <link rel="stylesheet" href="design/polarsken.css?version=<?php echo $composer['version']; ?>">
</head>

<body>
  <r-grid columns="8">

    <r-cell span="3-6" span-s="row">
      <?php
      $path = 'matter/static/header.md';
      echo gzm_text($path);
      unset($path);
      ?>
    </r-cell>

    <r-cell span="3-6" span-s="row">
      <?php
      $path = 'matter/static/footer.md';
      echo gzm_text($path);
      unset($path);
      ?>
    </r-cell>

  </r-grid>
</body>

</html>
