<?php
require_once './vendor/autoload.php';

use Michelf\MarkdownExtra, Michelf\SmartyPantsTypographer;

function gzmformatext($path){
  /* Setup Markdown Extra formatting processes */
  $text = MarkdownExtra::defaultTransform(file_get_contents($path));
  /* Setup SmartyPants Typographer formatting processes */
  $text = SmartyPantsTypographer::defaultTransform($text);
  return $text;
}
