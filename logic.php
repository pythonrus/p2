<?php

$addnum = False;
$addchar = False;

$pages = file("words.txt", FILE_IGNORE_NEW_LINES);


function unpack_post() {
  // Globals
  global $wordnum;
  global $addnum;
  global $addchar;

  if (array_key_exists('wordnum', $_POST)) {
    $wordnum = $_POST['wordnum'];
  }

  if (array_key_exists('addnum', $_POST)) {
    $addnum = True;
  }

  if (array_key_exists('addchar', $_POST)) {
    $addchar = True;
  }
}
