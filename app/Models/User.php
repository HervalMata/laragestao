<?php

namespace GestaoTrocas\Models;

use Bootstrapper\Interfaces\TableInterface;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GestaoTrocas\Models\Unit;

class User extends Authenticatable implements TableInterface
{
    use Notifiable;
    use FormAccessible;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enolment', 'name', 'email', 'password', 'unit_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function formUnitsAttribute()
    {
        return $this->unit->pluck('id')->all();
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return [
            'Id',
            'Unidade',
            'Chave',
            'Nome',
            'Email',
        ];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'Id' :
                return $this->id;
            case 'Unidade' :
                return $this->unit->name;
            case 'Chave' :
                return $this->enrolment;
            case 'Nome' :
                return $this->name;
            case 'Email' :
                return $this->email;
        };
    }
}
