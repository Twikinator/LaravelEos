<?php

namespace App\Containers\Members\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MemberTag;

class Member extends Model
{
    public const NAME = "name";
    public const SURNAME = "surname";
    public const EMAIL = "email";
    public const DATE_OF_BIRTH = "date_of_birth";
    use HasFactory;

    protected $fillable = [
        self::NAME,
        self::SURNAME,
        self::EMAIL,
        self::DATE_OF_BIRTH
    ];

    protected $casts = [
        self::NAME => 'string',
        self::SURNAME => 'string',
        self::EMAIL => 'string',
        self::DATE_OF_BIRTH => 'date'
    ];
    
    //defines a relationship between the MemberTag and Member models
    public function tags()
    {
        return $this->hasMany(MemberTag::class);
    }
}
