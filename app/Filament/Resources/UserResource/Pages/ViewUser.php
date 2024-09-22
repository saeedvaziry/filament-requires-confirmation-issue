<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\Page;

class ViewUser extends Page implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    protected static string $resource = UserResource::class;

    protected static string $view = 'view';

    public User $user;

    public function mount(User $record): void
    {
        $this->user = $record;
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->user)
            ->schema([
                TextEntry::make('name')
                    ->suffixAction(
                        Action::make('test')
                            ->action(fn () => dd('test'))
                            ->button()
                            ->requiresConfirmation()
                    ),
            ]);
    }
}
