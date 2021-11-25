<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use withFileUploads;

    public $name, $cover;

    protected $rules = [
        'cover' => [
            'required',
            'max:1024',
            'mimes:jpeg,jpg,png'
        ],
        'name' => [
            'required'
        ],
    ];


    public function uploadCoverImage()
    {

        $cover_name = time() . '_' . $this->cover->getClientOriginalName();

        $this->cover->storeAs('covers', $cover_name, 'public');

        Video::create([
            'name' => $this->name,
            'cover' => $cover_name
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->uploadCoverImage();

        $this->reset();

        return redirect()->route('dashboard')->with('success', 'Video created successfully');
    }

    public function render()
    {
        return view('livewire.video.create');
    }
}
