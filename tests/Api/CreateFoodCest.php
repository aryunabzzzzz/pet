<?php


namespace Tests\Api;

use Tests\Support\ApiTester;

class CreateFoodCest
{
    // tests
    public function createFoodViaAPI(ApiTester $I)
    {
        $I->haveHttpHeader('Accept', 'application/json');
        $I->sendPOST('/foods', [
            'name' => 'Food',
            'categoryId' => 1,
            'price' => 100,
            'description' => 'Food description'
        ]);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
    }
}
