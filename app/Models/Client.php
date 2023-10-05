<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'surname', 'email',
    ];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'client_companies');
    }
}
