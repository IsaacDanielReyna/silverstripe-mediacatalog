<?php

namespace IsaacDanielReyna\MediaCatalog;

use PageController;

class MediaCatalogController extends PageController
{
    public function Catalog()
    {
        return Media::get();
    }

}