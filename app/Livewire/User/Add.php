<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Add extends Component
{
    public $name, $email, $role, $password;

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'email'],
        'role'=> ['required', 'string'],
        'password'=> ['required', 'string', 'min:8'],
    ];

    public function create(){
        $user = $this->validate();

        User::create($user);

        toastr()->success('User added');

        $this->redirectRoute('users.list');
    }

    public function render()
    {
        return view('livewire.user.add');
    }
}
