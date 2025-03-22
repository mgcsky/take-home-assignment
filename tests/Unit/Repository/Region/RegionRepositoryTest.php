<?php

use App\Models\Region;
use App\Repository\Regions\RegionsRepository;

describe('Repository Region', function () {
    beforeEach(function () {
        $this->region = Region::create([
            'name' => 'Singapore',
        ]);

        $this->repository = new RegionsRepository;
    });

    test('can retrieve data by default', function () {
        $region = $this->repository->findByName('Singapore');
        expect($region)->not->toBeNull();
    });

    test('can not retrieve data due to wrong name', function () {
        $region = $this->repository->findByName('Malaysia');
        expect($region)->toBeNull();
    });
});