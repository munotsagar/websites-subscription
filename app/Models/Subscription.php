<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Websites;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscription';

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function websites()
    {
        return $this->belongsToMany(Websites::class, 'website_id');
    }
}
