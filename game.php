<?php

use Game\Game;
use Log\ConsoleLogger;

// enable all error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

// register autoloader
require_once('autoload.php');

// could come from user input
$numberOfPlayers = 5;

// start the game!
$game = new Game($numberOfPlayers, new ConsoleLogger());
$game->start();