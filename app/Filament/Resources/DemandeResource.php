<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemandeResource\Pages;
use App\Filament\Resources\DemandeResource\RelationManagers;
use App\Models\Profil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DemandeResource extends Resource
{
    protected static ?string $model = Profil::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationGroup = 'Users Management';
 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                fn (Builder $query) => $query->whereNotNull('phone')
                    ->whereNotNull('address')
                    ->whereNotNull('country')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nom'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone')->label('Téléphone'),
                Tables\Columns\TextColumn::make('address')->label('Adresse'),
                Tables\Columns\TextColumn::make('statuts')->label('Statuts'),

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDemandes::route('/'),
            'create' => Pages\CreateDemande::route('/create'),
            'edit' => Pages\EditDemande::route('/{record}/edit'),
        ];
    }
}
