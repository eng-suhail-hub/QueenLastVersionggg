<?php

namespace App\Filament\University\Resources\UniversityPosts\Pages;

use App\Filament\University\Resources\UniversityPosts\UniversityPostResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUniversityPost extends EditRecord
{
    protected static string $resource = UniversityPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
