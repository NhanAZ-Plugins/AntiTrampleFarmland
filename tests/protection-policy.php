<?php

declare(strict_types=1);

require_once __DIR__ . "/../src/NhanAZ/AntiTrampleFarmland/ProtectionPolicy.php";

use NhanAZ\AntiTrampleFarmland\ProtectionPolicy;

$cases = [
	["blacklist", [], "spawn", true],
	["blacklist", ["spawn"], "spawn", false],
	["blacklist", ["spawn"], "arena", true],
	["whitelist", ["spawn"], "spawn", true],
	["whitelist", ["spawn"], "arena", false],
	["whitelist", "invalid", "spawn", false],
	["whitelist", ["world" => "spawn"], "spawn", false],
	["invalid", [], "spawn", true],
];

foreach ($cases as [$mode, $worlds, $worldName, $expected]) {
	if (ProtectionPolicy::shouldProtect($worldName, $mode, $worlds) !== $expected) {
		throw new RuntimeException("Unexpected protection decision for {$mode} and {$worldName}");
	}
}

echo "PASS: " . count($cases) . " protection policy cases\n";
