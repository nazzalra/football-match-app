<?php

namespace App\Http\Livewire;

use App\Models\Club;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Matches extends Component
{
    public $isMultiple;

    public $allClubs = [];

    public $matches = [
        [
            'home' => [
                'club_id' => '',
                'score' => 0
            ],
            'away' => [
                'club_id' =>'',
                'score' => 0
            ],
        ],
    ];

    protected $messages = [
        'matches.*.*.club_id.required' => 'Pilih klub',
        'matches.*.*.score.required' => 'Tentukan skor',
        'matches.*.*.club_id.unique' => 'Pertandingan sudah pernah diselenggarakan'
    ];

    public function mount()
    {
        $this->allClubs = Club::all();
        // $this->resetMatches();
    }
    public function render()
    {
        return view('livewire.matches');
    }

    public function submit()
    {
        foreach($this->matches as $index => $match){
            $this->validate([
                'matches.'.$index.'.home.club_id' => Rule::unique('club_matches', 'home_club_id')->where('away_club_id', $match['away']['club_id']),
                'matches.'.$index.'.*.*' => 'required',
                
            ]);
        }
        foreach($this->matches as $index => $match){
            $club = Club::find($match['home']['club_id']);
            $club->homeMatches()->attach($match['away']['club_id'],[
                'home_score' => $match['home']['score'],
                'away_score' => $match['away']['score']
            ]);
        }
        return redirect()->route('classement');
    }

    public function updated($propertyName)
    {
        $this->resetErrorBag($propertyName);
    }


    public function addMatch()
    {
        $this->matches[] = [
            'home' => [
                'club_id' => '',
                'score' => 0
            ],
            'away' => [
                'club_id' => '',
                'score' => 0
            ]
        ];
    }

    public function removeMatch($index)
    {
        $this->resetErrorBag();
        unset($this->matches[$index]);
        $this->matches = array_values($this->matches);
    }

}
