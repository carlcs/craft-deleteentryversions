<?php

namespace carlcs\deleteentryversions;

use Craft;

class Utility extends craft\base\Utility
{
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('delete-entry-versions', 'Delete Entry Versions');
    }

    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'delete-entry-versions';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias('@app/icons/trash.svg');
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        return Craft::$app->getView()->renderTemplate('delete-entry-versions/_utility');
    }
}
