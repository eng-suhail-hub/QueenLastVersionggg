<?php

namespace App\Filament\Resources\Universities\RelationManagers;

use Filament\Actions\DeleteBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Illuminate\Support\HtmlString;

class PostsRelationManager extends RelationManager
{
  protected static string $relationship = 'universityPosts';

  protected static ?string $recordTitleAttribute = 'title';

public function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('updated_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
        TextColumn::make('title')->searchable(),
        TextColumn::make('content')->html()->limit(120),
      ])
      ->filters([
        //
      ])
      ->headerActions([
        // you can add Create action here if desired
      ])
      ->actions([
        ViewAction::make()
            ->modalWidth('lg')
            ->modalContent(fn ($record) => new HtmlString($record->content)),
        EditAction::make(),
        DeleteAction::make(),
      ])
      ->bulkActions([
        DeleteBulkAction::make(),
      ]);
  }
}
