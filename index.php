<?php
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
</head>

<body>
</body>

</html>
