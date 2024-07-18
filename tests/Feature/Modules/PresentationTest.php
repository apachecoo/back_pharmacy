<?php

namespace Tests\Feature\GraphQL;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\GraphQLTestCase;
use App\Models\Presentation;

class PresentationTest extends GraphQLTestCase
{
  use RefreshDatabase;

  public function testCanFetchPresentations()
  {
    Presentation::factory()->count(20)->create();
    $query = '
        {
          presentations(first: 10, page: 1) {
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
              shortName
              created_at
              updated_at
            }
          }
        }

        ';

    $response = $this->graphQL($query);

    $response->assertJson([
      'data' => [
        'presentations' => [
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
              'shortName' => true,
              'created_at' => true,
              'updated_at' => true,
            ]
          ]
        ]
      ]
    ]);
  }

  public function testCanCreatePresentation()
  {
    $mutation = '
        mutation ($input: PresentationInput!) {
            createPresentation(input: $input) {
                id
                name
                shortName
                created_at
                updated_at
            }
        }
        ';

    $variables = [
      'input' => [
        'name' => 'Presentación de Prueba',
        'shortName' => 'PDP',
      ]
    ];

    $response = $this->graphQL($mutation, $variables);

    $response->assertJson([
      'data' => [
        'createPresentation' => [
          'id' => true,
          'name' => 'Presentación de Prueba',
          'shortName' => 'PDP',
          'created_at' => true,
          'updated_at' => true,
        ]
      ]
    ]);

    // Verify that the Presentation was created in the database
    $this->assertDatabaseHas('presentations', [
      'name' => 'Presentación de Prueba',
      'shortName' => 'PDP',
    ]);
  }

  public function testCanUpdatePresentation()
  {
    $presentation = Presentation::factory()->create();
    $mutation = '
        mutation ($id: Int!, $input: PresentationInput!) {
            updatePresentation(id: $id, input: $input) {
                id
                name
                shortName
                created_at
                updated_at
            }
        }
        ';
    $variables = [
      'id' => $presentation->id,
      'input' => [
        'name' => 'Presentación Actualizada',
        'shortName' => 'PA',
      ]
    ];
    $response = $this->graphQL($mutation, $variables);
    $response->assertJson([
      'data' => [
        'updatePresentation' => [
          'id' => $presentation->id,
          'name' => 'Presentación Actualizada',
          'shortName' => 'PA',
          'created_at' => true,
          'updated_at' => true,
        ]
      ]
    ]);
    $this->assertDatabaseHas('presentations', [
      'id' => $presentation->id,
      'name' => 'Presentación Actualizada',
      'shortName' => 'PA',
    ]);
  }

  public function testCanDeletePresentation()
  {
    $presentation = Presentation::factory()->create();
    $mutation = '
        mutation ($id: Int!) {
            deletePresentation(id: $id) {
                message
                deleted
            }
        }
        ';
    $variables = [
      'id' => $presentation->id,
    ];
    $response = $this->graphQL($mutation, $variables);
    $response->assertJson([
      'data' => [
        'deletePresentation' => [
          'message' => true,
          'deleted' => true,
        ]
      ]
    ]);
    $this->assertDatabaseMissing('presentations', [
      'id' => $presentation->id,
    ]);
  }
}
