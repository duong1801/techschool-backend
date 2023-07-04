<?php

namespace App\Http\Controllers\api;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SocialiteRegisterController extends Controller
{
    public function getRedirectUrl(Request $request)
    {
        $provider = $request->provider;
        $url = Socialite::driver($provider)
            ->with(['redirect_uri' => $request->redirect_url])
            ->stateless()
            ->redirect()
            ->getTargetUrl();
        return response()->json([
            'url' => $url
        ]);
    }

    public function registerSocialUsingToken(Request $request)
    {
        $provider = $request->provider;
        $platform = $request->platfrom;
        $socialUser = Socialite::driver($provider)
            ->stateless()
            ->userFromToken($request->token);

        if ($socialUser) {
            $systemUser = new User();
            $systemUser::create([
                'name' =>$socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'avatar'=>$socialUser->getAvatar()
            ]);
            $token = $systemUser->createToken($platform)->plainTextToken;
            $systemUser->token = $token;
            return response()->json($systemUser);
        }
    }
}
