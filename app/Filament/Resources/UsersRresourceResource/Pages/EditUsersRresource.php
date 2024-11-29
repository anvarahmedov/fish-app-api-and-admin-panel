<?php

namespace App\Filament\Resources\UsersRresourceResource\Pages;

use App\Filament\Resources\UsersRresourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsersRresource extends EditRecord
{
    protected static string $resource = UsersRresourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
