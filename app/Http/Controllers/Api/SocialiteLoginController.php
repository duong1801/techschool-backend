<?php

namespace App\Http\Controllers\Api;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SocialiteLoginController extends Controller
{
    public function getRedirectUri(Request $request)
    {
        $provider = $request->header('provider');

        $url = Socialite::driver($provider)
            ->with(['redirect_uri' => $request->redirect_url])
            ->stateless()
            ->redirect()
            ->getTargetUrl();

            return $url;
        return response()->json([
            'url' => $url
        ]);
    }

    public function loginSocialUsingToken(Request $request)
    {
        $provider = $request->provider;
        $platform = $request->platfrom;
        $socialUser = Socialite::driver($provider)
            ->stateless()
            ->userFromToken($request->token);

        if ($socialUser) {
            $systemUser = User::where('facebook_id', $socialUser->getId())->first();
            $token = $systemUser->createToken($platform)->plainTextToken;
            $systemUser->token = $token;
            return response()->json($systemUser);
        }
    }
}
