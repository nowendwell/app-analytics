<?php

namespace Nowendwell\AppAnalytics;

use Illuminate\Database\Eloquent\Casts\AsEncryptedArrayObject;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'app_analytics_actions';

    protected $guarded = [];

    protected $casts = [
        'payload' => AsEncryptedArrayObject::class,
        'response_headers' => 'array',
    ];

    public function __construct()
    {
        $this->connection = config('app-analytics.database_connection');
        parent::__construct();
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
