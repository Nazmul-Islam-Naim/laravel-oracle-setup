<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $table = 'team_members';
    protected $fillable = [ 'team_id', 'name', 'designations', 'expert_in'];

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
