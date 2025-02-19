<?php

namespace Nowendwell\AppAnalytics;

use Nowendwell\AppAnalytics\Session;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'app_analytics_events';
    protected $guarded = [];
    protected $casts = [
        'data' => 'array',
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
