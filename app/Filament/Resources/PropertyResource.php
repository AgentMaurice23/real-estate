<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = 'Properties Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Titre'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Description'),
                Forms\Components\TextInput::make('surface')
                    ->required()
                    ->label('Surface (m²)'),
                Forms\Components\Select::make('type')
                    ->options([
                        'Appartement' => 'Appartement',
                        'Maison' => 'Maison',
                        'Studio' => 'Studio',
                        'Terrain' => 'Terrain',
                    ])
                    ->required()
                    ->label('Type'),
                Forms\Components\TextInput::make('rooms')
                    ->required()
                    ->label('Pièces'),
                Forms\Components\TextInput::make('bedrooms')
                    ->required()
                    ->label('Chambres'),
                Forms\Components\TextInput::make('floor')
                    ->label('Étage'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->label('Prix (CFA)'),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->label('Ville'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->label('Adresse'),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->label('Code Postal'),
                Forms\Components\Toggle::make('sold')
                    ->label('Vendu'),
                Forms\Components\FileUpload::make('fichiers')
                    ->label('Fichiers')
                    ->disk('public')
                    ->multiple() 
                    ->directory('properties')
                    ->acceptedFileTypes(['.jpeg', '.png', '.jpg', '.pdf']),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->label('Pays'),
                Forms\Components\TextInput::make('university')
                    ->label('Université'),
                Forms\Components\TextInput::make('year_construction')
                    ->label('Année de Construction'),
                Forms\Components\Select::make('statuts')
                    ->options([
                        'en_attente' => 'En attente',
                        'approuver' => 'Approuvé',
                        'rejeter' => 'Rejeté',
                    ])
                    ->default('en_attente')
                    ->label('Statuts')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => Auth::id()), // Utilise l'ID de l'utilisateur authentifié
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre'),
                Tables\Columns\TextColumn::make('type')->label('Type'),
                Tables\Columns\TextColumn::make('price')->label('Prix (CFA)'),
                Tables\Columns\TextColumn::make('city')->label('Ville'),
                Tables\Columns\TextColumn::make('address')->label('Adresse'),
                Tables\Columns\TextColumn::make('postal_code')->label('Code Postal'),
                Tables\Columns\TextColumn::make('statuts')->label('Statuts'),

                Tables\Columns\BooleanColumn::make('sold')
                ->label('Vendu'),
            
                ])
            ->filters([
                // Ajoutez ici les filtres nécessaires si besoin
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

    public static function getRelations(): array
    {
        return [
            // Ajoutez ici les relations nécessaires si besoin
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
