<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationRequest extends Model
{
    protected $table = 'requests';
    protected $fillable = [
        'user_id',
        'request_type',
        'identity_proof',
        'institution',
        'proof_institution',
        'data_request',
        'phone_number',
        'complaint',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
