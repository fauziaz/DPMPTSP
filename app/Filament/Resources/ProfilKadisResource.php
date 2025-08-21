<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilKadisResource\Pages;
use App\Models\ProfilKadis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class ProfilKadisResource extends Resource
{
    protected static ?string $model = ProfilKadis::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Profil Kepala Dinas';
    protected static ?string $pluralLabel   = 'Profil Kepala Dinas';
    protected static ?string $navigationGroup = 'Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Data Pimpinan')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Lengkap')
                            ->required(),

                        Forms\Components\TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->default('Kepala Dinas DPMPTSP Kota Tasikmalaya'),

                        // Upload Foto
                        Forms\Components\FileUpload::make('foto')
                            ->label('Upload Foto')
                            ->image()
                            ->maxFiles(1)
                            ->preserveFilenames()
                            ->directory('profil-pimpinan')
                            ->disk('public'),

                        // Link Foto
                        Forms\Components\TextInput::make('foto_url')
                            ->label('Link Foto (opsional)')
                            ->url(),

                        // Preview Foto
                        Forms\Components\Placeholder::make('foto_preview')
                            ->label('Preview Foto')
                            ->content(function ($get) {
                                $path = is_array($get('foto'))
                                    ? ($get('foto')[0] ?? null)
                                    : $get('foto');

                                $url = $path ? Storage::url($path) : null;

                                if (filled($get('foto_url'))) {
                                    $url = $get('foto_url');
                                }

                                return $url
                                    ? new HtmlString('<img src="' . $url . '" style="max-width:200px; margin:5px;" />')
                                    : new HtmlString('<span style="color:#888;">Belum ada foto</span>');
                            }),

                        Forms\Components\RichEditor::make('biodata')
                            ->label('Biodata Ringkas')
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('pendidikan')
                            ->schema([
                                Forms\Components\TextInput::make('judul')->label('Jenjang / Gelar'),
                                Forms\Components\TextInput::make('desc')->label('Keterangan'),
                            ])
                            ->collapsible()
                            ->label('Riwayat Pendidikan'),

                        Forms\Components\Repeater::make('pekerjaan')
                            ->schema([
                                Forms\Components\TextInput::make('judul')->label('Jabatan / Posisi'),
                            ])
                            ->collapsible()
                            ->label('Riwayat Pekerjaan'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable(),

                // Tampilkan Foto
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Upload')
                    ->getStateUsing(fn ($record) =>
                        is_array($record->foto)
                            ? ($record->foto[0] ?? null)
                            : $record->foto
                    ),

                Tables\Columns\ImageColumn::make('foto_url')
                    ->label('Foto Link'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfilKadis::route('/'),
            'create' => Pages\CreateProfilKadis::route('/create'),
            'edit' => Pages\EditProfilKadis::route('/{record}/edit'),
        ];
    }
}