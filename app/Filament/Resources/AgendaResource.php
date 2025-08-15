<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Filament\Resources\AgendaResource\RelationManagers;
use App\Models\AgendaModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;

class AgendaResource extends Resource
{
    protected static ?string $model = AgendaModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Agenda';
    protected static ?string $pluralLabel = 'Daftar Agenda';
    protected static ?string $navigationGroup = 'Dokumen dan Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\FileUpload::make('path_gambar')
                    ->label('Upload Gambar')
                    ->directory('agenda')
                    ->image()
                    ->reactive(),

                Forms\Components\TextInput::make('url_gambar')
                    ->label('URL Gambar')
                    ->url()
                    ->maxLength(255)
                    ->reactive(), 

                Placeholder::make('preview_gambar')
                    ->label('Preview Gambar')
                    ->visible(fn ($get) => filled($get('path_gambar')) || filled($get('url_gambar')))
                    ->content(function ($get) {
                        if (filled($get('path_gambar'))) {
                            return new HtmlString('<img src="' . asset('storage/' . $get('path_gambar')) . '" style="max-width:200px" />');
                        }
                        if (filled($get('url_gambar'))) {
                            return new HtmlString('<img src="' . $get('url_gambar') . '" style="max-width:200px" />');
                        }
                        return '';
                    })
                    ->extraAttributes(['class' => 'prose max-w-full']),
                

                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi')
                    ->nullable(),
                    
