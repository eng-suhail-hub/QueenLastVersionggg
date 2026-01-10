<?php

namespace App\Filament\University\Resources\UniversityPosts;

use App\Filament\University\Resources\UniversityPosts\Pages\CreateUniversityPost;
use App\Filament\University\Resources\UniversityPosts\Pages\EditUniversityPost;
use App\Filament\University\Resources\UniversityPosts\Pages\ListUniversityPosts;
use App\Filament\University\Resources\UniversityPosts\Pages\ViewUniversityPost;
use App\Filament\University\Resources\UniversityPosts\Schemas\UniversityPostForm;
use App\Filament\University\Resources\UniversityPosts\Schemas\UniversityPostInfolist;
use App\Filament\University\Resources\UniversityPosts\Tables\UniversityPostsTable;
use App\Models\UniversityPost;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class UniversityPostResource extends Resource
{
    protected static ?string $model = UniversityPost::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return UniversityPostForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UniversityPostInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UniversityPostsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->where('university_id',Auth::id())
        ->withCount('likes');
}
    public static function getPages(): array
    {
        return [
            'index' => ListUniversityPosts::route('/'),
            'create' => CreateUniversityPost::route('/create'),
            'view' => ViewUniversityPost::route('/{record}'),
            'edit' => EditUniversityPost::route('/{record}/edit'),
        ];
    }
}
