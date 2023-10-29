<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentResource\Pages;
use App\Filament\Resources\ResidentResource\RelationManagers;
use App\Models\Residents\Resident;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResidentResource extends Resource
{
    protected static ?string $model = Resident::class;

    protected static ?string $navigationIcon = 'heroicon-o-finger-print';

    protected static ?string $navigationGroup = 'Barangay Records';

    protected static ?string $recordTitleAttribute = 'latest_record.full_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('latest_record.full_name')->label('Name'),
                    //
                Tables\Columns\TextColumn::make('latest_record.address.street_and_zone')->label('Address'),
                    //
                Tables\Columns\TextColumn::make('latest_record.age')->label('Age'),
                    //
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('age')
                    ->options([
                        'minor' => 'Minor',
                        'adult' => 'Adult',
                        'senior citizen' => 'Senior citizen',
                    ])
                    ->query(function (Builder $builder, array $data) {
                        // query scope
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }
}
