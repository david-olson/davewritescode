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
                'expires_at' => Carbon::now()->addDays(1)
            ]);

            session(['active_guest_id' => $guest->id]);

            return true;
        } else {
            return false;
        }
    }
}
