<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselImageResource\Pages;
use App\Filament\Resources\CarouselImageResource\RelationManagers;
use App\Models\CarouselImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarouselImageResource extends Resource
{
    protected static ?string $model = CarouselImage::class;

    protected static ?string $navigationLabel = 'Carousel'; // nama di sidebar
    protected static ?string $pluralLabel = 'Carousel'; // nama di judul halaman
    protected static ?string $navigationIcon = 'heroicon-o-photo'; // icon di sidebar

    protected static ?string $navigationGroup = 'Beranda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_path')
                    ->label('Upload Gambar')
                    ->directory('carousel-image')
                    ->image()
                    ->reactive(),

                Forms\Components\TextInput::make('image_url')
                    ->label('URL Gambar')
                    ->url()
                    ->maxLength(255)
                    ->reactive(), // penting biar bisa live update preview

                Placeholder::make('preview_gambar')
                    ->label('Preview Gambar')
                    ->visible(fn ($get) => filled($get('image_path')) || filled($get('image_url')))
                    ->content(function ($get) {
                        if (filled($get('image_path'))) {
                            return new HtmlString('<img src="' . asset('storage/' . $get('image_path')) . '" style="max-width:200px" />');
                        }
                        if (filled($get('gambarUrl'))) {
                            return new HtmlString('<img src="' . $get('image_url') . '" style="max-width:200px" />');
                        }
                        return '';
                    })
                    ->extraAttributes(['class' => 'prose max-w-full']),
            
                Forms\Components\TextInput::make('caption_title')
                    ->maxLength(255),
            
                Forms\Components\TextInput::make('caption_subtitle')
                    ->maxLength(255),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
             ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->getStateUsing(function ($record) {
                        if ($record->image_path) {
                            return asset('storage/' . $record->image_path);
                        } elseif ($record->image_url) {
                            return $record->image_url;
                        }
                        return null;
                    })
                    ->square()
                    ->height(80)
                    ->width(80),

                Tables\Columns\TextColumn::make('image_url')
                    ->label('URL Gambar')
                    ->url(fn ($record) => $record->image_url)
                    ->openUrlInNewTab()
                    ->limit(30),
                Tables\Columns\TextColumn::make('caption_title')
                    ->label('Caption Title'),
                Tables\Columns\TextColumn::make('caption_subtitle')
                    ->label('Caption Subtitle'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->defaultSort('order')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),              ])
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
            'index' => Pages\ListCarouselImages::route('/'),
            'create' => Pages\CreateCarouselImage::route('/create'),
            'edit' => Pages\EditCarouselImage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Carousel';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Carousel';
    }
}
