<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
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

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Berita dan Artikel';
    protected static ?string $pluralLabel = 'Berita dan Artikel';
    protected static ?string $navigationGroup = 'Dokumen dan Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kategori')
                    ->options([
                        'Berita' => 'Berita',
                        'Artikel' => 'Artikel',
                    ])
                    ->default('Berita')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar Berita')
                    ->image()
                    ->directory('berita')
                    ->imageEditor()
                    ->maxSize(2048)
                    ->multiple(false)
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            // Pastikan single file, bukan array
                            if (is_array($state)) {
                                $state = $state[0] ?? null;
                            }

                            // Dapatkan URL publik
                            $url = Storage::url($state);
                            $set('gambar_berita_url', $url);
                        }
                    }),

                Forms\Components\TextInput::make('gambar_berita_url')
                    ->label('URL Gambar Berita (opsional)')
                    ->url()
                    ->maxLength(255)
                    ->reactive(),

                Forms\Components\Placeholder::make('preview_gambar_berita')
                    ->label('Preview Gambar Berita')
                    ->visible(fn ($get) => filled($get('gambar')) || filled($get('gambar_berita_url')))
                    ->content(function ($get) {
                        $gambar = $get('gambar');

                        // Ambil gambar dari upload
                        if (is_array($gambar)) {
                            $gambar = $gambar[0] ?? null;
                        }
                        if (filled($gambar)) {
                            $url = Storage::url($gambar);
                            return new HtmlString('<img src="' . e($url) . '" style="max-width:200px; border-radius:8px;" />');
                        }

                        // Atau dari URL manual
                        if (filled($get('gambar_berita_url'))) {
                            return new HtmlString('<img src="' . e($get('gambar_berita_url')) . '" style="max-width:200px; border-radius:8px;" />');
                        }

                        return '';
                    })
                    ->extraAttributes(['class' => 'prose max-w-full']),
                Forms\Components\RichEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('penulis')
                    ->required()
                    ->maxLength(255)
                    ->default('DPMPTSP Kota Tasikmalaya'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable(),
                Tables\Columns\TextColumn::make('judul')
                    ->html()
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->getStateUsing(function ($record) {
                        if ($record->gambar) {
                            return asset('storage/' . $record->gambar);
                        } elseif ($record->gambar_berita_url) {
                            return $record->gambar_berita_url;
                        }
                        return null;
                    })
                    ->square()
                    ->height(80)
                    ->width(80),

                Tables\Columns\TextColumn::make('gambar_berita_url')
                    ->label('Gambar URL')
                    ->url(fn ($record) => $record->gambar_berita_url)
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('penulis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shared')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
