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
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'User created.');
        $this->resetCreateForm();
        return redirect()->to('/users/management');
    }

    public function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }
}
