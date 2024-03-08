<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course', 'stage'];

    //Para la multiplicidad, se usa el nombre en minúscula y plural
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
