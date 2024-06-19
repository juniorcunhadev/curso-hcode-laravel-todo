<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationsController extends Controller
{
    /**
     * Autenticação com geração de token.
     *
     * @param Request $request
     * @return object
     */
    public function create(Request $request): object
    {
        // TODO: Checar se o e-mail foi verificado.
        // TODO: Checar se já esta logado.

        $res = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$res) return response()->json(
            ['message' => 'Usuário Inválido!'],
            Response::HTTP_UNAUTHORIZED
        );

        $user = Auth::user();
        $token = $user->createToken('JWT');

        return response()->json(
            ['token' => $token->plainTextToken],
            Response::HTTP_OK
        );
    }

    /**
     * Retorna usuário autenticado.
     *
     * @param Request $request
     * @return object
     */
    public function show(Request $request): object
    {
        return $request->user();
    }

    /**
     * Desconectar usuário.
     *
     * @param Request $request
     * @return object
     */
    public function destroy(Request $request): object
    {
        // Deletar todos os tokens de um usuário.
        // $request->user()->tokens()->delete();

        // Deletar token atual de um usuário.
        // $request->user()->currentAccessToken()->delete();

        // Expirar token do usuário logado.
        $token = $request->user()->currentAccessToken();

        $token->expires_at = now(); // now()->addHours(2);
        $token->save();

        return response()->json([
            'message' => 'Usuário desconectado!'
        ]);
    }
}
