<?php

namespace App\Filament\Tables\Columns;

use Filament\Tables\Columns\TextColumn;

class TextColumnHiddenByDefault extends TextColumn
{
    public static function make(string $name): static
    {
        return parent::make($name)
            ->toggleable()
            ->toggledHiddenByDefault();
    }
}
