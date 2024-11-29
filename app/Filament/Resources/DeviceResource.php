<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceDatasResource\RelationManagers\DeviceDatasRelationManager;
use App\Filament\Resources\DeviceResource\Pages;
use App\Filament\Resources\DeviceResource\RelationManagers;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;


class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;
    public static ?string $navigationLabel = 'Qurilmalar';
   // public static ?string $label = 'Qurilmalar';
   protected static ?string $pluralModelLabel = 'Qurilmalar';

   public static ?string $modelLabel= 'Qurilma';



    protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('device_name')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('user_id')
                        ->maxLength(255)->required(),
                    Forms\Components\TextInput::make('city')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('region')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('country')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('latitude')
                        ->maxValue(90)->minValue(-90)
                        ->maxLength(255),
                        Forms\Components\TextInput::make('longtitude')
                        ->maxLength(255)->maxValue(180)->minValue(-180),]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('device_name')
                ->searchable(),
           // Tables\Columns\TextColumn::make('city')
           //     ->searchable(),
          //      Tables\Columns\TextColumn::make('city')
           //     ->searchable(),
           Tables\Columns\TextColumn::make('user.fullname')
                ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                ->searchable(),
                Tables\Columns\TextColumn::make('longtitude')
                ->searchable(),
             //   Tables\Columns\TextColumn::make('country'),
                TextColumn::make('created_at')->sortable()->searchable(),
             //   TextColumn::make('updated_at')->sortable()->searchable(),

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
            DeviceDatasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
