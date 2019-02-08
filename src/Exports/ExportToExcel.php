<?php

namespace Opanegro\CardExportDefaultTemplateExcel\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportToExcel implements WithHeadings
{
    use Exportable;

    private $headings;

    public function __construct($headings)
    {
        $this->headings = $headings;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
