<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IKMResource\Pages;
use App\Filament\Resources\IKMResource\RelationManagers;
use App\Models\IKMModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IKMResource extends Resource
{
    protected static ?string $model = IKMModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'IKM';
    protected static ?string $pluralLabel = 'Daftar IKM';
    protected static ?string $navigationGroup = 'Layanan Publik';

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
                    ->rows(4)
                    ->required(),

                Forms\Components\TextInput::make('tahun')
                    ->label('Tahun')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y')),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                // Forms\Components\Select::make('tipe_file')
                //     ->label('Tipe File')
                //     ->options([
                //         'upload' => 'Upload File',
                //         'link' => 'Link Eksternal',
                //     ])
                //     ->required()
                //     ->reactive(),

                Forms\Components\FileUpload::make('file_path')
                    ->label('Upload File (PDF/DOCX/XLSX)')
                    ->directory('produk_hukum')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->nullable(), // Bisa tidak diisi

                Forms\Components\TextInput::make('file_url')
                    ->label('Link Eksternal')
                    ->url()
                    ->nullable(),

                Forms\Components\Select::make('format')
                    ->label('Format')
                    ->options([
                        'PDF'  => 'PDF',
                        'DOCX' => 'Word (DOCX)',
                        'XLSX' => 'Excel (XLSX)',
                    ]),

                Forms\Components\TextInput::make('tag')
                    ->label('Tag')
                    ->maxLength(255),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date(),

                Tables\Columns\TextColumn::make('downloads')
                    ->label('Jumlah Download')
                    ->sortable(),

                Tables\Columns\TextColumn::make('format')
                    ->label('Format'),

                Tables\Columns\TextColumn::make('tag')
                    ->label('Tag'),

                TextColumn::make('file_url')
                    ->label('File Eksternal')
                    ->url(fn ($record) => $record->file_url)
                    ->openUrlInNewTab(),

                TextColumn::make('file_path')
                    ->label('File Lokal')
                    ->url(fn ($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(true)
                    ->formatStateUsing(fn ($state) => 'Lihat PDF'),
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
            'index' => Pages\ListIKMS::route('/'),
            'create' => Pages\CreateIKM::route('/create'),
            'edit' => Pages\EditIKM::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'IKM';
    }

    public static function getPluralModelLabel(): string
    {
        return 'IKM';
    }
}
