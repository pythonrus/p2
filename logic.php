<?php

// Default values for options to add number and/or character
$addnum = False;
$addchar = False;

// Read text file with list of 10,000 words into array
$wordlist = file("words.txt", FILE_IGNORE_NEW_LINES);

// Unpack files from POST array
function unpackpost() {
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

// Get password
function getpassword() {
    // Globals
    global $wordnum;
    global $addnum;
    global $addchar;
    global $wordlist;

    unpackpost();
    $password = Array();

    // Validate if user entered number between 1 and 9
    if ($wordnum === "" || $wordnum <= 0 || $wordnum > 9) {
        return "Enter a number of words between 1 and 9";
    }

    else {

        for ($i = 1; $i <= $wordnum; $i++) {
            $randomindex = rand(0, count($wordlist)-1);
            array_push($password, trim($wordlist[$randomindex]));
            unset($wordlist[$randomindex]);
        }

        // If user checked "Add number?"", add number in password
        if ($addnum) {
            $password = addnumber($password);
        }

        // If user checked "Add special character?", add character in password
        if ($addchar) {
            $password = addcharacter($password);
        }

        return implode("-", $password);
    }
}

// Add random number to random array index as option to user
function addnumber($withinarray) {
    $randomnum = rand(1, 9);
    $randomindex = rand(0, count($withinarray) - 1);

    $withinarray[$randomindex] = $withinarray[$randomindex] . $randomnum;

    return $withinarray;
}

// Add random character to random array index as option to user
function addcharacter($withinarray) {
    $specialchars = ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "?", "<", ">", "="];
    $randomchar = $specialchars[rand(0, count($specialchars) - 1)];
    $randomindex = rand(0, count($withinarray) - 1);

    $withinarray[$randomindex] = $withinarray[$randomindex] . $randomchar;

    return $withinarray;
}

?>
