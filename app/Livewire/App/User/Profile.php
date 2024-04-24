<?php

namespace App\Livewire\App\User;

use Filament\Forms;
use App\Models\User;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $state = [];

    public $photo;

    /** @var \App\Model\User */
    public $user;

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->state = $this->user?->withoutRelations()->toArray();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('first_name')->required(),
            TextInput::make('last_name')->required(),
            TextInput::make('email')->email()->required()->autocomplete(false),
            TextInput::make('mobile_number')->tel(),
            Select::make('user_type')
            ->options([
                '1' => 'Admin',
                '2' => 'Customer',
                '3' => 'Garage',
                '4' => 'Supplier',
            ]),
            Select::make('role_id')->label('Role')
            ->options([
                '1' => 'Super Admin',
                '2' => 'Employee',
                '3' => 'Customer',
                '4' => 'Garage',
                '5' => 'Supplier',
            ]),
        ])->statePath('state');
    }

    public function save(): void
    {
        $this->resetErrorBag();
        $this->validate();

        
        $this->user->forceFill([
            'first_name' => $this->state['first_name'],
            'last_name' => $this->state['last_name'],
            'email' => $this->state['email'],
            'mobile_number' => $this->state['mobile_number'],
            'user_type' => $this->state['user_type'],
            'role_id' => $this->state['role_id'],
        ])->save();

        Notification::make()->success()->title('Profile changed successfully.')->send();
    }


    public function getUserProperty(): ?Authenticatable
    {
        return Auth::user();
    }

    public function render()
    {
        return view('livewire.app.user.profile');
    }
}
