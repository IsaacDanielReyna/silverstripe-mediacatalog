<?php

namespace IsaacDanielReyna\MediaCatalog;

use Page;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class MediaCatalog extends Page
{
    private static $description = 'Adds a media catalog to your website';

    private static $icon = 'isaacdanielreyna/mediacatalog: images/mediacatalog-icon.png';

    private static $db = [
        'DisableBootstrap' => 'Boolean'
    ];
    private static $has_many = [
        'Multimedia' => Media::class,
    ];

    // Publish cascades to the following:
    private static $owns = [
        'Multimedia'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        
        $DisableBootstrap = CheckboxField::create('DisableBootstrap', 'Disable included Bootstrap.css');
        $Media = GridField::create(
            'Multimedia',
            'Media on this page',
            $this->Multimedia(),
            GridFieldConfig_RecordEditor::create()
        );
        
        $fields->addFieldToTab('Root.Media', $DisableBootstrap);
        $fields->addFieldToTab('Root.Media', $Media);
        return $fields;
    }

    // Get all Media Data Objects from database
    public function AllMedia()
    {
        return Media::get();
    }

    // Get all Media Data Objects from this page
    public function Media()
    {
        return Media::get()->filter([
            'MediaCatalogID' => $this->ID
        ]);
    }
}