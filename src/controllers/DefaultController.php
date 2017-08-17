<?php
namespace carlcs\deleteentryversions\controllers;

use Craft;
use craft\db\Query;
use craft\web\Controller;
use yii\web\Response;

class DefaultController extends Controller
{
    /**
     * Deletes all but the most recent entry versions for each entry.
     *
     * @return Response
     * @throws ForbiddenHttpException
     */
    public function actionDelete()
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
            Craft::$app->getSession()->setError(Craft::t('delete-entry-versions', 'No entry versions exist yet.'));
            return $this->redirect('utilities/delete-entry-versions');
        }

        // Update the latest versions’ version number
        Craft::$app->getDb()->createCommand()
            ->update('{{%entryversions}}', ['num' => 1])
            ->execute();

        Craft::$app->getSession()->setNotice(Craft::t('delete-entry-versions', '{count} entry versions deleted.', ['count' => $count]));
        return $this->redirect('utilities/delete-entry-versions');
    }
}
