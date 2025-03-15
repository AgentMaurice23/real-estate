<?php
namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Users Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nom'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->label('Mot de passe'),
                Forms\Components\TextInput::make('address')
                    ->label('Adresse'),
                Forms\Components\TextInput::make('phone')
                    ->label('Téléphone'),
                Forms\Components\DatePicker::make('birthdate')
                    ->label('Date de naissance'),
                Forms\Components\TextInput::make('role')
                    ->label('Rôle'),
                Forms\Components\TextInput::make('country')
                    ->label('Pays'),
                Forms\Components\TextInput::make('city')
                    ->label('Ville'),
                Forms\Components\Textarea::make('biographie')
                    ->label('Biographie'),
                Forms\Components\TextInput::make('profession')
                    ->label('Profession'),
                Forms\Components\FileUpload::make('profile_photo_path')
                    ->label('Photo de profil')
                    ->disk('public')
                    ->directory('users/profile_photo')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->storeFileNamesIn('profile_photo_path'),
                Forms\Components\FileUpload::make('identity_piece')
                    ->label('Pièce d\'identité')
                    ->disk('public')
                    ->directory('users/identity_piece')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'application/pdf'])
                    ->storeFileNamesIn('identity_piece'),
                Forms\Components\FileUpload::make('profile_cover_path')
                    ->label('Photo de couverture de profil')
                    ->disk('public')
                    ->directory('users/profile_cover')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->storeFileNamesIn('profile_cover_path'),
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
                Tables\Columns\TextColumn::make('name')->label('Nom'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone')->label('Téléphone'),
                Tables\Columns\TextColumn::make('role')->label('Rôle'),
                Tables\Columns\TextColumn::make('country')->label('Pays'),
                Tables\Columns\TextColumn::make('city')->label('Ville'),
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
            // Ajoutez ici les relations nécessaires si besoin
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
