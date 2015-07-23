<?php
namespace Craft;

/**
 * Delete All Entry Versions plugin
 */
class DeleteAllEntryVersionsPlugin extends BasePlugin
{
        function getName()
        {
                return 'Delete All Entry Versions';
        }

        function getVersion()
        {
                return '1.0';
        }

        function getDeveloper()
        {
                return 'carlcs';
        }

        function getDeveloperUrl()
        {
                return 'https://github.com/carlcs/craft-deleteallentryversions';
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
