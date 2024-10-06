<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Signin extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => ['required','email'],
        'password' => ['required','min:8'],
    ];

    public function login(){
        $user = $this->validate();

        if(Auth::attempt(['email' => $user['email'], 'password' => $user['password']])){

            session()->regenerate();

            toastr()->success("Logged in successfully");

            $this->redirectIntended('/');

        }else{
            $this->addError('email', 'Invalid Email or password');
        }
    }

    public function render()
    {
        return view('livewire.auth.signin')->layout('components.layouts.auth');
    }
}
