<?php

namespace App\Filament\University\Resources\UniversityPosts\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class UniversityPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                RichEditor::make('content')
                                    ->columnSpanFull()
                    ->required()
                    ->columnSpanFull(),
          // Hidden::make('university_id')
          //     ->default(fn () => auth()->id),
          TextInput::make('university_id')
    ->default(fn () => Auth::user()->id)
    ->dehydrated(true)
    ->visible(false),
            ]);
    }
}
