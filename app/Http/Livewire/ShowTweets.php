<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;
    public $comment = '';
    protected $rules = [
        'comment' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(1);
        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();

        Auth::user()->tweets()->create([
            'comment' => $this->comment,
        ]);

        $this->comment = '';
    }

    public function like($id)
    {
        $tweet = Tweet::find($id);

        $tweet->likes()->create([
            'user_id' => Auth::user()->id,
        ]);
    }

    public function deslike(Tweet $tweet)
    {

        $tweet->likes()->delete();
    }
}
