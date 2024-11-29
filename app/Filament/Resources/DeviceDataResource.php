<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceDataResource\Pages;
use App\Filament\Resources\DeviceDataResource\RelationManagers;
use App\Models\DeviceData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class DeviceDataResource extends Resource
{
    protected static ?string $model = DeviceData::class;

    public static ?string $navigationLabel = 'Qurilma ma\'lumotlari';

    protected static ?string $modelLabel = 'Qurilma ma\'lumotlari';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('device_id')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('light')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('oxygen')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('temperature')
                        ->required()
                        ->maxLength(255)]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('device.device_name')
                ->searchable(),
            Tables\Columns\TextColumn::make('light')
                ->searchable(),
                Tables\Columns\TextColumn::make('oxygen'),
                Tables\Columns\TextColumn::make('light')
                ->searchable(),
                Tables\Columns\TextColumn::make('temperature'),
                TextColumn::make('created_at')->sortable()->searchable(),
                TextColumn::make('updated_at')->sortable()->searchable(),

        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    protected static ?string $pluralModelLabel = 'Qurilma ma\'lumotlari';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeviceData::route('/'),
            'create' => Pages\CreateDeviceData::route('/create'),
            'edit' => Pages\EditDeviceData::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
