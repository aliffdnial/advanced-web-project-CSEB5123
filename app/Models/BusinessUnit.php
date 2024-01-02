<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessUnit extends Model
{
    use HasFactory,SoftDeletes;

    // protected $table = 'business_units';
    // protected $primaryKey = 'id';

    protected $fillable = [
        'busID','picname','requesttype','description',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'id');
    }
}
