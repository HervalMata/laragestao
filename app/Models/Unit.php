<?php

namespace GestaoTrocas\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model implements TableInterface
{
    protected $fillable = [
        'name',
        'sector',
        'state',
        'city',
    ];

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
