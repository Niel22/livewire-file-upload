<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public $name;

    public $email;

    public $password;

    public $image;

    protected $rules = [
        'name' => ['required', 'string', 'min:5', 'max:50'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8'],
        'image' => ['nullable', 'sometimes', 'image', 'max:1024'],
    ];

    public function create()
    {

        // sleep(2);

        $user = $this->validate();

        if ($this->image) {
            $user['image'] = $this->image->store('uploads', 'public');
        }

        // dd($user);

        $user = User::create($user);

        $this->reset(['name', 'email', 'password', 'image']);

        session()->flash('success', 'User Created');

        $this->dispatch('user-created', $user);
    }
    
    public function ReloadList(){
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.registration-form');
    }
}
