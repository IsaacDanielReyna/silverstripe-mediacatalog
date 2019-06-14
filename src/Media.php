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
use SilverStripe\Forms\DropdownField;
use SilverStripe\Versioned\Versioned;
use SilverStripe\ORM\Connect\MySQLSchemaManager;

class Media extends DataObject
{
    private static $table_name = 'idr_catalog_media';
    
    private static $db = [
        'Title' => 'Varchar(255)',
        'Transliteration' => 'Varchar(255)',
        'NativeTitle' => 'Varchar(255)',
        'Description' => 'Text',
        'LastUpdate' => 'Date',
        'Rating' => 'Percentage'
    ];

    private static $has_one = [
        'MediaCatalog' => MediaCatalog::class,
        'Image' => Image::class,
        'Type' => Type::class
    ];

    private static $owns = [
        'Image',
    ];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
        //'GridThumbnail' => 'Image',
        'Type.Name' => 'Type',
        'Title' => 'Title',
        'NativeTitle' => 'Native Title',
        'Transliteration' => 'Transliteration',
        'Rating' => 'Raiting',
        'LastUpdate' => 'Last Update'
    ];

    private static $default_sort = 'Title ASC';

    
    private static $extensions = [
        Versioned::class,
    ];
    //private static $versioned_gridfield_extensions = true;
    
    public function getGridThumbnail()
    {
        if($this->Image()->exists()) {
            return $this->Image()->ScaleWidth(100);
        }

    }

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title', 'Title'),
            TextField::create('Transliteration', 'Transliteration')
                ->setDescription('Transliteration of the native title'),
            TextField::create('NativeTitle', 'Native Title'),
            DateField::create('LastUpdate','Last Updated'),
            TextareaField::create('Description', 'Description'),
            DropdownField::create( 'TypeID', 'Type',  Type::get()->map('ID', 'Name') )->setEmptyString('(Select one)'),
            NumericField::create('Rating', 'Rating')
                ->setScale(2),
            $uploader = UploadField::create('Image', 'Cover Image')
        );

        $uploader->setFolderName('MediaCatalog');
        $uploader->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg','jp2', 'webp', 'jxr']);

        return $fields;
    }
}