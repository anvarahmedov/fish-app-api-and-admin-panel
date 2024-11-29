<?php

namespace App\Filament\Resources\DeviceDatasResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeviceDatasRelationManager extends RelationManager
{
    protected static string $relationship = 'deviceDatas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('device.device_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('oxygen')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('temperature')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('light')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('device_id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('device.device_name'),
                Tables\Columns\TextColumn::make('oxygen'),
                Tables\Columns\TextColumn::make('temperature'),
                Tables\Columns\TextColumn::make('light'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->url(fn ($record): string => route('filament.admin.resources.device-datas.edit', ['record' => $record])),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
