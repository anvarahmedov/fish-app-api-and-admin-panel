<?php

namespace App\Filament\Resources\UsersRresourceResource\Pages;

use App\Filament\Resources\UsersRresourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsersRresources extends ListRecords
{
    protected static string $resource = UsersRresourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
