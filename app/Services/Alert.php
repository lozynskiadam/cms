<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class Alert
{
    protected static array $messages = [];

    private function __construct() {
    }

    public static function info(string $message): void
    {
        Alert::add($message, 'info');
    }

    public static function success(string $message): void
    {
        Alert::add($message, 'success');
    }

    public static function warning(string $message): void
    {
        Alert::add($message, 'warning');
    }

    public static function danger(string $message): void
    {
        Alert::add($message, 'danger');
    }

    public static function getAlerts(): array
    {
        return Session::get('alerts', Alert::$messages);
    }

    protected static function add(string $message, string $type): void
    {
        Alert::$messages = array_merge(Session::get('alerts') ?? [], Alert::$messages);
        Alert::$messages[$type][] = $message;
        Session::flash('alerts', Alert::$messages);
    }
}
