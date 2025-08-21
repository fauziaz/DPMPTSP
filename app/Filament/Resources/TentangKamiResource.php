<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TentangKamiResource\Pages;
use App\Models\TentangKami;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class TentangKamiResource extends Resource
{
    protected static ?string $model = TentangKami::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Tentang Kami';
    protected static ?string $pluralLabel   = 'Tentang Kami';
    protected static ?string $navigationGroup = 'Profil';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // === PROFIL ===
            Forms\Components\Section::make('Profil')
                ->collapsible()
                ->schema([                    
                    Forms\Components\TextInput::make('profil_title')
                        ->label('Judul Profil')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('profil_description')
                        ->label('Deskripsi Profil')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('profil_image')
                        ->label('Upload Gambar Profil')
                        ->image()
                        ->maxFiles(1)
                        ->preserveFilenames()
                        ->directory('tentangkami')
                        ->disk('public'),

                    Forms\Components\TextInput::make('profil_image_url')
                        ->label('Link Gambar Profil'),

                    Forms\Components\Placeholder::make('profil_image_preview')
                        ->label('Preview')
                        ->content(function ($get) {
                            $path = is_array($get('profil_image'))
                                ? ($get('profil_image')[0] ?? null)
                                : $get('profil_image');

                            $url = $path ? Storage::url($path) : null;

                            if (filled($get('profil_image_url'))) {
                                $url = $get('profil_image_url');
                            }

                            return $url
                                ? new HtmlString('<img src="' . $url . '" style="max-width:200px; margin:5px;" />')
                                : null;
                        }),
                ]),

            // === MAKLUMAT ===
            Forms\Components\Section::make('Maklumat')
                ->collapsible()
                ->schema([
                    Forms\Components\FileUpload::make('maklumat_image')
                        ->label('Upload Gambar Maklumat')
                        ->image()
                        ->maxFiles(1)
                        ->preserveFilenames()
                        ->directory('tentangkami')
                        ->disk('public'),

                    Forms\Components\TextInput::make('maklumat_image_url')
                        ->label('Link Gambar Maklumat'),

                    Forms\Components\Placeholder::make('maklumat_image_preview')
                        ->label('Preview')
                        ->content(function ($get) {
                            $path = is_array($get('maklumat_image'))
                                ? ($get('maklumat_image')[0] ?? null)
                                : $get('maklumat_image');

                            $url = $path ? Storage::url($path) : null;

                            if (filled($get('maklumat_image_url'))) {
                                $url = $get('maklumat_image_url');
                            }

                            return $url
                                ? new HtmlString('<img src="' . $url . '" style="max-width:200px; margin:5px;" />')
                                : null;
                        }),
                ]),

            // === MOTTO ===
            Forms\Components\Section::make('Motto')
                ->collapsible()
                ->schema([
                    Forms\Components\FileUpload::make('motto_image')
                        ->label('Upload Gambar Motto')
                        ->image()
                        ->maxFiles(1)
                        ->preserveFilenames()
                        ->directory('tentangkami')
                        ->disk('public'),

                    Forms\Components\TextInput::make('motto_image_url')
                        ->label('Link Gambar Motto'),

                    Forms\Components\Placeholder::make('motto_image_preview')
                        ->label('Preview')
                        ->content(function ($get) {
                            $path = is_array($get('motto_image'))
                                ? ($get('motto_image')[0] ?? null)
                                : $get('motto_image');

                            $url = $path ? Storage::url($path) : null;

                            if (filled($get('motto_image_url'))) {
                                $url = $get('motto_image_url');
                            }

                            return $url
                                ? new HtmlString('<img src="' . $url . '" style="max-width:200px; margin:5px;" />')
                                : null;
                        }),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('profil_title')
                ->label('Judul')
                ->searchable(),

            Tables\Columns\TextColumn::make('profil_description')
                ->label('Deskripsi')
                ->limit(50)
                ->html()
                ->sortable(),

            Tables\Columns\ImageColumn::make('profil_image')
                ->label('Profil')
                ->getStateUsing(fn ($record) =>
                    is_array($record->profil_image)
                        ? ($record->profil_image[0] ?? null)
                        : $record->profil_image
                ),

            Tables\Columns\ImageColumn::make('maklumat_image')
                ->label('Maklumat')
                ->getStateUsing(fn ($record) =>
                    is_array($record->maklumat_image)
                        ? ($record->maklumat_image[0] ?? null)
                        : $record->maklumat_image
                ),

            Tables\Columns\ImageColumn::make('motto_image')
                ->label('Motto')
                ->getStateUsing(fn ($record) =>
                    is_array($record->motto_image)
                        ? ($record->motto_image[0] ?? null)
                        : $record->motto_image
                ),

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
            'index'  => Pages\ListTentangKamis::route('/'),
            'create' => Pages\CreateTentangKami::route('/create'),
            'edit'   => Pages\EditTentangKami::route('/{record}/edit'),
        ];
    }
}