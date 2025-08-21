<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StrukturOrganisasiResource\Pages;
use App\Models\StrukturOrganisasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static ?string $navigationIcon   = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel  = 'Struktur Organisasi';
    protected static ?string $pluralLabel      = 'Struktur Organisasi';
    protected static ?string $navigationGroup  = 'Profil';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Struktur Organisasi')
                ->collapsible()
                ->schema([
                    Forms\Components\FileUpload::make('gambar')
                        ->label('Upload Gambar Struktur Organisasi')
                        ->image()
                        ->maxFiles(1)
                        ->preserveFilenames()
                        ->directory('struktur-organisasi')
                        ->disk('public')
                        ->required(),

                    Forms\Components\TextInput::make('button_text')
                        ->label('Teks Tombol')
                        ->default('Lihat Detail Struktur')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('button_link')
                        ->label('Link Tombol')
                        ->url()
                        ->nullable(),

                    Forms\Components\Placeholder::make('preview')
                        ->label('Preview')
                        ->content(function ($get) {
                            $path = is_array($get('gambar'))
                                ? ($get('gambar')[0] ?? null)
                                : $get('gambar');

                            $url = $path ? Storage::url($path) : null;

                            return $url
                                ? new HtmlString('<img src="' . $url . '" style="max-width:300px; margin:10px;" />')
                                : null;
                        }),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('gambar')
                ->label('Gambar Struktur'),
            Tables\Columns\TextColumn::make('button_text')
                ->label('Teks Tombol'),
            Tables\Columns\TextColumn::make('button_link')
                ->label('Link Tombol')
                ->url(true)
                ->limit(50),
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

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListStrukturOrganisasis::route('/'),
            'create' => Pages\CreateStrukturOrganisasi::route('/create'),
            'edit'   => Pages\EditStrukturOrganisasi::route('/{record}/edit'),
        ];
    }
}
