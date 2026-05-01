<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class NewsletterForm extends Component
{
    public $email;

    public $notice;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.newsletter-form');
    }

    public function subscribe()
    {
        $this->validate();

        // send email for subscription
        if (! Newsletter::isSubscribed($this->email)) {
            Newsletter::subscribe($this->email);
        }

        session()->flash('notice', 'Welcome! You have been subscribed!');

        $this->reset();
    }
}
