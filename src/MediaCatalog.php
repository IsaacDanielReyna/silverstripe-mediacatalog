<?php

namespace IsaacDanielReyna\MediaCatalog;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class MediaCatalog extends Page
{
    private static $description = 'Adds a media catalog to your website';

    private static $icon = 'isaacdanielreyna/mediacatalog: images/mediacatalog-icon.png';

    private static $has_many = [
        'Multimedia' => Media::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Media', GridField::create(
            'Multimedia',
            'Multimedia on this page',
            $this->Multimedia(),
            GridFieldConfig_RecordEditor::create()
        ));
        return $fields;
    }
}