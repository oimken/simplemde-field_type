<?php namespace Oimken\SimplemdeFieldType\Command;

use Oimken\SimplemdeFieldType\SimplemdeFieldType;
use Illuminate\Filesystem\Filesystem;

/**
 * Class PutFile
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class PutFile
{

    /**
     * The markdown field type instance.
     *
     * @var SimplemdeFieldType
     */
    protected $fieldType;

    /**
     * Create a new PutFile instance.
     *
     * @param SimplemdeFieldType $fieldType
     */
    public function __construct(SimplemdeFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Filesystem $files
     */
    public function handle(Filesystem $files)
    {
        $entry = $this->fieldType->getEntry();
        $path  = $this->fieldType->getStoragePath();

        if ($path && !is_dir(dirname($path))) {
            $files->makeDirectory(dirname($path), 0777, true, true);
        }

        if ($path) {
            $files->put($path, array_get($entry->getAttributes(), $this->fieldType->getField()));
        }
    }
}
