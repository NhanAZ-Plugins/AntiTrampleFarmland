<?php

declare(strict_types=1);

namespace NhanAZ\AntiTrampleFarmland;

final class ProtectionPolicy {

	public static function shouldProtect(string $worldName, mixed $mode, mixed $worlds): bool {
		if (!is_array($worlds) || !array_is_list($worlds)) {
			$worlds = [];
		}

		$isListed = in_array($worldName, $worlds, true);
		return $mode === "whitelist" ? $isListed : !$isListed;
	}
}
