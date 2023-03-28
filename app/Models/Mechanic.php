<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\Owner;
use App\Models\Car;

class Mechanic extends Model
{
    use HasFactory;
   //  public function car(){
   //     return $this->hasOne(Car::class);
   //  }

   public function owner(): HasOneThrough{
      return $this->hasOneThrough(Owner::class, Car::class);
   }

   public function owners(): HasManyThrough{
      return $this->hasManyThrough(Owner::class, Car::class);
   }
}
