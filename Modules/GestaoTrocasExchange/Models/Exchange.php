<?php

namespace GestaoTrocasExchange\Models;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
        'unit_id',
        'user1_id',
        'team1_id',
        'user2_id',
        'team2_id',
        'date1',
        'turn1_id',
        'type1_id',
        'type2_id',
        'date2',
        'turn2_id',
        'type3_id',
        'type4_id',
        'situation_id'
    ];
}
