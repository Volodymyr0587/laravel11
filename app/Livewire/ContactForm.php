<?php

namespace App\Livewire;

use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|string|min:2|max:255',
        'email' => 'required|email|min:3|max:255',
        'message' => 'required|string|min:2|max:1000',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $validatedData = $this->validate();

        // Send Email
        try {
            Mail::to('support@domain.com')->send(New ContactUsMail($validatedData));

            Session()->flash('success', 'Message sent successfully!');
        } catch (\Throwable $th) {
            Session()->flash('error', 'Failed to send message. Please try again later.');
        }


        $this->reset();
    }
}
