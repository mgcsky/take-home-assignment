<?php

use App\Models\RentalPeriod;
use App\Repository\RentalPeriod\RentalPeriodRepository;

describe('Repository RentalPeriod', function () {
    beforeEach(function () {
        $this->rentalPeriod = RentalPeriod::create([
            'duration' => 3,
        ]);

        $this->repository = new RentalPeriodRepository;
    });

    test('can retrieve data by default', function () {
        $region = $this->repository->findByDuration(3);
        expect($region)->not->toBeNull();
    });

    test('can not retrieve data due to wrong name', function () {
        $region = $this->repository->findByDuration(6);
        expect($region)->toBeNull();
    });
});