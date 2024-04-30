<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersForm extends Component
{

    public $name, $email, $password, $role;

    public function render()
    {
        return view('livewire.users-form');
    }

    public function store(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
        ]);

        session()->flash('message', 'User created.');
        $this->resetCreateForm();
    }

    public function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }
}
