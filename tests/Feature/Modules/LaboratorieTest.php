<?php

namespace Tests\Feature\GraphQL;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\GraphQLTestCase;
use App\Models\Laboratory;

class LaboratorieTest extends GraphQLTestCase
{
  use RefreshDatabase;

  public function testCanFetchLaboratories()
  {
    Laboratory::factory()->count(20)->create();
    $query = '
        {
          laboratories(first: 10, page: 1) {
            paginatorInfo {
              count
              currentPage
              firstItem
              hasMorePages
              lastItem
              lastPage
              perPage
              total
            }
            data {
              id
              name
              address
              created_at
              updated_at
            }
          }
        }
        ';

    $response = $this->graphQL($query);

    $response->assertJson([
      'data' => [
        'laboratories' => [
          'paginatorInfo' => [
            'count' => 10,
            'currentPage' => 1,
            'perPage' => 10,
            'total' => 20,
          ],
          'data' => [
            [
              'id' => true,
              'name' => true,
              'address' => true,
              'created_at' => true,
              'updated_at' => true,
            ]
          ]
        ]
      ]
    ]);
  }

  public function testCanCreateLaboratory()
  {
    $mutation = '
        mutation ($input: LaboratoryInput!) {
            createLaboratory(input: $input) {
                id
                name
                address
                created_at
                updated_at
            }
        }
        ';

    $variables = [
      'input' => [
        'name' => 'Laboratorio de Prueba',
        'address' => '123 Calle Falsa',
      ]
    ];

    $response = $this->graphQL($mutation, $variables);

    $response->assertJson([
      'data' => [
        'createLaboratory' => [
          'id' => true,
          'name' => 'Laboratorio de Prueba',
          'address' => '123 Calle Falsa',
          'created_at' => true,
          'updated_at' => true,
        ]
      ]
    ]);

    // Verify that the laboratory was created in the database
    $this->assertDatabaseHas('laboratories', [
      'name' => 'Laboratorio de Prueba',
      'address' => '123 Calle Falsa',
    ]);
  }

  public function testCanUpdateLaboratory()
  {
    $laboratory = Laboratory::factory()->create();
    $mutation = '
        mutation ($id: Int!, $input: LaboratoryInput!) {
            updateLaboratory(id: $id, input: $input) {
                id
                name
                address
                created_at
                updated_at
            }
        }
        ';
    $variables = [
      'id' => $laboratory->id,
      'input' => [
        'name' => 'Laboratorio Actualizado',
        'address' => '456 Calle Nueva',
      ]
    ];
    $response = $this->graphQL($mutation, $variables);
    $response->assertJson([
      'data' => [
        'updateLaboratory' => [
          'id' => $laboratory->id,
          'name' => 'Laboratorio Actualizado',
          'address' => '456 Calle Nueva',
          'created_at' => true,
          'updated_at' => true,
        ]
      ]
    ]);
    $this->assertDatabaseHas('laboratories', [
      'id' => $laboratory->id,
      'name' => 'Laboratorio Actualizado',
      'address' => '456 Calle Nueva',
    ]);
  }

  public function testCanDeleteLaboratory()
  {
    $laboratory = Laboratory::factory()->create();
    $mutation = '
        mutation ($id: Int!) {
            deleteLaboratory(id: $id) {
                message
                deleted
            }
        }
        ';
    $variables = [
      'id' => $laboratory->id,
    ];
    $response = $this->graphQL($mutation, $variables);
    $response->assertJson([
      'data' => [
        'deleteLaboratory' => [
          'message' => true,
          'deleted' => true,
        ]
      ]
    ]);
    $this->assertDatabaseMissing('laboratories', [
      'id' => $laboratory->id,
    ]);
  }
}
