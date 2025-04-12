<?php

namespace App\Rules;
use ReCaptcha\ReCaptcha;


use Illuminate\Contracts\Validation\Rule;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
     public function passes($attribute, $value)
     {
       $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));
       $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
       //dd($response,$recaptcha,$response->isSuccess());
       return $response->isSuccess();
      }

    /**
     * Get the validation error message.
     *
     * @return string
     */
     public function message()
      {
      return 'يرجي التأكيد أنك لست روبوت ';//'يرجي التواصل مع  فريق العمل لوجود مشكلة بطلبك';
      }
}
