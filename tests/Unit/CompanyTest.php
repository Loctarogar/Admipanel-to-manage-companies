<?php

namespace Tests\Unit;

use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    /**
     * @test
     */
    public function testCanStoreCompany()
    {
        $data = [
            'name' => 'somefakename',
            'email' => 'somefake@mail.com',
            'logo' => 'logo',
            'website' => 'website.com',
            'user_id' => 1,
        ];

        $company = new Company($data);

        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals($data['name'], $company->name);
    }


}
