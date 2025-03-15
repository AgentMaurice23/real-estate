<?php

namespace App\Filament\Resources\LandResource\Pages;

use App\Filament\Resources\LandResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditLand extends EditRecord
{
    protected static string $resource = LandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
 
        Notification::make()
            ->title('Saved successfully')
            ->icon('heroicon-o-document-text')
            ->iconColor('success')
            ->send()
        ];
    }
}
