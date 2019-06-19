<?php

namespace IsaacDanielReyna\MediaCatalog;

use PageController;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\ArrayData;
use SilverStripe\View\SSViewer;

class MediaCatalogController extends PageController
{
    private static $allowed_actions = [
        'show'
    ];
    
    private static $url_handlers = [
        '$ID!' => 'show'
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
            'Title' => $media->Title,
            'Breadcrumbs' => $this->DataObjectBreadcrumbs($media)
        ];
    }

    public function DataObjectBreadcrumbs($dataobject, $maxDepth = 20, $unlinked = false, $stopAtPageType = false, $showHidden = false, $delimiter = '&raquo;')
    {
        $pages = $this->getBreadcrumbItems($maxDepth, $stopAtPageType, $showHidden);
        $pages[] = $dataobject;
        $template = SSViewer::create('BreadcrumbsTemplate');

        return $template->process($this->customise(new ArrayData(array(
            "Pages" => $pages,
            "Unlinked" => $unlinked,
            "Delimiter" => $delimiter,
        ))));
    }
}
