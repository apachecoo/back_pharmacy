<?php

namespace Tests\Unit\Modules\Customer\Infrastructure;

use App\Modules\Customer\Infrastructure\Repositories\CustomerRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer as CustomerModel;
use App\Modules\Customer\Domain\Entities\Customer;

class CustomerRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function testFind()
    {
        $customerData = [
            'id' => 1,
            'name' => 'John Doe',
            'phone' => '3229029662',
        ];
        $customer = CustomerModel::factory()->create($customerData);
        $repository = new CustomerRepository();
        $customerEntity = $repository->find($customer->id);
        $this->assertInstanceOf(Customer::class, $customerEntity);
        $this->assertEquals(1, $customerEntity->id);
        $this->assertEquals('John Doe', $customerEntity->name);
        $this->assertEquals('3229029662', $customerEntity->phone);
    }

    
}
