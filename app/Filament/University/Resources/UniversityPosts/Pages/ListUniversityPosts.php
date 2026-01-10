<?php

namespace App\Filament\University\Resources\UniversityPosts\Pages;

use App\Filament\University\Resources\UniversityPosts\UniversityPostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUniversityPosts extends ListRecords
{
    protected static string $resource = UniversityPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
