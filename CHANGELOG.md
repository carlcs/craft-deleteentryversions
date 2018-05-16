# Changelog

## 2.0.0 - 2017-11-23

### Added
- Added Craft 3 compatibility.

### Changed
- The function to delete entry versions can now be found in the “Utilities” section in the Control Panel.

## 1.1.1 - 2017-08-17

### Fixed
- Removed the restriction where the plugin didn’t work for Craft Personal editions.

## 1.1.0 - 2017-06-26

### Changed
- The plugin no longer truncates the `entryversions` table and resaves new versions for each entry. Instead all but the most recent entry versions are deleted.

### Fixed
- Fixed a bug where field content was missing in most recent entry versions.

## 1.0.3 - 2016-05-01

### Added
- Added support for CSRF Protection.

## 1.0.2 - 2016-02-02

### Added
- Added Composer support.

## 1.0.1 - 2016-02-02

### Added
- Added Craft 2.5 plugin configurations.
