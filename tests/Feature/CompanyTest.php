<?php

namespace Tests\Feature;

use App\Company;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyTest extends TestCase
{
    use DatabaseTransactions;

    /**
     *
     */
    public function testCompanyIndex()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user, 'web')->get('company/index');
        $response->assertOk();
    }

    /**
     *
     */
    public function testCompanyCreate()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user, 'web')->get('company/create');
        $response->assertOk();
    }

    /**
     *
     */
    public function testCompanyStore()
    {
        $company = factory(Company::class)->create();
        $this->assertDatabaseHas('companies', ['id' => $company->id]);
    }

    /**
     *
     */
    public function testCompanyShow()
    {
        $user = factory(User::class)->make();
        $company = factory(Company::class)->create();
        $this->assertInstanceOf(Company::class, $company);
        $response = $this->actingAs($user, 'web')->get('company/show/'.$company->id);
        $response->assertSeeText($company->name);
        $response->assertOk();
    }

    public function testCompanyDestroy()
    {
        $company = factory(Company::class)->create([
            'deleted_at' => NOW(),
        ]);
        $this->assertSoftDeleted('companies', ['id' => $company->id]);
    }
}
