<?php

namespace IsaacDanielReyna\MediaCatalog;

use PageController;
use SilverStripe\Control\HTTPRequest;

class MediaCatalogController extends PageController
{
    private static $allowed_actions = [
        'show'
    ];

    public function show(HTTPRequest $request)
    {
        $media = Media::get()->filter([
            'MediaCatalogID' => $this->ID,
            'slug' => $request->param('ID')
        ])->first();

        if (!$media){
            return $this->httpError(404,'Sorry, it seems you were trying to access a page that doesn\'t exist.');
        }

        return [
            'Media' => $media,
            'Title' => $media->Title
        ];
    }

}