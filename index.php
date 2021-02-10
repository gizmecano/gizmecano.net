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

    <?php
    foreach (glob('matter/casual/*', GLOB_ONLYDIR) as $folder) {
      $input = json_decode(file_get_contents($folder . '/data.json'), true);
      $image = glob($folder . '/shot.{jpg,png}', GLOB_BRACE);
    ?>
      <r-cell span="4" span-s="row">
        <h2>
          <a href="<?php echo $input['link']; ?>">
            <?php echo $input['name']; ?>
          </a>
        </h2>
        <img class="h-20 fill bottom left padding0" src="<?php echo $image[0]; ?>" alt="<?php echo $input['name']; ?>">
        <?php echo gzm_text($folder . '/text.md'); ?>
      </r-cell>
    <?php
      unset($image, $input);
    }
    unset($folder);
    ?>

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
