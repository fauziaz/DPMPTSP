<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
// use App\Filament\Resources\GaleriResource\RelationManagers;
use App\Models\GaleriModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;

class GaleriResource extends Resource
{
    protected static ?string $model = GaleriModel::class;
    protected static ?string $navigationLabel = 'Galeri'; // nama di sidebar
    protected static ?string $pluralLabel = 'Galeri'; // nama di judul halaman
    protected static ?string $navigationIcon = 'heroicon-o-photo'; // icon di sidebar

    protected static ?string $navigationGroup = 'Dokumen dan Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(4),

                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->maxFiles(1) // batasi sesuai kebutuhan
                    ->preserveFilenames()
                    ->directory('galeri')
                    ->disk('public') // set disk di sini
                    ->label('Upload Gambar')
                    ->reactive(),

                Forms\Components\TextInput::make('gambarUrl')
                    ->label('URL Gambar')
                    ->url()
                    ->maxLength(255)
                    ->reactive(), // penting biar bisa live update preview

                Placeholder::make('preview_gambar')
                    ->label('Preview Gambar')
                    ->visible(fn ($get) => filled($get('gambar')) || filled($get('gambarUrl')))
                    ->content(function ($get) {
                        $paths = $get('gambarUrl');

                        if (!is_array($paths)) {
                            $paths = [$paths];
                        }

                        $html = '';
                        foreach ($paths as $path) {
                            if (filled($path)) {
                                if (str_contains($path, 'livewire-file') || str_contains($path, '.tmp')) {
                                    $url = $path;
                                } else {
                                    $url = Storage::url($path);
                                }
                                $html .= '<img src="' . $url . '" style="max-width:200px; margin:5px;" />';
                            }
                        }
                        if (filled($get('gambarUrl'))) {
                            $html .= '<img src="' . $get('gambarUrl') . '" style="max-width:200px; margin:5px;" />';
                        }

                        return new HtmlString($html);
                    })
                    ->extraAttributes(['class' => 'prose max-w-full']),
            ])
            ->columns(1); // ini yang bikin semua turun ke bawah
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    // ->width('450px') // atur lebar kolom
                    // ->wrap() // biar teks turun ke bawah kalau panjang
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->deskripsi),

                // Gabungan gambar lokal & URL
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->getStateUsing(function ($record) {
                        if ($record->gambar) {
                            return asset('storage/' . $record->gambar);
                        } elseif ($record->gambarUrl) {
                            return $record->gambarUrl;
                        }
                        return null;
                    })
                    ->square()
                    ->height(80)
                    ->width(80),

                Tables\Columns\TextColumn::make('gambarUrl')
                    ->label('URL Gambar')
                    ->url(fn ($record) => $record->gambarUrl)
                    ->openUrlInNewTab()
                    ->limit(30),
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
            'index' => Pages\ListGaleri::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Galeri';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Galeri';
    }

}
