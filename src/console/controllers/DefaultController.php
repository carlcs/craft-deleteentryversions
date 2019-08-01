<?php
namespace carlcs\deleteentryversions\console\controllers;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

class DefaultController extends Controller
{
    /**
     * Deletes all but the most recent entry versions for each entry.
     *
     * @return Response
     * @throws ForbiddenHttpException
     */
    public function actionIndex()
    {
        $this->requirePermission('utility:delete-entry-versions');

        // Get the most recent entry versions for each entry
        $subQuery = (new Query())
            ->select('entryId, siteId, max(dateCreated) MaxDateCreated')
            ->from('{{%entryversions}}')
            ->groupBy('entryId, siteId');

        $query = (new Query())
            ->select('e.id')
            ->from('{{%entryversions}} e')
            ->innerJoin(['g' => $subQuery], [
                'and',
                'e.entryId = g.entryId',
                'e.siteId = g.siteId',
                'e.dateCreated = g.MaxDateCreated'
            ]);

        $ids = $query->column();

        // Delete all other versions
        $count = Craft::$app->getDb()->createCommand()
            ->delete('{{%entryversions}}', ['not in', 'id', $ids])
            ->execute();

        if (!$count) {
            return Craft::t('delete-entry-versions', 'No entry versions exist yet.');
        }

        // Update the latest versions’ version number
        Craft::$app->getDb()->createCommand()
            ->update('{{%entryversions}}', ['num' => 1])
            ->execute();

        return Craft::t('delete-entry-versions', '{count} entry versions deleted.', ['count' => $count]);
    }
}
