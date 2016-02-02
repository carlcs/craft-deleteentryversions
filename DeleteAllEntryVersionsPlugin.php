<?php
namespace Craft;

class DeleteAllEntryVersionsPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Delete All Entry Versions';
    }

    public function getVersion()
    {
        return '1.0.1';
    }

    public function getSchemaVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'carlcs';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/carlcs/craft-deleteallentryversions';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/carlcs/craft-deleteallentryversions';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://github.com/carlcs/craft-deleteallentryversions/raw/master/releases.json';
    }

    public function getSettingsUrl()
    {
        return 'settings/plugins/deleteallentryversions/index';
    }

    public function registerCpRoutes()
    {
        return array(
            'settings/plugins/deleteallentryversions/index' => 'deleteallentryversions/_settings',
        );
    }
}
