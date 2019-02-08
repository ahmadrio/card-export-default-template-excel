<?php

namespace Opanegro\CardExportDefaultTemplateExcel;

use Laravel\Nova\Card;

class CardExportDefaultTemplateExcel extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public function __construct($resource)
    {
        parent::__construct();
        $this->withMeta([
            'resourceLabel' => $resource::label(),
            'resourceModel' => $resource::$model,
            'resourceDefaultTemplate' => $resource::$exportLabelHeaders,
            'resource' => $resource::uriKey(),
        ]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'card-export-default-template-excel';
    }
}
