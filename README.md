> **This package has been deprecated**  
>
> The plugin has become obsolete with the release of Craft 3.2, which added the [`maxRevisions`](https://docs.craftcms.com/v3/config/config-settings.html#maxrevisions) config setting to limit the number of revisions stored for each element.
> Craft 3.4 added the [`utils/prune-revisions`](https://github.com/craftcms/cms/blob/develop/CHANGELOG-v3.md#340---2020-01-28) command to delete revisions from the console.

---

# Delete Entry Versions plugin for Craft CMS

The plugin adds a utility to delete entry versions.

## Installation

You can install the plugin manually from the command line with the following commands.

```
> composer require carlcs/craft-deleteentryversions
> ./craft install/plugin delete-entry-versions
```

## Usage

You can find the utility in Utilities → Delete Entry Versions in the Control Panel.

The function provided deletes all entry versions of all of your entries. The current version of each entry is retained though, making it possible to revert back to it later.

## License

[MIT](LICENSE.md)
