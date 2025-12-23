<?php

namespace App\Filament\Resources\ContryResource\Pages;

use App\Filament\Resources\ContryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContries extends ListRecords
{
    protected static string $resource = ContryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
