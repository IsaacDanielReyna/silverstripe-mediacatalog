<?php

namespace IsaacDanielReyna\MediaCatalog;

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class Media extends DataObject
{
    private static $table_name = 'idr_catalog_media';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Transliteration' => 'Varchar(255)',
        'NativeTitle' => 'Varchar(255)',
        'MenuTitle' => 'Varchar(255)',
        'Summary' => 'Text',
        'LastUpdate' => 'Date',
        'Rating' => 'Percentage',
        'slug' => 'Text'
    ];

    private static $default_sort = 'Title ASC';

    private static $has_one = [
        'MediaCatalog' => MediaCatalog::class,
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];

    private static $summary_fields = [
        //'GridThumbnail' => 'Image',
        'Image.CMSThumbnail' => 'Image',
        'Title' => 'Title',
        'NativeTitle' => 'Native Title',
        'Transliteration' => 'Transliteration',
        'Rating' => 'Raiting',
        'LastUpdate' => 'Last Updated'
    ];

    private static $searchable_fields = [
        'Title',
        'NativeTitle',
        'Transliteration'
     ];

    
    private static $extensions = [
        Versioned::class,
    ];

    public function getGridThumbnail()
    {
        if($this->Image()->exists()) {
            return $this->Image()->ScaleWidth(100);
        }
    }

    public function getCMSValidator() {
		return new RequiredFields('Title');
    }
    
    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title', 'Title'),
            TextField::create('Transliteration', 'Transliteration')
                ->setDescription('Transliteration of the native title'),
            TextField::create('NativeTitle', 'Native Title'),
            TextField::create('slug', 'Slug'),
            DateField::create('LastUpdate','Last Updated'),
            TextareaField::create('Summary', 'Summary'),
            NumericField::create('Rating', 'Rating')
                ->setScale(2),
            $uploader = UploadField::create('Image', 'Cover Image')
        );

        
        $uploader->setFolderName('MediaCatalog');
        $uploader->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg','jp2', 'webp', 'jxr']);

        return $fields;
    }

    public function Stars()
    {
        return $this->Rating*100;
    }

    public function Link()
    {
        return $this->MediaCatalog()->Link($this->slug);
    }

    public function onBeforeWrite()
    {
        // Needed for Breadcumbs
        $this->MenuTitle = $this->Title;

        // Build URL Slug
        $this->slug = $this->BuildSlug();

        // Set Last Update if empty
        if (!$this->LastUpdate)
            $this->LastUpdate = time();

        parent::onBeforeWrite();
    }

    public function BuildSlug()
    {
        $slug = $this->slugify($this->Title);

        $count = 2;
        while (!$this->validURLSegment()) {
            $slug = preg_replace('/-[0-9]+$/', null, $slug) . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function slugify ($string)
    {
        $string = utf8_encode($string);
        $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/-+/', '-', $string);
        $string = trim($string, '-');
        $string = strtolower($string);
    
        if (empty($string)) {
            return 'n-a';
        }
    
        return $string;
    }

    public function validURLSegment()
    {   
        $source = Media::get()
            ->filter([
                'MediaCatalogID' => $this->MediaCatalogID,
                'slug' => $this->slug
            ])
            ->exclude('ID', $this->ID);

        return !$source->exists();
    }
}