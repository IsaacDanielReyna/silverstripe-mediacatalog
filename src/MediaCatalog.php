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
        'Types' => Type::class,
    ];

    // Publish cascades to the following:
    private static $owns = [
        'Multimedia'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $Media = GridField::create(
            'Multimedia',
            'Media on this page',
            $this->Multimedia(),
            GridFieldConfig_RecordEditor::create()
        );

        $Type = GridField::create(
            'Types',
            'Media Types on this page',
            $this->Types(),
            GridFieldConfig_RecordEditor::create()
        );


        $fields->addFieldToTab('Root.Media', $Media);
        $fields->addFieldToTab('Root.Media Types', $Type);

        return $fields;
    }
}