                Forms\Components\Grid::make(2) // jumlah kolomnya 3
                ->schema([
                    Forms\Components\Select::make('tipe_acara')
                        ->required()
                        ->options([
                            'Umum' => 'Umum',
                        ]),
                    
                    Forms\Components\Select::make('kategori')
                        ->required()
                        ->options([
                            'Hiburan' => 'Hiburan',
                            'Pendidikan' => 'Pendidikan',
                            'Sosial Budaya' => 'Sosial Budaya',
                            'Olahraga' => 'Olahraga',
                            'Lingkungan' => 'Lingkungan',
                        ]),
                    ]),
                
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),

                Forms\Components\Grid::make(2) // jumlah kolomnya 3
                ->schema([
                    Forms\Components\TimePicker::make('waktu_mulai')
                        ->required(),
                    
                    Forms\Components\TimePicker::make('waktu_selesai')
                        ->required(),
                ]),

                Forms\Components\Grid::make(2) // jumlah kolomnya 2
                ->schema([   
                    Forms\Components\Select::make('tipe_event')
                        ->options(AgendaModel::tipeEventOptions())
                        ->nullable(),

                    Forms\Components\Select::make('sifat_acara')
                        ->options(AgendaModel::sifatAcaraOptions())
                        ->nullable(),
                ]),

                Forms\Components\TextInput::make('lokasi')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('google_map')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('link_acara')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('website')
                    ->nullable()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tag')
                    ->nullable()
                    ->maxLength(255),

            ])
            ->columns(1); 
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\ImageColumn::make('path_gambar')
                ->label('Gambar')
                ->getStateUsing(fn ($record) => $record->path_gambar ? asset('storage/' . $record->path_gambar) : ($record->url_gambar ?? null))
                ->square()
                ->height(80)
                ->width(80),

            Tables\Columns\TextColumn::make('url_gambar')
                ->label('URL Gambar')
                ->url(fn ($record) => $record->url_gambar)
                ->openUrlInNewTab()
                ->limit(30),

            Tables\Columns\TextColumn::make('judul')
                ->label('Judul')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(30)
                ->tooltip(fn ($record) => $record->deskripsi),

            Tables\Columns\TextColumn::make('kategori')
                ->label('Kategori')
                ->sortable(),

            Tables\Columns\TextColumn::make('tipe_acara')
                ->label('Tipe Acara')
                ->sortable(),

            Tables\Columns\TextColumn::make('tanggal')
                ->label('Tanggal')
                ->date()
                ->sortable(),

                Tables\Columns\TextColumn::make('waktu_mulai')
                ->label('Mulai')
                ->formatStateUsing(fn($state) => $state ? date('H:i', strtotime($state)) : '-')
                ->sortable(),

            Tables\Columns\TextColumn::make('waktu_selesai')
                ->label('Selesai')
                ->formatStateUsing(fn($state) => $state ? date('H:i', strtotime($state)) : '-')
                ->sortable(),

                Tables\Columns\TextColumn::make('status_dinamis')
                    ->label('Status')
                    ->getStateUsing(fn ($record) => $record->status_dinamis ?? '-')
                    ->sortable(false),

            Tables\Columns\TextColumn::make('tipe_event')
                ->label('Tipe Event'),
                // ->formatStateUsing(fn($state) => is_scalar($state) && $state !== null ? (AgendaModel::tipeEventOptions()[$state] ?? '-') : '-'),

            Tables\Columns\TextColumn::make('sifat_acara')
                ->label('Sifat Acara'),
                // ->formatStateUsing(fn($state) => is_scalar($state) && $state !== null ? (AgendaModel::sifatAcaraOptions()[$state] ?? '-') : '-'),


            // Tables\Columns\TextColumn::make('tipe_event')
            //     ->label('Tipe Event')
            //     ->formatStateUsing(fn($state) => AgendaModel::tipeEventOptions()[$state] ?? '-'),

            // Tables\Columns\TextColumn::make('sifat_acara')
            //     ->label('Sifat Acara')
            //     ->formatStateUsing(fn($state) => AgendaModel::sifatAcaraOptions()[$state] ?? '-'),


            // Tables\Columns\TextColumn::make('waktu')
            //     ->label('Waktu')
            //     ->formatStateUsing(fn($record) =>
            //         ($record->waktu_mulai ? $record->waktu_mulai->format('H:i') : '-') . ' - ' .
            //         ($record->waktu_selesai ? $record->waktu_selesai->format('H:i') : '-')
            //     )
            //     ->sortable(false),

            // Tables\Columns\TextColumn::make('tipe_sifat')
            //     ->label('Tipe & Sifat')
            //     ->formatState(function($record) {
            //         if (!$record) return '- / -';

            //         $tipe = AgendaModel::tipeEventOptions()[$record->tipe_event] ?? '-';
            //         $sifat = AgendaModel::sifatAcaraOptions()[$record->sifat_acara] ?? '-';

            //         return $tipe . ' / ' . $sifat;
            //     }),

            // Tables\Columns\TextColumn::make('status_dinamis')
            //     ->label('Status')
            //     ->formatState(fn($state = null) => $state ?? '-'),

            Tables\Columns\TextColumn::make('lokasi')->label('Lokasi')->limit(30),
            Tables\Columns\TextColumn::make('link_acara')->label('Link Acara')->limit(30),
            Tables\Columns\TextColumn::make('google_map')->label('Google Map')->limit(30),
            Tables\Columns\TextColumn::make('website')->label('Website')->limit(30),
            Tables\Columns\TextColumn::make('tag')->label('Tag')->limit(30),
        ])
        ->filters([
            // Filter::make('status_dinamis')
            //     ->label('Status Dinamis')
            //     ->form([
            //         Forms\Components\Select::make('value')
            //             ->options([
            //                 'Belum Dimulai' => 'Belum Dimulai',
            //                 'Berlangsung' => 'Berlangsung',
            //                 'Selesai' => 'Selesai',
            //             ])
            //             ->placeholder('Pilih status...'),
            //     ])
            //     ->query(function (Builder $query, array $data) {
            //         if (empty($data['value'])) {
            //             return;
            //         }

            //         $now = now();

            //         return match ($data['value']) {
            //             'Belum Dimulai' => $query->whereRaw("STR_TO_DATE(CONCAT(tanggal, ' ', waktu_mulai), '%Y-%m-%d %H:%i:%s') > ?", [$now]),
            //             'Berlangsung' => $query->whereRaw("STR_TO_DATE(CONCAT(tanggal, ' ', waktu_mulai), '%Y-%m-%d %H:%i:%s') <= ? AND STR_TO_DATE(CONCAT(tanggal, ' ', waktu_selesai), '%Y-%m-%d %H:%i:%s') >= ?", [$now, $now]),
            //             'Selesai' => $query->whereRaw("STR_TO_DATE(CONCAT(tanggal, ' ', waktu_selesai), '%Y-%m-%d %H:%i:%s') < ?", [$now]),
            //             default => $query,
            //         };
            //     }),
            // SelectFilter::make('tipe_event')
            //     ->options(AgendaModel::tipeEventOptions()),
        ])
        ->actions([
            Actions\ViewAction::make(),
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Actions\BulkActionGroup::make([
                Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Agenda';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Agenda';
    }
}
