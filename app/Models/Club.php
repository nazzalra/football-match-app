<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['name','city'];

    public function homeMatches(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'club_matches', 'home_club_id', 'away_club_id')->withPivot('home_score', 'away_score');
    }

    public function awayMatches(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'club_matches', 'away_club_id', 'home_club_id')->withPivot('home_score', 'away_score');
    }

    public function getMatchCountAttribute()
    {
        return $this->homeMatches()->count() + $this->awayMatches()->count();
    }

    public function getWinCountAttribute()
    {
        return $this->home_win_count + $this->away_win_count;
    }

    public function getHomeWinCountAttribute()
    {
        return $this->homeMatches()->where(function($query){
            $query->whereRaw('home_score > away_score');
        })->count();
    }

    public function getAwayWinCountAttribute()
    {
        return $this->awayMatches()->where(function($query){
            $query->whereRaw('home_score < away_score');
        })->count();
    }

    public function getDrawCountAttribute()
    {
        return $this->home_draw_count + $this->away_draw_count;
    }

    public function getHomeDrawCountAttribute()
    {
        return $this->homeMatches()->where(function($query){
            $query->whereRaw('home_score = away_score');
        })->count();
    }

    public function getAwayDrawCountAttribute()
    {
        return $this->awayMatches()->where(function($query){
            $query->whereRaw('home_score = away_score');
        })->count();
    }

    public function getLoseCountAttribute()
    {
        return $this->home_lose_count + $this->away_lose_count;
    }

    public function getHomeLoseCountAttribute()
    {
        return $this->homeMatches()->where(function($query){
            $query->whereRaw('home_score < away_score');
        })->count();
    }

    public function getAwayLoseCountAttribute()
    {
        return $this->awayMatches()->where(function($query){
            $query->whereRaw('home_score > away_score');
        })->count();
    }

    public function getGoalInCountAttribute()
    {
        return $this->homeMatches()->sum('home_score') + $this->awayMatches()->sum('away_score');
    }

    public function getGoalConcedeCountAttribute()
    {
        return $this->homeMatches()->sum('away_score') + $this->awayMatches()->sum('home_score');
    }

    public function getPointCountAttribute()
    {
        return ($this->win_count * 3) + ($this->draw_count * 1) + 0;
    }

    public function getGoalDifferenceAttribute()
    {
        return $this->goal_in_count - $this->goal_concede_count;
    }

}
