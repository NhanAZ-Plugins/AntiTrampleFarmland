# AntiTrampleFarmland

Protect farmland from entity trampling in selected Axolotl-PM worlds

[![CI](https://github.com/NhanAZ-Plugins/AntiTrampleFarmland/actions/workflows/build.yml/badge.svg)](https://github.com/NhanAZ-Plugins/AntiTrampleFarmland/actions/workflows/build.yml)
[![Latest release](https://img.shields.io/github/v/release/NhanAZ-Plugins/AntiTrampleFarmland)](https://github.com/NhanAZ-Plugins/AntiTrampleFarmland/releases/latest)
[![License](https://img.shields.io/github/license/NhanAZ-Plugins/AntiTrampleFarmland)](https://github.com/NhanAZ-Plugins/AntiTrampleFarmland/blob/master/LICENSE)
[![Discord](https://img.shields.io/discord/986553214889517088?label=Discord&logo=discord&logoColor=white&color=5865F2)](https://discord.gg/j2X83ujT6c)


## Behavior

The plugin cancels `EntityTrampleFarmlandEvent` in protected worlds. It leaves the event unchanged elsewhere, including when another plugin has already cancelled it.

The `worlds` list contains world display names. In `blacklist` mode, every world except a listed world is protected. In `whitelist` mode, only listed worlds are protected. The default is `blacklist` with an empty list, which protects every world. An invalid mode uses the blacklist behavior. If `worlds` is not a list, the plugin treats it as empty.

```yaml
mode: blacklist
worlds:
  - world_to_leave_unprotected
```

The `whitelist` behavior in version 0.0.3 corrects an earlier implementation that did not protect listed worlds and could undo another plugin's cancellation. Check your existing configuration when upgrading.

![Farmland example](https://user-images.githubusercontent.com/60387689/229535076-4e6dc5db-4919-45e4-bc89-fedcea41f598.gif)

## Requirements and compatibility

- Axolotl-PM with plugin API `5.0.0`.
- PHP 8.1 or newer in the Axolotl-PM 5 toolchain.

The [build workflow](.github/workflows/build.yml) pins the Axolotl-PM source used for PHPStan level max. The tested runtime version is recorded in release evidence. Compatibility with every Axolotl-PM 5.x release has not been established.

## Installation

Download `AntiTrampleFarmland.phar` from a verified [GitHub release](https://github.com/NhanAZ-Plugins/AntiTrampleFarmland/releases), place it in the server's `plugins/` directory and restart the server. Edit `plugin_data/AntiTrampleFarmland/config.yml` and restart to change protected worlds.

## Building and testing

The [build workflow](.github/workflows/build.yml) runs the protection policy cases and PHPStan level max, builds the plugin PHAR with [DevTools](https://github.com/AxolotlBucketLabs/DevTools), then verifies the PHAR contents and digest. The workflow uses the maintained DevTools latest channel. A clean server startup check establishes that the PHAR loads. An in-game trampling test with an entity is a separate check.

## License and support

The plugin source is licensed under [GPL-3.0](LICENSE). For help, use [NhanAZ Discord](https://discord.gg/j2X83ujT6c).
