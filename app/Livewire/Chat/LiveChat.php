<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class LiveChat extends Component
{
    public $message = '';
    public $user_id = '';
    public $reciver_id = '';
    public $toggle_chat = false;

    public function toggleChat()
    {
        $this->toggle_chat
            ? $this->toggle_chat = false
            : $this->toggle_chat = true;

        $this->reset('message');
        $this->resetValidation();
    }

    // public function sendToUser($reciver_id)
    // {
    //     $this->reciver_id = $reciver_id;
    // }

    public function sendMessage()
    {
        $validated = $this->validate([
            'message' => 'required|min:1|max:500'
        ]);

        $validated['user_id'] = auth()->user()->id;

        Chat::create($validated);
        $this->reset('message');
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.chat.live-chat', [
            // 'users' => User::where('id', '!=', auth()->user()->id)->get(),
            'messages' => Chat::with('user')->latest()->get()
        ]);
    }
}