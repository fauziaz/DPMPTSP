<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilKadisResource\Pages;
use App\Filament\Resources\ProfilKadisResource\RelationManagers;
use App\Models\ProfilKadis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilKadisResource extends Resource
{
    protected static ?string $model = ProfilKadis::class;

    protected static ?string $navigationIcon   = 'heroicon-o-user';
    protected static ?string $navigationLabel  = 'Profil Kepala Dinas';
    protected static ?string $pluralLabel      = 'Profil Kepala Dinas';
    protected static ?string $navigationGroup  = 'Profil';

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
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('profil')
                    ->nullable(),
                Forms\Components\TextInput::make('foto_url')
                    ->label('Link Foto')
                    ->nullable()
                    ->url()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('biodata')
                    ->label('Biodata')
                    ->nullable()
                    ->columnSpanFull(),

                Forms\Components\Section::make('Riwayat Pendidikan')->schema([
                    Forms\Components\HasManyRepeater::make('pendidikans')
                        ->relationship('pendidikans', fn($query) => $query->orderByDesc('id'))
                        ->schema([
                            Forms\Components\TextInput::make('jurusan')
                                ->label('Jenjang/Jurusan')
                                ->required(),
                            Forms\Components\TextInput::make('institusi')
                                ->label('Institusi')
                                ->required(),
                        ])
                        ->createItemButtonLabel('Tambah Pendidikan'),
                ]),

                Forms\Components\Section::make('Riwayat Pekerjaan')->schema([
                    Forms\Components\HasManyRepeater::make('pekerjaans')
                        ->relationship('pekerjaans', fn($query) => $query->orderByDesc('id'))
                        ->schema([
                            Forms\Components\TextInput::make('jabatan')
                                ->label('Jabatan')
                                ->required(),
                            Forms\Components\TextInput::make('instansi')
                                ->label('Instansi')
                                ->required(),
                        ])
                        ->createItemButtonLabel('Tambah Pekerjaan'),
                ]),
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
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        if ($record->foto) {
                            return asset('storage/' . $record->foto);
                        } elseif ($record->foto_url) {
                            return $record->foto_url;
                        }
                        return null; // kosong kalau dua-duanya ga ada
                    })
                    ->square()
                    ->height(80)
                    ->width(80),                    
                Tables\Columns\TextColumn::make('biodata')
                    ->limit(50)
                    ->html()                    
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikans')
                    ->label('Riwayat Pendidikan')
                    ->formatStateUsing(function ($record) {
                        return $record->pendidikans
                            ->sortByDesc('id')
                            ->take(2)
                            ->map(function ($item) {
                                return ($item->jurusan ?? '-') . ': ' . ($item->institusi ?? '-');
                            })
                            ->implode("\n");
                    })
                    ->wrap(),

                Tables\Columns\TextColumn::make('pekerjaans')
                    ->label('Riwayat Pekerjaan')
                    ->formatStateUsing(function ($record) {
                        return $record->pekerjaans
                            ->sortByDesc('id')
                            ->take(2)
                            ->map(function ($item) {
                                return ($item->jabatan ?? '-') . ': ' . ($item->instansi ?? '-');
                            })
                            ->implode("\n");
                    })
                    ->wrap(),
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
            'index' => Pages\ListProfilKadis::route('/'),
            'create' => Pages\CreateProfilKadis::route('/create'),
            'edit' => Pages\EditProfilKadis::route('/{record}/edit'),
        ];
    }
}
