<?php

namespace App\View\Components;

use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotificationMessage extends Component
{
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slug = '404_error')
    {
        $this->message = Message::where('slug', $slug)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.notification-message');
    }
}
