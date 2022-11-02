<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'Apenas um teste 2';

    protected $rules =[
        'content'=> 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(10);

        return view('livewire.show-tweets',[
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        $this->validate();

       auth()->user()->tweets()->create([
        'content'=>$this->content,
       ]);

        $this->content = '';
    }
}
