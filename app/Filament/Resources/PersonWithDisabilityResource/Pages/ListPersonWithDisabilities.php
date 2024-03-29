<?php

namespace App\Filament\Resources\PersonWithDisabilityResource\Pages;

use App\Filament\Resources\PersonWithDisabilityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPersonWithDisabilities extends ListRecords
{
    protected static string $resource = PersonWithDisabilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \App\FilamentExcel\Actions\Pages\ExportTableAction::make(),
            Actions\CreateAction::make()->url(null),
        ];
    }
}
