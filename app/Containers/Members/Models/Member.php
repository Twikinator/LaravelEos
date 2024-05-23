<?php

namespace App\Models;
namespace App\Containers\Members\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberTag;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'date_of_birth',
    ];
    
    //defines a relationship between the MemberTag and Member models
    public function tags()
    {
        return $this->hasMany(MemberTag::class);
    }
}
