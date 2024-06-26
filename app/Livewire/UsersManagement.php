<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersManagement extends Component
{
    public $users;
    public $name, $email, $user_id, $role, $password;
    public $isModalOpen = false;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users-management');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User deleted.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->openModalPopover();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ]);
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role
        ]);
        session()->flash('message', $this->user_id ? 'User updated.'
            : 'User created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }
}
