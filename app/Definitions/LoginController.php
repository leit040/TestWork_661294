<?php
/**
 * @OA\Post(
 *     path="/api/token",
 *     tags={"Token"},
 *     summary="Token",
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *         @OA\JsonContent(@OA\Property(property="access_token", type="string"),
)),
 *     @OA\RequestBody(
 *         description="Requested body",
 *         required=true,
 *         @OA\JsonContent(@OA\Property(property="login", type="string"),@OA\Property(property="password", type="string"),@OA\Property(property="device_name", type="string")),
 *     )
 * )
 */


/**
 * @OA\Post(
 *     path="/api/register",
 *     tags={"Token"},
 *     summary="Create user",
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *         @OA\JsonContent(@OA\Property(property="access_token", type="string"),
)),
 *     @OA\RequestBody(
 *         description="Requested body",
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/CreateUserOpenApi"),
 *     )
 * )
 */
