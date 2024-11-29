<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DevicesRelationManager extends RelationManager
{
    protected static string $relationship = 'devices';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('device_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('region')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('latitude')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('longtitude')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('device_name')
            ->columns([
                Tables\Columns\TextColumn::make('device_name'),
                Tables\Columns\TextColumn::make('user.fullname')
                ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                ->searchable(),
                Tables\Columns\TextColumn::make('longtitude')
                ->searchable(),
             //   Tables\Columns\TextColumn::make('country'),
             Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->url(fn ($record): string => route('filament.admin.resources.devices.edit', ['record' => $record])),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
