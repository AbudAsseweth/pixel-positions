<?php

namespace App\Models;

use App\Enums\JobSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $guarded = [
        "id",
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag($name)
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected function casts(): array
    {
        return [
            'schedule' => JobSchedule::class,
        ];
    }
}
