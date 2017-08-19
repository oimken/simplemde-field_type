<?php namespace Oimken\SimplemdeFieldType;

use Oimken\SimplemdeFieldType\Command\DeleteDirectory;
use Oimken\SimplemdeFieldType\Command\PutFile;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class MarkdownFieldTypeCallbacks
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class SimplemdeFieldTypeCallbacks
{

    use DispatchesJobs;

    /**
     * Fired after an entry is saved.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function onEntrySaved(SimplemdeFieldType $fieldType)
    {
        if (!$fieldType->getLocale()) {
            $this->dispatch(new PutFile($fieldType));
        }
    }

    /**
     * Fired after an entry translation is saved.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function onEntryTranslationSaved(SimplemdeFieldType $fieldType)
    {
        $this->dispatch(new PutFile($fieldType));
    }

    /**
     * Fired after an entry is deleted.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function onEntryDeleted(SimplemdeFieldType $fieldType)
    {
        if (!$fieldType->getLocale()) {
            $this->dispatch(new DeleteDirectory($fieldType));
        }
    }

    /**
     * Fired after an entry translation is deleted.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function onEntryTranslationDeleted(SimplemdeFieldType $fieldType)
    {
        $this->dispatch(new DeleteDirectory($fieldType));
    }
}
