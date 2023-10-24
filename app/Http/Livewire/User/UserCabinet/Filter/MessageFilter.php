<?php

namespace App\Http\Livewire\User\UserCabinet\Filter;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class MessageFilter extends Component
{
    use WithPagination;

    public $selectFilter = 1;

    public function render()
    {
        $contactsQuery = Contact::withTrashed()->where('email', auth()->user()->email);
        if ($this->selectFilter == 2) {
            $contactsQuery->where('is_read', true);
            $this->resetPage();
        } elseif ($this->selectFilter == 3) {
            $contactsQuery->where('is_read', false);
            $this->resetPage();
        }

        $contacts = $contactsQuery->paginate(2);
        return view('livewire.user.user-cabinet.filter.message-filter', ['messages' => $contacts]);
    }

}
