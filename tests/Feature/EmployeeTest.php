<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    use DatabaseTransactions;

    /**
     *
     */
    public function testEmployeeIndex()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user, 'web')->get('employee/index');
        $response->assertOk();
    }

    public function testEmployeeCreate()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user, 'web')->get('employee/create');
        $response->assertOk();

    }

    public function testEmployeeStore()
    {
        $employee = factory(Employee::class)->create();
        $this->assertDatabaseHas('employees', ['id' => $employee->id]);
    }

    public function testEmployeeShow()
    {
        $user = factory(User::class)->make();
        $employee = factory(Employee::class)->create();
        $this->assertInstanceOf(Employee::class, $employee);
        $response = $this->actingAs($user, 'web')->get('employee/show/'.$employee->id);
        $response->assertSeeText($employee->name);
        $response->assertOk();
    }

    public function testEmployeeDestroy()
    {
        $employee = factory(Employee::class)->create([
            'deleted_at' => now(),
        ]);
        $this->assertSoftDeleted('employees', ['id' => $employee->id]);
    }
}
