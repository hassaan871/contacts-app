<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Group extends Model
{
    protected $fillable = [
        'member_id',
        'admin_id',
        'create_permission',
        'read_permission',
        'update_permission',
        'delete_permission',
    ];

    public function member() {
        return $this->belongsTo(User::class, 'member_id');
    }
    
    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
