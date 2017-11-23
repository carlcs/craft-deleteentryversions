# Delete Entry Versions plugin for Craft CMS

The plugin adds a utility to delete entry versions.

## Requirements

The plugin requires Craft CMS 3.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

```
cd /path/to/project
```

2. Then tell Composer to load the plugin:

```
composer require carlcs/craft-deleteentryversions
```

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Delete Entry Versions.

## Usage

You can find the utility in Utilities → Delete Entry Versions in the Control Panel.

The function provided deletes all entry versions of all of your entries. The current version of each entry is retained though, making it possible to revert back to it later.
