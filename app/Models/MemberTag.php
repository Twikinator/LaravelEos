<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Containers\Members\Models\Member;

class MemberTag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'member_id'
    ];

    //defines a relationship between the MemberTag and Member models
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
