<?php
require_once './vendor/autoload.php';

use Michelf\MarkdownExtra, Michelf\SmartyPantsTypographer;

/* Format text
   Parse Markdown file with MarkdownExtra 
   Format text input using SmartyPants Typographer
   SmartyPants Configuration options:
   https://michelf.ca/projects/php-smartypants/configuration/
   `q`  transforms straight quotes " into quotes “ and ”
   `D`  transforms double-hyphens into em dash: —
   `e`  transforms three consecutive dots ... into ellipsis …
   `t+` transforms space character used as a thousand separator to a no-break space
 */

function gzm_text($path){
  /* Setup Markdown Extra formatting processes */
  $text = MarkdownExtra::defaultTransform(file_get_contents($path));
  /* Setup SmartyPants Typographer formatting processes */
  $text = SmartyPantsTypographer::defaultTransform($text, "qDet+");
  return $text;
}
