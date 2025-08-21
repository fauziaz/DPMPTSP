<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SambutanResource\Pages;
use App\Filament\Resources\SambutanResource\RelationManagers;
use App\Models\Sambutan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\Placeholder;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SambutanResource extends Resource
{
    protected static ?string $model = Sambutan::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationLabel = 'Sambutan Kepala Dinas';
    protected static ?string $pluralLabel = 'Sambutan Kepala Dinas';
    protected static ?string $navigationGroup = 'Beranda';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto_path')
                    ->label('Foto Sambutan')
                    ->image()
                    ->directory('sambutan')
                    ->imageEditor()
                    ->maxSize(2048)
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            // Ambil path pertama kalau array
                            if (is_array($state)) {
                                $state = $state[0] ?? null;
                            }

                            // Pastikan bukan path lokal temp
                            if ($state && !str_starts_with($state, 'C:') && !str_starts_with($state, '/tmp')) {
                                $set('foto_url', Storage::url($state));
                            }
                        }
                    }),

                Forms\Components\TextInput::make('foto_url')
                    ->label('URL Gambar (opsional)')
                    ->url()
                    ->maxLength(255)
                    ->reactive(),

                Forms\Components\Placeholder::make('preview_gambar')
                    ->label('Preview Gambar')
                    ->visible(fn ($get) => filled($get('foto_path')) || filled($get('foto_url')))
                    ->content(function ($get) {
                        $fotoPath = $get('foto_path');

                        if (is_array($fotoPath)) {
                            $fotoPath = $fotoPath[0] ?? null;
                        }

                        // Cek jika ada file lokal di storage publik
                        if (filled($fotoPath) && !str_starts_with($fotoPath, 'C:') && !str_starts_with($fotoPath, '/tmp')) {
                            return new HtmlString('<img src="' . Storage::url($fotoPath) . '" style="max-width:200px; border-radius:8px;" />');
                        }

                        // Cek jika ada URL eksternal
                        if (filled($get('foto_url'))) {
                            return new HtmlString('<img src="' . $get('foto_url') . '" style="max-width:200px; border-radius:8px;" />');
                        }

                        return '';
                    })
                    ->extraAttributes(['class' => 'prose max-w-full']),
                Forms\Components\RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_path')
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        if ($record->foto_path) {
                            // Ambil dari storage lokal
                            return asset('storage/' . $record->foto_path);
                        } elseif ($record->foto_url) {
                            // Ambil dari URL langsung
                            return $record->foto_url;
                        }
                        return null;
                    })
                    ->square()
                    ->height(80)
                    ->width(80),

                // Kolom URL gambar (klik-able)
                Tables\Columns\TextColumn::make('foto_url')
                    ->label('Foto URL')
                    ->url(fn ($record) => $record->foto_url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi')
                    ->label('Isi Sambutan')
                    ->html()
                    ->limit(50)
                    ->searchable(),
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
            'index' => Pages\ListSambutans::route('/'),
            'create' => Pages\CreateSambutan::route('/create'),
            'edit' => Pages\EditSambutan::route('/{record}/edit'),
        ];
    }
}
