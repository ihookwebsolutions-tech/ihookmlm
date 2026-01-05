<?php

namespace User\App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ← Critical: extend Authenticatable
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'ihook_admin_table';

    protected $primaryKey = 'admin_id'; // ← Important: not 'id'

    public $timestamps = false; // ← No created_at/updated_at columns

    protected $fillable = [
        'admin_username',
        'admin_password',
        'admin_email',
        'admin_phone',
        'admin_profile_image',
        'admin_status',
        'admin_type',
        // add others if needed
    ];

    protected $hidden = [
        'admin_password',
        'admin_otp',
        'admin_otp_decrypt',
        'push_token',
        'remember_token',
    ];

    // Laravel expects 'password', not 'admin_password'
    public function getAuthPassword()
    {
        return $this->admin_password;
    }

    // Optional: if you use email for login instead of username
    // public function getAuthIdentifierName()
    // {
    //     return 'admin_email'; // or 'admin_username'
    // }
}
