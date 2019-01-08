<?php

namespace GestaoTrocasUser\Models;

use Bootstrapper\Interfaces\TableInterface;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GestaoTrocasUnidades\Models\Unit;

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
        'enrolment', 'name', 'email', 'password', 'unit_id'
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

    public static function generatePassword($password = null)
    {
        return !$password ? bcrypt(str_random(8)) : bcrypt($password);
    }

    public static function generateEnrolment()
    {
        return str_random(4);
    }

    public function unit()
    {
        return $this->belongsTo(\GestaoTrocasUnidades\Models\Unit::class);
    }

    public function formUnitsAttribute()
    {
        return $this->unit->pluck('id')->all();
    }

    public function formRolesAttribute()
    {
        return $this->role->pluck('id')->all();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param Collection/string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        return is_string($role) ?
            $this->roles->contains('name', $role) :
            (boolean) $role->intersect($this->roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRole(config('gestaotrocasuser.acl.role_admin'));
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
            'Role',
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
            case 'Role' :
                return $this->role->name;
        };
    }
}
