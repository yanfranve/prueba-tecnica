<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci',
        'photo',
        'dni',
        'dni_type',
        'first_name',
        'last_name',
        'gender',
        'date_born',
        'telephone',
        'blood_type',
        'address',
        'contact',
    ];

    /**
     * Relación uno a muchos con Document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

