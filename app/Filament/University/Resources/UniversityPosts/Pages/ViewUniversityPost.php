<?php

namespace App\Filament\University\Resources\UniversityPosts\Pages;

use App\Filament\University\Resources\UniversityPosts\UniversityPostResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUniversityPost extends ViewRecord
{
    protected static string $resource = UniversityPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
