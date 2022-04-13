<?php

/**
 * @OA\Get(
 *     path="/api/books",
 *     tags={"Books"},
 *     summary="Get All books",
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="items", type="array", @OA\Items(ref="#/components/schemas/CreateBookOpenApi")),
 *              @OA\Property(property="_meta", type="object", ref="#/components/schemas/Meta"),
 *          )
 *     )
 * )
 */



/**
 * @OA\Post(
 *     path="/api/books",
 *     tags={"Books"},
 *     summary="Create book",
 *     @OA\Response(
 *         response=200,
 *         description="Books"),
 *     @OA\RequestBody(
 *         description="Requested body",
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/CreateBookOpenApi"),
 *     )
 * )
 */

/**
 * @OA\Put(
 *     path="/api/books/{id}",
 *     tags={"Books"},
 *     summary="Update book",
 *     @OA\Response(
 *         response=200,
 *         description="Book"),
 *     @OA\RequestBody(
 *         description="Requested body",
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UpdateBookOpenApi"),
 *     )
 * )
 */
/**
 * @OA\Delete(
 *     path="/api/book/{id}",
 *     tags={"Books"},
 *     summary="Delete book",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Book id",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="successful operation",
 *     )
 * )
 */


