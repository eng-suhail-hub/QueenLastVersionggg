<?php

namespace App\Filament\University\Resources\UniversityPosts\Pages;

use App\Filament\University\Resources\UniversityPosts\UniversityPostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateUniversityPost extends CreateRecord
{
    protected static string $resource = UniversityPostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['university_id'] =Auth::user()->id;

    return $data;
}
}
