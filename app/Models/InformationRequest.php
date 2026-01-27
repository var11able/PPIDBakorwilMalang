<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationRequest extends Model
{
    use HasFactory;

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
        'rejection_reason',
        'parent_request_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parentRequest()
    {
        return $this->belongsTo(InformationRequest::class, 'parent_request_id');
    }

    public function objection()
    {
        return $this->hasOne(InformationRequest::class, 'parent_request_id');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDiproses($query)
    {
        return $query->where('status', 'diproses');
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', 'disetujui');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    public function scopePermohonan($query)
    {
        return $query->where('request_type', 'permohonan');
    }

    public function scopeKeberatan($query)
    {
        return $query->where('request_type', 'keberatan');
    }
}
