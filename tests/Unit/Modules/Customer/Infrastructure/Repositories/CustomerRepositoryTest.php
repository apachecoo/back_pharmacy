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
            'phone' => '3229029661',
        ];
        $customer = CustomerModel::factory()->create($customerData);
        $customerEntity = $this->getCustomerRepository()->find($customer->id);
        $this->assertInstanceOf(Customer::class, $customerEntity);
        $this->assertEquals(1, $customerEntity->id);
        $this->assertEquals('John Doe', $customerEntity->name);
        $this->assertEquals('3229029661', $customerEntity->phone);
    }

    public function testSave()
    {
        $customerEntity = new Customer(null, 'John Doe2', '3229029662', 'CRA 43C 20 70');
        $newCustomerEntity = $this->getCustomerRepository()->save($customerEntity);
        $this->assertInstanceOf(Customer::class, $newCustomerEntity);
        $this->assertEquals('3229029662', $newCustomerEntity->phone);
        $this->assertEquals('John Doe2', $newCustomerEntity->name);
    }

    public function testUpdate()
    {
        $oldCustomerEntity = new Customer(null, 'John Doe3', '3229029663', 'CRA 43C 20 70');
        $oldCustomerEntity = $this->getCustomerRepository()->save($oldCustomerEntity);
        $modifyCustomerEntity = new Customer(null, 'John Doe4', '3229029664', 'CRA 43C 20 74');
        $modifyCustomerEntity = $this->getCustomerRepository()->update($oldCustomerEntity->id, $modifyCustomerEntity);
        $this->assertInstanceOf(Customer::class, $modifyCustomerEntity);
        $this->assertEquals('John Doe4', $modifyCustomerEntity->name);
        $this->assertEquals('3229029664', $modifyCustomerEntity->phone);
        $this->assertEquals('CRA 43C 20 74', $modifyCustomerEntity->address);
    }

    public function testDelete()
    {
        $customerModel = CustomerModel::factory()->create();
        $this->getCustomerRepository()->delete($customerModel->id);
        $this->assertDatabaseMissing('customers', ['id' => $customerModel->id]);
    }

    public function getCustomerRepository(): CustomerRepository
    {
        return new CustomerRepository();
    }
}
