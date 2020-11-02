<?php

declare(strict_types=1);

use App\Http\Livewire\MonitorStatistics;

use App\Services\Cache\NetworkCache;
use Livewire\Livewire;
use function Tests\configureExplorerDatabase;

// @TODO: make assertions about the visibility of the data
it('should render the component', function () {
    configureExplorerDatabase();

    (new NetworkCache())->setDelegateRegistrationCount(fn () => 1000);
    (new NetworkCache())->setFeesCollected(fn () => 1000);
    (new NetworkCache())->setVotesCount(fn () => 1000);
    (new NetworkCache())->setVotesPercentage(fn () => 1000);

    Livewire::test(MonitorStatistics::class)
        ->assertSee(trans('pages.monitor.statistics.delegate_registrations'))
        ->assertSee(trans('pages.monitor.statistics.block_reward'))
        ->assertSee(trans('pages.monitor.statistics.fees_collected'))
        ->assertSee(trans('pages.monitor.statistics.votes'));
});
