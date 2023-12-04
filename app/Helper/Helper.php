<?php

namespace App\Helper;

use Exception;
use Twilio\Rest\Client;
use OAuth2\Encryption\Jwt;
use Illuminate\Support\Facades\Cache;

class Helper
{
    public static function checkInArrayObject($arr, $key, $value)
    {
        foreach ($arr as $tag) {
            if ($tag->{$key} == $value) {
                return true;
                break;
            }
        }
        return false;
    }

    public static function mrkFolder($path, $per = '0777')
    {
        if (!file_exists($path)) {
            \File::makeDirectory($path, $per, true);
        }
    }

    public static function locale()
    {
        $lang = \Request::segment(1);
        if ($lang == "en") {
            \App::setLocale("en");
        };
        return "";
    }

    public static function currentPageMenu($url, $class = "current-page")
    {
        if (!is_array($url)) {
            $check = request()->is($url);
            return $check ? $class : "";
        } else {
            foreach ($url as $key => $value) {
                if (request()->is($value)) {
                    return $class;
                }
            }
        }
        return "";
    }

    public static function uploadFile($file, $path, $name = null)
    {
        $name = $name ? $name : \Uuid::generate()->string;
        $extension = $file->extension();
        self::mrkFolder($path);
        $file->move($path, "{$name}.{$extension}");
        return "{$path}/{$name}.{$extension}";
    }

    public static function twilioValidPhoneNumber($originNumber, $type = 'mobile')
    {
        $mobileNumber = str_replace([' ', '(', ')', '-'], '', $originNumber);
        //for testing purpose
        if (str_starts_with($mobileNumber, '000')) {
            return true;
        }
        try {
            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');
            $client = new Client($sid, $token);
            $result = $client->lookups
                ->v2
                ->phoneNumbers($mobileNumber)
                ->fetch(
                    [
                        "fields" => "line_type_intelligence"
                    ]
                );
            if ($result) {
                $resultArray = $result->toArray();
                if ($resultArray['valid'] == true) {
                    $numberType = $resultArray['lineTypeIntelligence']['type'];
                    $valid = true;
                    Cache::put('type_' . $originNumber, $numberType, now()->addMinutes(60));
                    if ($type == 'mobile') {
                        if ($numberType == 'mobile') {
                            $valid = true;
                        } else {
                            $valid = false;
                        }
                    } else {
                        $valid = true;
                    }
                    return $valid ? true : ($type == 'mobile' ? 'Invalid phone number type. Please use a mobile number.': 'Invalid number, please use a valid phone number');
                } else {
                    return  $type == 'mobile' ? 'Please specify a valid US phone number' : 'Please specify a valid phone number';
                }
            } else {
                return $type == 'mobile' ? 'Please specify a valid US phone number' : 'Please specify a valid phone number';
            }
        } catch (Exception $e) {
            return $type == 'mobile' ? 'Please specify a valid US phone number' : 'Please specify a valid phone number';
        }
    }

    public static function smsVerificationCode($mobileNumber, $code)
    {
        if (!app()->environment('local') && !str_contains($mobileNumber, '111')) {
            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');
            $from = config('services.twilio.from_mobile');
            $message = 'Your Advantage Logistics Verification code is: ' . $code;

            $client = new Client($sid, $token);
            $client->messages->create(
                $mobileNumber,
                [
                    'from' => $from,
                    'body' => $message
                ]
            );
        }
    }

    public static function uuidNumbers($prefix, $length = 10)
    {
        $prefixLen = strlen($prefix);
        return $prefix . random_int(intval(str_pad("1", $length - $prefixLen, '0')), intval(str_pad("9", $length - $prefixLen, '9')));
    }

    public static function generateJWT($privateKey, $iss, $sub, $aud, $exp = null, $nbf = null, $jti = null)
    {
        if (!$exp) {
            $exp = time() + 6000;
        }

        $params = array(
            'iss' => $iss,
            'sub' => $sub,
            'aud' => $aud,
            'exp' => $exp,
            'iat' => time(),
        );

        if ($nbf) {
            $params['nbf'] = $nbf;
        }

        if ($jti) {
            $params['jti'] = $jti;
        }

        $jwtUtil = new Jwt();
        return $jwtUtil->encode($params, $privateKey, 'RS256');
    }
}
