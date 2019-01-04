<?php

namespace GestaoTrocasUnidades\Models;

use Bootstrapper\Interfaces\TableInterface;
use GestaoTrocas\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model implements TableInterface
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'sector',
        'state',
        'city',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getNameTrashedAttribute()
    {
        return $this->trashed() ? "{$this->name} (Inativa)" : $this->name;
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
            'Nome',
            'Setor',
            'Estado',
            'Cidade',
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
            case 'Nome' :
                return $this->name;
            case 'Setor' :
                return $this->sector;
            case 'Estado' :
                return $this->state;
            case 'Cidade' :
                return $this->city;
        };
    }
}
