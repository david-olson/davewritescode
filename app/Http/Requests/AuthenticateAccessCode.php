<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\AccessCode;
use App\Models\ActiveGuest;
use Carbon\Carbon;

class AuthenticateAccessCode extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'exists:access_codes,code'
        ];
    }

    public function messages()
    {
        return [
            'code.exists' => 'That access code was not found.'
        ];
    }

    public function authenticate()
    {
        $accessCodeCode = $this->code;
        $accessCode = AccessCode::where('code', $accessCodeCode)->first();
        if ($accessCode) {
            $guest = ActiveGuest::create([
                'code_id' => $accessCode->id,
                'user_ip' => $this->ip(),
                'expires_at' => Carbon::now()->addDays(1)
            ]);

            session(['active_guest_id' => $guest->id]);

            return true;
        } else {
            return false;
        }
    }

    /**
     * Retrieves the user's actual IP address
     * @return string
     */
    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
}
