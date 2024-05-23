<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Containers\Members\Models\Member;

class MemberTag extends Model
{
    use HasFactory;
    public const NAME = "name";
    public const MEMBER_ID = "member_id";
    
    protected $fillable = [
        self::NAME,
        self::MEMBER_ID
    ];

    protected $casts = [
        self::MEMBER_ID => 'integer',
        self::NAME => 'string'
    ];

    //defines a relationship between the MemberTag and Member models
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
