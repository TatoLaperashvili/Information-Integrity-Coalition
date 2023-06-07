<?php
  
namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = Http::get('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6LcRYEwmAAAAAP2hLhFwqgbfXW0ekUeohEfseP91',
            'response' => $value
        ]);

        return $response->json()['success'] ?? false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Google reCAPTCHA is required.';
    }
}
