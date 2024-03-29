<?php

namespace App\FilamentExcel\Actions\Tables;

use App\FilamentExcel\Exports\MultiOptionExport;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class TableExportBulkAction extends ExportBulkAction
{
    public static function make(?string $name = 'export_selected'): static
    {
        return parent::make($name)
            ->label('Export selected')
            ->color('gray')
            ->exports([MultiOptionExport::make()]);
    }
}
