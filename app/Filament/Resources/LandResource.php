<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandResource\Pages;
use App\Models\Land;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LandResource extends Resource
{
    public static ?string $model = Land::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-pointing-out';

    protected static ?string $navigationGroup = 'Properties Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Titre'),
                Forms\Components\TextInput::make('surface')->label('Surface (m²)'),
                Forms\Components\TextInput::make('price')->label('Prix'),
                Forms\Components\Select::make('land_type')
                    ->options([
                        'Residentiel' => 'Résidentiel',
                        'Commercial' => 'Commercial',
                        'Agricultural' => 'Agricultural',
                    ])
                    ->label('Type de terrain'),
                Forms\Components\TextInput::make('city')->label('Ville'),
                Forms\Components\TextInput::make('address')->label('Adresse'),
                Forms\Components\TextInput::make('country')->label('Pays'),
                Forms\Components\TextInput::make('postal_code')->label('Code Postal'),
                Forms\Components\Toggle::make('availability')->label('Disponibilité'),
                Forms\Components\Textarea::make('description')->label('Description'),
                Forms\Components\FileUpload::make('images')
                    ->label('Images')
                    ->disk('public')
                    ->directory('images')
                    ->multiple()
                    ->acceptedFileTypes(['.jpeg', '.png', '.jpg']),
                Forms\Components\FileUpload::make('documents')
                    ->label('Documents')
                    ->disk('public')
                    ->directory('documents')
                    ->multiple()
                    ->acceptedFileTypes(['.pdf' ,'.doc','.docx']),
                Forms\Components\Select::make('statuts')
                    ->options([
                        'en_attente' => 'En attente',
                        'approuver' => 'Approuvé',
                        'rejeter' => 'Rejeté',
                    ])
                    ->default('en_attente')
                    ->label('Statuts')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre'),
                Tables\Columns\TextColumn::make('surface')->label('Surface (m²)'),
                Tables\Columns\TextColumn::make('price')->label('Prix'),
                Tables\Columns\TextColumn::make('land_type')->label('Type de terrain'),
                Tables\Columns\TextColumn::make('city')->label('Ville'),
                Tables\Columns\TextColumn::make('address')->label('Adresse'),
                Tables\Columns\TextColumn::make('country')->label('Pays'),
                Tables\Columns\BooleanColumn::make('availability')->label('Disponibilité'),
                Tables\Columns\TextColumn::make('statuts')->label('Statuts'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('changerStatut')
                    ->label('Répondre')
                    ->form([
                        Forms\Components\Select::make('statuts')
                            ->options([
                                'en_attente' => 'En attente',
                                'approuver' => 'Approuvé',
                                'rejeter' => 'Rejeté',
                            ])
                            ->required(),
                    ])
                    ->action(function ($record, $data) {
                        $record->update(['statuts' => $data['statuts']]);
                    }),
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
            'index' => Pages\ListLands::route('/'),
            'create' => Pages\CreateLand::route('/create'),
            'edit' => Pages\EditLand::route('/{record}/edit'),
        ];
    }
}
