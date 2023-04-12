<?php
$magicSpells = [
  [
    "name" => 'Catnip Blast',
    "description" => 'Unleash a powerful wave of catnip that overwhelms your enemies and calms your friends.',
    "level" => 'beginner',
  ],
  [
    "name" => 'Purrfect Invisibility',
    "description" => 'Turn yourself invisible and silently stalk your prey or escape from danger.',
    "level" => 'intermediate',
  ],
  [
    "name" => 'Telekittenesis',
    "description" => 'Move objects with the power of your mind, just like a Jedi cat.',
    "level" => 'advanced',
  ],
  [
    "name" => 'Meowgic Missile',
    "description" => 'Launch a fiery missile from your paws that explodes on impact and knocks out your foes.',
    "level" => 'beginner',
  ],
  [
    "name" => 'Whisker Whisper',
    "description" => 'Communicate telepathically with other cats and share information or coordinate attacks.',
    "level" => 'intermediate',
  ],
  [
    "name" => 'Furball Fury',
    "description" => 'Summon a swarm of vicious furballs that shred your enemies to pieces.',
    "level" => 'advanced',
  ],
  [
    "name" => 'Cat Nap',
    "description" => 'Instantly fall asleep and regain your energy, even in the middle of a battle.',
    "level" => 'beginner',
  ],
  [
    "name" => 'Hiss of Death',
    "description" => 'Unleash a powerful hiss that stuns your enemies and deals massive damage.',
    "level" => 'intermediate',
  ],
  [
    "name" => 'Nine Lives',
    "description" => 'Cheat death and come back to life multiple times, just like a true feline warrior.',
    "level" => 'advanced',
  ],
];
function find($elem) {
    if (array_key_exists("level", $_GET) && $_GET["level"] != $elem["level"]) return false;
    if (array_key_exists("name", $_GET) && $_GET["name"] != $elem["name"]) return false;
    if (array_key_exists("term", $_GET) && stripos($elem["name"] . "\n" . $elem["description"], $_GET["term"]) === false) return false;
    return true;
}
header("Content-Type: application/json");
$url = substr($_SERVER["REDIRECT_URL"], 14);
switch ($url) {
    case "/code": header("Content-Type: text/plain"); readfile(__FILE__); exit;
    case "/list": echo json_encode($magicSpells); exit;
    case "/find": echo json_encode(array_filter($magicSpells, "find")); exit;
    case "/random": shuffle($magicSpells); echo json_encode($magicSpells[0]); exit;
    default: http_response_code(404); echo json_encode(["error" => "Path not found: $url"]); exit;
}
