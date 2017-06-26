<?php
namespace Craft;

class DeleteAllEntryVersionsController extends BaseController
{
    // Public Methods
    // =========================================================================

    /**
     * Deletes all but the most recent entry versions for each entry.
     *
     * @return null
     */
    public function actionDelete()
    {
        if (craft()->getEdition() >= Craft::Client) {
            // Get the most recent entry versions for each entry
            $subQuery = craft()->db->createCommand()
                ->select('entryId, locale, max(dateCreated) MaxDateCreated')
                ->from('entryversions')
                ->group('entryId, locale');

            $query = craft()->db->createCommand()
                ->select('e.id')
                ->from('entryversions e')
                ->join('('.$subQuery->getText().') AS g', [
                    'and',
                    'e.entryId = g.entryId',
                    'e.locale = g.locale',
                    'e.dateCreated = g.MaxDateCreated'
                ]);

            $ids = $query->queryColumn();

            // Delete all other versions
            $count = craft()->db->createCommand()->delete('entryversions', ['not in', 'id', $ids]);

            // Update the latest versions’ version number
            craft()->db->createCommand()->update('entryversions', ['num' => 1]);
        }

        $this->redirectToPostedUrl();
    }
}
