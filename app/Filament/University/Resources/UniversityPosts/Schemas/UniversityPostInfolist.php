<?php

namespace App\Filament\University\Resources\UniversityPosts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class UniversityPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),

                TextEntry::make('likes_count')
                    ->label(' Likes')
                    ->numeric(),

                TextEntry::make('content')
                    ->label(' content')
                    ->html(),


            ]);
    }
}
