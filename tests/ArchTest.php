<?php

arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray'])
    ->each->not->toBeUsed();

arch('it will not use the global helper')
    ->expect(['app', 'event', 'request', 'response', 'route', 'url'])
    ->not->toBeUsed();
