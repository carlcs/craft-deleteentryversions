<?php
namespace Craft;

class DeleteAllEntryVersionsController extends BaseController
{
        // Public Methods
	// =========================================================================

        /**
	 * Deletes all entry versions.
	 *
	 * @return null
	 */
        public function actionDelete()
	{
                if (craft()->getEdition() >= Craft::Client)
                {
                        // Delete them all.
                        craft()->db->createCommand()->truncateTable('entryversions');

                        // Save a new version for all entries' current content, to make it possible to revert back to it.
                        $sections = craft()->sections->getAllSections();

                        foreach ($sections as $section)
                        {
                                if ($section->enableVersioning)
                                {
                                        $criteria = craft()->elements->getCriteria(ElementType::Entry);

                			$criteria->sectionId = $section->id;
                			$criteria->status = null;
                			$criteria->localeEnabled = null;
                			$criteria->limit = null;

                                        foreach ($criteria as $entry)
                                        {
                                                craft()->entryRevisions->saveVersion($entry);
                                        }
                                }
                        }
                }

                $this->redirectToPostedUrl();
	}



}
