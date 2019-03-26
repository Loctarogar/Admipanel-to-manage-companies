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
        $company = factory(Company::class)->create();
        $this->assertInstanceOf(Company::class, $company);
        $this->assertEquals('testCompanyFactory', $company->name);
    }


}
