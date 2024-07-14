<?php

namespace Tests\Feature\GraphQL;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\GraphQLTestCase;
use App\Models\Type;

class TypeTest extends GraphQLTestCase
{
  use RefreshDatabase;

  public function testCanFetchTypes()
  {
    Type::factory()->count(20)->create();
    $query = '
        {
          types(first: 10, page: 1) {
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
              type
              created_at
              updated_at
            }
          }
        }

        ';

    $response = $this->graphQL($query);

    $response->assertJson([
      'data' => [
        'types' => [
          'paginatorInfo' => [
            'count' => 10,
            'currentPage' => 1,
            'perPage' => 10,
            'total' => 20,
          ],
          'data' => [
            [
              'id' => true,
              'type' => true,
              'created_at' => true,
              'updated_at' => true,
            ]
          ]
        ]
      ]
    ]);
  }

  public function testCanCreateType()
  {
    $mutation = '
        mutation ($input: TypeInput!) {
            createType(input: $input) {
                id
                type
                created_at
                updated_at
            }
        }
        ';

    $variables = [
      'input' => [
        'type' => 'Tipo de Prueba',
      ]
    ];

    $response = $this->graphQL($mutation, $variables);

    $response->assertJson([
      'data' => [
        'createType' => [
          'id' => true,
          'type' => 'Tipo de Prueba',
          'created_at' => true,
          'updated_at' => true,
        ]
      ]
    ]);

    // Verify that the Type was created in the database
    $this->assertDatabaseHas('types', [
      'type' => 'Tipo de Prueba',
    ]);
  }

  public function testCanUpdateType()
  {
    $type = Type::factory()->create();
    $mutation = '
        mutation ($id: Int!, $input: TypeInput!) {
            updateType(id: $id, input: $input) {
                id
                type
                created_at
                updated_at
            }
        }
        ';
    $variables = [
      'id' => $type->id,
      'input' => [
        'type' => 'Tipo Actualizado',
      ]
    ];
    $response = $this->graphQL($mutation, $variables);
    $response->assertJson([
      'data' => [
        'updateType' => [
          'id' => $type->id,
          'type' => 'Tipo Actualizado',
          'created_at' => true,
          'updated_at' => true,
        ]
      ]
    ]);
    $this->assertDatabaseHas('types', [
      'id' => $type->id,
      'type' => 'Tipo Actualizado',
    ]);
  }

  public function testCanDeleteType()
  {
    $type = Type::factory()->create();
    $mutation = '
        mutation ($id: Int!) {
            deleteType(id: $id) {
                message
                deleted
            }
        }
        ';
    $variables = [
      'id' => $type->id,
    ];
    $response = $this->graphQL($mutation, $variables);
    $response->assertJson([
      'data' => [
        'deleteType' => [
          'message' => true,
          'deleted' => true,
        ]
      ]
    ]);
    $this->assertDatabaseMissing('types', [
      'id' => $type->id,
    ]);
  }
}
