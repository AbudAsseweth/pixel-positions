<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    protected function logo(): Attribute
    {
        return Attribute::make(
            get: function (string $logo) {
                if (Storage::exists($logo)) {
                    return asset('storage/' . $logo);
                } else {
                    return "https://via.placeholder.com/640x480.png/0000aa?text=quia";
                }
            },
        );
    }
}
