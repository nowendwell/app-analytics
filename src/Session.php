<?php

namespace Nowendwell\AppAnalytics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Session extends Model
{
    protected $table = 'app_analytics_sessions';

    protected $guarded = [];

    public function __construct()
    {
        $this->connection = config('app-analytics.database_connection');
        parent::__construct();
    }

    public function actions()
    {
        return $this->hasMany(Action::class, 'session_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'session_id');
    }
}
