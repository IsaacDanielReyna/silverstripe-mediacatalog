<?php

namespace IsaacDanielReyna\MediaCatalog;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\NumericField;

class Media extends DataObject
{
    private static $table_name = 'idr_catalog_media';
    
    private static $db = [
        'Title' => 'Varchar(255)',
        'Transliteration' => 'Varchar(255)',
        'NativeTitle' => 'Varchar(255)',
        'Description' => 'Text',
        'Sort' => 'Int',
        'LastUpdate' => 'Date',
        'Rating' => 'Percentage'
    ];

    private static $has_one = [
        'MediaCatalog' => MediaCatalog::class,
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Transliteration' => 'Transliteration',
        'Rating' => 'Raiting',
        'LastUpdate' => 'Last Update'
    ];

    private static $default_sort = 'SORT ASC';

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title', 'Title'),
            TextField::create('Transliteration', 'Transliteration')
                ->setDescription('Transliteration of the native title'),
            TextField::create('NativeTitle', 'Native Title'),
            DateField::create('LastUpdate','Last Updated'),
            TextareaField::create('Description', 'Description'),
            NumericField::create('Rating', 'Rating'),
            $uploader = UploadField::create('Image', 'Cover Image')
        );

        $uploader->setFolderName('MediaCatalog');
        $uploader->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg','jp2', 'webp', 'jxr']);

        return $fields;
    }
}