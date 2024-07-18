<?php

namespace Tests\Feature\GraphQL;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\GraphQLTestCase;
use App\Models\Product;
use App\Models\{Laboratory, Type, Presentation};

class ProductTest extends GraphQLTestCase
{
  use RefreshDatabase;

  public function testCanFetchProducts()
  {
    $type = Type::factory()->create();
    $laboratory = Laboratory::factory()->create();
    $presentation = Presentation::factory()->create();
    $productData = [
      'laboratoryId' => $laboratory->id,
      'presentationId' => $presentation->id,
      'typeId' => $type->id,
      'code' => '123456789012',
      'description' => 'Product description',
      'price' => 8000,
      'stock' => 10,
      'expiration' => '2024-09-20',
    ];
    Product::factory()->create($productData);

    $query = '
          {
            products(first: 10, page: 1) {
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
                productCode
                laboratorie {
                  id
                  name
                }
                presentation {
                  id
                  name
                }
                type {
                  id
                  type
                }
                code
                description
                price
                stock
                expiration
                created_at
                updated_at
              }
            }
          }
        ';

    $response = $this->graphQL($query);

    $response->assertJson([
      'data' => [
        'products' => [
          'paginatorInfo' => [
            'count' => 1,
            'currentPage' => 1,
            'perPage' => 10,
            'total' => 1,
          ],
          'data' => [
            [
              'laboratorie' => [
                'id' => (string) $laboratory->id,
                'name' => $laboratory->name,
              ],
              'presentation' => [
                'id' => (string) $presentation->id,
                'name' => $presentation->name,
              ],
              'type' => [
                'id' => (string) $type->id,
                'type' => $type->type,
              ],
              'code' => '123456789012',
              'description' => 'Product description',
              'price' => '8000.00',
              'stock' => '10',
              'expiration' => '2024-09-20',
              'created_at' => true,
              'updated_at' => true,
            ]
          ]
        ]
      ]
    ]);
  }


  public function testCanCreateProduct()
  {

    $type = Type::factory()->create();
    $laboratory = Laboratory::factory()->create();
    $presentation = Presentation::factory()->create();

    $mutation = '
          mutation CreateProduct($input: ProductInput!){
            createProduct(input: $input) {
              productCode
              laboratoryId
              laboratorie {
                id
                name
                address
                created_at
                updated_at
              }
              presentationId
              presentation {
                id
                name
                shortName
                created_at
                updated_at
              }
              typeId
              type {
                id
                type
                created_at
                updated_at
              }
              code
              description
              price
              stock
              expiration
              created_at
              updated_at
            }
          }
        ';

    $variables = [
      'input' => [
        'laboratoryId' => $laboratory->id,
        'presentationId' => $presentation->id,
        'typeId' => $type->id,
        'code' => '123456789012',
        'description' => 'product test',
        'price' => '8000',
        'stock' => '1',
        'expiration' => '2024-09-20'
      ]
    ];

    $response = $this->graphQL($mutation, $variables);

    $response->assertJson([
      'data' => [
        'createProduct' => [
          'laboratoryId' => $laboratory->id,
          'presentationId' => $presentation->id,
          'typeId' => $type->id,
          'code' => '123456789012',
          'description' => 'product test',
          'price' => '8000',
          'stock' => '1',
          'expiration' => '2024-09-20'
        ]
      ]
    ]);

    // Verify that the Product was created in the database
    $this->assertDatabaseHas('products', [
      'laboratoryId' => $laboratory->id,
      'presentationId' => $presentation->id,
      'typeId' => $type->id,
      'code' => '123456789012',
      'description' => 'product test',
      'price' => '8000',
      'stock' => '1',
      'expiration' => '2024-09-20'
    ]);
  }
}
