<?php

/**
 *    @OA\Info(
 *   version = "2.0.0",
 *  title = "Laravel Api Documentation",
 *  description = "This is a sample API documentation.",
 *  termsOfService = "http://localhost:8000/api/terms",
 *  @OA\Contact(email= "cmg.web@gmail.com"),
 *  @OA\License(name = "Apache 2.0", url= "http://www/apache.org/licences/LICENCE-2.0.html")
 *
 * )

*/
/**
 * @OA\Server(
 * description = "Laravel API Test Server",
 *  url = "http://127.0.0.1:8000/api"
 *
 * )
 */

/**
 * @OA\ExternalDocumentation(
 * description = "Find out more about Laravel Api",
 * url = "http://127.0.0.1:8000/api/documentation"
 * )
 */

/**
 * @OA\Server(
 * description = "Laravel API Stage Server",
 *  url = "http://127.0.0.1:8000/api/stage"
 *
 * )
 */

/**
 *  @OA\Schema(
 *     title = "Product",
 *     description = "Product model",
 *     type = "object",
 *     schema = "Product",
 *     properties = {
 *     @OA\Property(property = "id", type ="integer", format = "int64", description = "id column"),
 *     @OA\Property(property = "name", type ="string"),
 *     @OA\Property(property = "price", type ="integer"),
 *     @OA\Property(property = "description", type ="string")
 *     },
 *     required = {"id","name"}
 * )
 */

/**
 * @OA\Get(
 *     path = "/product",
 *     tags = {"products"},
 * summary = "list all products",
 *   operationId = "index",
 * @OA\Parameter(
 *  name = "limit",
 *  in = "query",
 *  description = "How many items to return at one home",
 *  required = false,
 *  @OA\Schema(type="integer", format="int32")
 *   ),
 * @OA\Response(
 *     response = 200,
 *     description = "A pagged array of products",
 *     @OA\JsonContent(
 *     type="array",
 *     @OA\Items(ref="#/components/schemas/Product")
 *    )
 *  ),
 * @OA\Response(
 *     response = 401,
 *     description = "Unauthorized",
 *     @OA\JsonContent()
 * ),
 *     security = {
 *     {"api_token": {}}
 *     }
 * )
 */

/**
 * @OA\Tag(
 *     name = "product",
 *     description = "Product tag Description",
 * @OA\ExternalDocumentation(
 *     description = "Find out more",
 *     url = "http://127.0.0.1:8000/api/documentation/product"
 * )
 * )
 */



/**
 * @OA\SecurityScheme(
 *     type = "apiKey",
 *     name = "api_token",
 *     securityScheme="api_token",
 *     in="query"
 *     )
 */

/**
 * @OA\SecurityScheme(
 *     type = "http",
 *     securityScheme="bearer_token",
 *     scheme="bearer",
 *    bearerFormat = "JWT"
 *     )
 */


/**
 * @OA\Get(
 *     path = "/product/{productId}",
 *     tags = {"products"},
 * summary = "Info for a specific product",
 *     operationId = "show",
 * @OA\Parameter(
 *  name = "productId",
 *  in = "path",
 *  description = "The id column of the product to retrieve",
 *  required = true,
 *  @OA\Schema(type="integer", format="int32")
 *   ),
 * @OA\Response(
 *     response = 200,
 *     description = "Product detail response",
 *     @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *  ),
 * @OA\Response(
 *     response = 401,
 *     description = "Unauthorized",
 *     @OA\JsonContent()
 * ),
 *    security = {
 *     {"api_token": {}}
 *     }
 * )
 */


/**
 *  @OA\Schema(
 *     title = "ApiResponse",
 *     description = "ApiResponse model",
 *     type = "object",
 *     schema = "ApiResponse",
 *     properties = {
 *     @OA\Property(property = "success", type ="boolean"),
 *     @OA\Property(property = "data", type ="object"),
 *     @OA\Property(property = "messae", type ="string"),
 *     @OA\Property(property = "errors", type ="object")
 *     }
 * )
 */


/**
 * @OA\Post(
 *     path = "/product",
 *     tags = {"products"},
 * summary = "Create a product",
 *     operationId = "store",
 * @OA\RequestBody(
 *  description = "Store a product",
 *  required = true,
 *   @OA\JsonContent(ref="#/components/schemas/Product")
 *   ),
 * @OA\Response(
 *     response = 201,
 *     description = "Product created response",
 *     @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *  ),
 * @OA\Response(
 *     response = 401,
 *     description = "Unauthorized",
 *     @OA\JsonContent()
 * )
 * )
 */


/**
 * @OA\Put(
 *     path = "/product/put/{productId}",
 *     tags = {"products"},
 * summary = "Create a product",
 *     operationId = "update",
 *      * @OA\Parameter(
 *  name = "productId",
 *  in = "path",
 *  description = "The id column of the product to update",
 *  required = true,
 *  @OA\Schema(type="integer", format="int32")
 *   ),
 * @OA\RequestBody(
 *  description = "Update a product",
 *  required = true,
 *   @OA\JsonContent(ref="#/components/schemas/Product")
 *   ),
 * @OA\Response(
 *     response = 200,
 *     description = "Product updated response",
 *     @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *  ),
 * @OA\Response(
 *     response = 401,
 *     description = "Unauthorized",
 *     @OA\JsonContent()
 * )
 * )
 */




/**
 * @OA\Delete(
 *     path = "/product/{productId}",
 *     tags = {"products"},
 * summary = "Delete a product",
 *     operationId = "destroy",
 *      * @OA\Parameter(
 *  name = "productId",
 *  in = "path",
 *  description = "The id column of the product to delete",
 *  required = true,
 *  @OA\Schema(type="integer", format="int32")
 *   ),
 * @OA\Response(
 *     response = 200,
 *     description = "Product updated response",
 *     @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *  ),
 * @OA\Response(
 *     response = 401,
 *     description = "Unauthorized",
 *     @OA\JsonContent()
 * )
 * )
 */

