<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace GestaoTrocas\Models{
/**
 * GestaoTrocas\Models\Unit
 *
 * @property int $id
 * @property string $name
 * @property string $sector
 * @property string $state
 * @property string $city
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereSector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUnidades\Models\Unit whereUpdatedAt($value)
 */
	class Unit extends \Eloquent {}
}

namespace GestaoTrocas\Models{
/**
 * GestaoTrocas\Models\User
 *
 * @property int $id
 * @property string $enrolment
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $unit_id
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \GestaoTrocasUnidades\Models\Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereEnrolment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\GestaoTrocasUser\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

