<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * 
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'notifications',
    ];

    /**
     * 
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * 
     *
     * @var array
     */
    protected $casts = [
        'notifications' => 'boolean',
    ];
}
