<?php

namespace Dsc\Listeners;

use Dsc\Activity;
use Dsc\Events\Permission\Created;
use Dsc\Events\Permission\Deleted;
use Dsc\Events\Permission\Updated;
use Dsc\Services\Logging\UserActivity\Logger;

class PermissionEventsSubscriber
{
    /**
     * @var UserActivityLogger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onCreate(Created $event)
    {
        $permission = $event->getPermission();

        $name = $permission->display_name ?: $permission->name;
        $message = trans('log.new_permission', ['name' => $name]);

        $this->logger->log($message);
    }

    public function onUpdate(Updated $event)
    {
        $permission = $event->getPermission();

        $name = $permission->display_name ?: $permission->name;
        $message = trans('log.updated_permission', ['name' => $name]);

        $this->logger->log($message);
    }

    public function onDelete(Deleted $event)
    {
        $permission = $event->getPermission();

        $name = $permission->display_name ?: $permission->name;
        $message = trans('log.deleted_permission', ['name' => $name]);

        $this->logger->log($message);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $class = 'Dsc\Listeners\PermissionEventsSubscriber';

        $events->listen(Created::class, "{$class}@onCreate");
        $events->listen(Updated::class, "{$class}@onUpdate");
        $events->listen(Deleted::class, "{$class}@onDelete");
    }
}
