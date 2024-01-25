<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'rooms',
        'beds',
        'bathrooms',
        'mq',
        'address',
        'lat',
        'lon',
        'photo',
        'visible',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function (Apartment $apartment) {
            $services = Service::inRandomOrder()->limit(rand(1, 7))->get();
            $apartment->services()->sync($services);
            $sponsorships = Sponsorship::inRandomOrder()->limit(rand(1, 3))->get();
            $apartment->sponsorships()->sync($sponsorships);
        });
    }
}