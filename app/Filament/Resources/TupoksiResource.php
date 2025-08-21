<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TupoksiResource\Pages;
use App\Filament\Resources\TupoksiResource\RelationManagers;
use App\Models\Tupoksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TupoksiResource extends Resource
{
    protected static ?string $model = Tupoksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Tugas Pokok dan Fungsi';
    protected static ?string $pluralLabel = 'Tugas Pokok dan Fungsi';
    protected static ?string $navigationGroup = 'Profil';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('tugas_pokok')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('fungsi')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tugas_pokok')
                    ->label ('Tugas Pokok')
                    ->limit(50)
                    ->html()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fungsi')
                    ->label ('Fungsi')
                    ->limit(50)
                    ->html()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTupoksis::route('/'),
            'create' => Pages\CreateTupoksi::route('/create'),
            'edit' => Pages\EditTupoksi::route('/{record}/edit'),
        ];
    }
}
