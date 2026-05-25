<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Este modelo representa a los usuarios de nuestra aplicación.
 * Hereda de Authenticatable para que Laravel pueda gestionar el inicio de sesión.
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Campos que se pueden rellenar al crear o editar un usuario.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'profile_photo_url',
    ];

    /**
     * Campos que Laravel debe ocultar cuando convertimos el modelo a JSON (por seguridad).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting de atributos: asegura que la contraseña siempre se guarde cifrada (hashed)
     * y que las fechas sean objetos Carbon.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación: Un usuario puede realizar muchos pedidos.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}