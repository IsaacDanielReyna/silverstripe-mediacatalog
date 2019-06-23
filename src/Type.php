<?php

namespace IsaacDanielReyna\MediaCatalog;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

class Type extends DataObject
{
    private static $table_name = 'idr_catalog_types';
    
    private static $db = [
        'Name' => 'Varchar(255)',
        'Description' => 'Text',
    ];

    private static $has_many = [
        'Media' => Media::class
    ];

    private static $has_one = [
        'Image' => Image::class,
        'MediaCatalog' => MediaCatalog::class
    ];

    private static $owns = [
        'Image'
    ];

    private static $default_sort = 'Name ASC';

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Name', 'Title'),
            TextareaField::create('Description', 'Description'),
            $uploader = UploadField::create('Image', 'Cover Image')
        );
        $uploader->setFolderName('MediaCatalog/MediaTypes');
        $uploader->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg','jp2', 'webp', 'jxr']);

        return $fields;
    }
}