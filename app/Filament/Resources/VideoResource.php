<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\VideoModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\TextColumn;

class VideoResource extends Resource
{
    protected static ?string $model = VideoModel::class;
    protected static ?string $navigationLabel = 'Video';
    protected static ?string $pluralLabel = 'Video';
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
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

                Forms\Components\FileUpload::make('video')
                    ->label('Upload Video')
                    ->directory('video')
                    ->acceptedFileTypes(['video/mp4', 'video/webm'])
                    ->reactive(),

                Forms\Components\TextInput::make('videoUrl')
                    ->label('URL Video')
                    ->url()
                    ->maxLength(255)
                    ->reactive(),

                Placeholder::make('preview_video')
                    ->label('Preview Video')
                    ->content(function ($get) {
                        $src = null;

                        if (filled($get('video'))) {
                            $src = asset('storage/' . $get('video'));
                            return new HtmlString('<video src="' . $src . '" style="max-width:300px" controls></video>');
                        } elseif (filled($get('videoUrl'))) {
                            $url = $get('videoUrl');

                            // Kalau URL adalah YouTube, ubah jadi embed link
                            if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches) || preg_match('/v=([^\&]+)/', $url, $matches)) {
                                $videoId = $matches[1];
                                $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                                return new HtmlString('<iframe width="300" height="170" src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>');
                            }

                            // Kalau bukan YouTube, coba tampilkan langsung
                            return new HtmlString('<video src="' . $url . '" style="max-width:300px" controls></video>');
                        }

                        return new HtmlString('<span style="color:gray">Tidak ada video</span>');
                })
                ->extraAttributes(['class' => 'prose max-w-full']),
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

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->deskripsi),

                Tables\Columns\TextColumn::make('videoUrl')
                    ->label('URL Video')
                    ->url(fn ($record) => $record->videoUrl)
                    ->openUrlInNewTab()
                    ->limit(30),

                TextColumn::make('video')
                    ->label('Video')
                    ->formatStateUsing(function ($state, $record) {
                        // Jika ada video lokal
                        if ($record->video) {
                            $src = asset('storage/' . $record->video);
                            return new HtmlString('<video src="' . $src . '" style="max-width:150px; height:80px;" controls></video>');
                        }

                        // Jika ada URL video
                        if ($record->videoUrl) {
                            $url = $record->videoUrl;

                            // Cek kalau URL YouTube, ambil video ID untuk embed iframe
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|embed)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches)) {
                                $videoId = $matches[1];
                                $embedUrl = "https://www.youtube.com/embed/" . $videoId;
                                return new HtmlString('<iframe width="150" height="80" src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>');
                            }

                            // Kalau URL video biasa (mp4/webm), tampilkan video HTML5
                            return new HtmlString('<video src="' . $url . '" style="max-width:150px; height:80px;" controls></video>');
                        }

                        return '-';
                    })
                    ->html()
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
            'index' => Pages\ListVideo::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Video';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Video';
    }
}
