<?php

namespace app\components;
use nodge\eauth\oauth2\Service;
use OAuth\OAuth2\Service\ServiceInterface;

class VKontakte extends Service {

    const SCOPE_FRIENDS = 'friends';
    const SCOPE_EMAIL = 'email';
    const API_VERSION = '5.57';
    protected $name = 'vkontakte';
    protected $title = 'VK.com';
    protected $type = 'OAuth2';
    protected $jsArguments = ['popup' => ['width' => 585, 'height' => 350]];
    protected $scopes = [self::SCOPE_EMAIL];
    protected $providerOptions = [
        'authorize' => 'http://api.vk.com/oauth/authorize',
        'access_token' => 'https://api.vk.com/oauth/access_token',
    ];
    protected $baseApiUrl = 'https://api.vk.com/method/';

    protected function fetchAttributes()
    {

        $tokenData = $this->getAccessTokenData();
        $info = $this->makeSignedRequest('users.get.json', [
            'query' => [
                'uids' => $tokenData['params']['user_id'],
//				'fields' => '', // uid, first_name and last_name is always available
                'fields' => 'nickname, sex, bdate, city, country, timezone, photo_big',
                'v' => self::API_VERSION,
            ],
        ]);

        $info = $info['response'][0];

        $this->attributes['id'] = $info['id'];
        $this->attributes['name'] = $info['first_name'] . ' ' . $info['last_name'];
        $this->attributes['first_name'] = $info['first_name'];
        $this->attributes['last_name'] = $info['last_name'];
        $this->attributes['b_date'] = $info['bdate'];
        $this->attributes['url'] = 'http://vk.com/id' . $info['id'];

        if (!empty($info['nickname']))
            $this->attributes['username'] = $info['nickname'];
        else
            $this->attributes['username'] = 'id'.$info['uid'];

        $this->attributes['gender'] = empty($info['sex']) ? null : ($info['sex'] == 2 ? 1 : 0);

        $this->attributes['email'] = empty($tokenData['params']['email']) ? $info['id'].'@'.'vk.reg' : $tokenData['params']['email'];
        $this->attributes['verified_email'] = empty($tokenData['params']['email']) ? 0 : 1;
        $this->attributes['country'] = $info['country'];
        $this->attributes['city'] = $info['city'];

        $this->attributes['timezone'] = timezone_name_from_abbr('', $info['timezone']*3600, date('I'));;

        $this->attributes['photo'] = $info['photo_big'];

        return true;
    }
    protected function fetchResponseError($response)
    {
        if (isset($response['error'])) {
            return [
                'code' => is_string($response['error']) ? 0 : $response['error']['error_code'],
//				'message' => is_string($response['error']) ? $response['error'] : $response['error']['error_msg'],
//				'message' => is_string($response['error']) ? $response['error'] : $response['error']['error_msg'],
            ];
        } else {
            return null;
        }
    }
    /**
     * @param array $data
     * @return string|null
     */
    public function getAccessTokenResponseError($data)
    {
        if (!isset($data['error'])) {
            return null;
        }
        $error = $data['error'];
        if (isset($data['error_description'])) {
            $error .= ': ' . $data['error_description'];
        }
        return $error;
    }
    /**
     * Returns a class constant from ServiceInterface defining the authorization method used for the API.
     *
     * @return int
     */
    public function getAuthorizationMethod()
    {
        return ServiceInterface::AUTHORIZATION_METHOD_QUERY_STRING;
    }

}