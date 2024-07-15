<?php


namespace Tests\Api;

use Tests\Support\ApiTester;

class DeleteCartCest
{
    // tests
    public function deleteCartViaAPI(ApiTester $I)
    {
        $I->amBearerAuthenticated("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MjEwMTk1NTQsImV4cCI6MTcyMTAyMzE1NCwibmJmIjoxNzIxMDE5NTU0LCJqdGkiOiJoTnRZWEVPUnlXUERFUDZXIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.T4A2jAJwuhKhaLVMMeBB4vn5azOeXCx84pRxIPHTwos");
        $I->sendDELETE('/carts/1');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}
