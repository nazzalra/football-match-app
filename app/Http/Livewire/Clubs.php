<?php

namespace App\Http\Livewire;

use App\Models\Club;
use Livewire\Component;

class Clubs extends Component
{
    public $name = '';
    public $city = '';

    protected $rules = [
        'name' => 'required|unique:clubs',
        'city' => 'required'
    ];

    protected $messages = [
        '*.required' => 'Wajib diisi',
        'name.unique' => 'Nama klub sudah digunakan'
    ];

    public function render()
    {
        return view('livewire.clubs');
    }

    public function submit()
    {
        $validated = $this->validate();
        Club::create($validated);
    }

    public function updated($propertyName)
    {
        $this->resetErrorBag($propertyName);
    }
}
