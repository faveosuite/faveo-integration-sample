<?php

namespace Database\Seeders;

use App\Models\ApiCategories;
use App\Models\ApiInfo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->apis();
        $this->category();
    }
    public function apis()
    {
        $api = [
            [
                'name' => 'Connection Test',
                'category_id' => 1,
                'endpoint' => '/api/ConnectionTest',
                'method' => 'POST',
                'description' => 'This API is used to test the connection between the Product and the Agora License Manager.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'connection_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The hash of the connection',
                        'values' => rawurlencode(hash('sha256', 'connection_test')),
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'License Install',
                'category_id' => 1,
                'endpoint' => '/api/licenseInstall',
                'method' => 'POST',
                'description' => 'This is used by script on users machine to check if license is active and add installation details to Agora License Manager database during installation of protected script',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'License Scheme',
                'category_id' => 1,
                'endpoint' => '/api/licenseScheme',
                'method' => 'POST',
                'description' => 'This is used by script on users machine to check if license is active and get MySQL scheme for local license storage from Agora License Manager database during installation of protected script',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'License Verify',
                'category_id' => 1,
                'endpoint' => '/api/licenseVerify',
                'method' => 'POST',
                'description' => 'This is used by script on users machine to check if license is active and add callback details to Agora License Manager database during license check of protected script',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Specific Version Details',
                'category_id' => 1,
                'endpoint' => '/api/getVersions',
                'method' => 'POST',
                'description' => 'This API is used to get the specific version details.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get All Versions Details',
                'category_id' => 1,
                'endpoint' => '/api/getAllVersions',
                'method' => 'POST',
                'description' => 'This API is used to get all version details.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Fetch Query of Specific Version',
                'category_id' => 1,
                'endpoint' => '/api/fetchQuery',
                'method' => 'POST',
                'description' => 'This API is used to fetch MySQL query of a specified version.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Download and Extract Version Files',
                'category_id' => 1,
                'endpoint' => '/api/downloadFile',
                'method' => 'POST',
                'description' => 'This API is used to download and extract archive with files of a specified version.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '8',
                    ],
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The email of the client',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The code of the license',
                        'values' => 'VWNKDSNCJKCNSU89',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => 'https://demo.localhost/',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '75hgvdhgwvkjgweyu2t675672f3kjgb3gbrhg',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => 'uyyf3ytfgvq23ehq3y3tq362t763e2873y81723',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Login',
                'category_id' => 2,
                'endpoint' => '/login',
                'method' => 'POST',
                'description' => 'Authenticates a user and returns an access token.',
                'parameters' => json_encode([
                    [
                        'param' => 'client_email',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The client email or username for login',
                        'values' => 'demo@license.com',
                    ],
                    [
                        'param' => 'client_password',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The password of the client',
                        'values' => 'Demo@123',
                    ],
                    [
                        'param' => 'g-recaptcha-response',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The v3 reCAPTCHA response token',
                        'values' => ' ',
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Forgot Password',
                'category_id' => 2,
                'endpoint' => '/forgot',
                'method' => 'POST',
                'description' => 'Initiates a password reset process by sending a reset link to the user’s email.',
                'parameters' => json_encode([
                [
                    'param' => 'client_email',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The client email for send the reset link',
                    'values' => 'demo@license.com',
                ],
                [
                    'param' => 'g-recaptcha-response',
                    'type' => 'String',
                    'opt_or_req' => 'Optional',
                    'description' => 'The v3 reCAPTCHA response token',
                    'values' => ' ',
                ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Reset Password',
                'category_id' => 2,
                'endpoint' => '/reset',
                'method' => 'POST',
                'description' => 'Resets the user’s password using the token sent to their email.',
                'parameters' => json_encode([
                [
                    'param' => 'email',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The client email for reset the password',
                    'values' => 'demo@license.com',
                ],
                [
                    'param' => 'password',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The new password of the client',
                    'values' => 'Demo@1234',
                ],
                [
                    'param' => 'token',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The token for reset the password',
                    'values' => ' ',
                ],
                [
                    'param' => 'g-recaptcha-response',
                    'type' => 'String',
                    'opt_or_req' => 'Optional',
                    'description' => 'The v3 reCAPTCHA response token',
                    'values' => ' ',
                ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Save Debug Value',
                'category_id' => 2,
                'endpoint' => '/save-debug-value',
                'method' => 'POST',
                'description' => 'Saves the debug settings value.',
                'parameters' => json_encode([
                        [
                            'param' => 'debug',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'This parameter enables or disables the debugging mode in the application.',
                            'values' => 'true or false',
                        ],
                        [
                            'param' => 'user_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the user whose token will be cached or forgotten based on the debug mode.',
                            'values' => ' ',
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get reCAPTCHA Status',
                'category_id' => 2,
                'endpoint' => '/recaptchaStatus',
                'method' => 'GET',
                'description' => 'Retrieves the current status of reCAPTCHA.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Verify Recovery Code',
                'category_id' => 2,
                'endpoint' => '/verify-recovery-code',
                'method' => 'POST',
                'description' => 'Verifies the recovery code provided by the user.',
                'parameters' => json_encode([
                        [
                            'param' => 'recovery_code',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The recovery code provided by the user.',
                            'values' => ' ',
                        ],
                        [
                            'param' => 'PPAuth',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The PPAuth(Encrypted User Id) token for the user.',
                            'values' => ' ',
                        ],
                        [
                            'param' => 'g-recaptcha-response',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The v3 reCAPTCHA response token',
                            'values' => ' ',
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Verify 2FA',
                'category_id' => 2,
                'endpoint' => '/verify2fa',
                'method' => 'POST',
                'description' => 'Verifies the 2FA code provided by the user.',
                'parameters' => json_encode([
                        [
                            'param' => 'totp',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The Authenticator OTP provided by the user.',
                            'values' => ' ',
                        ],
                        [
                            'param' => 'PPAuth',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The PPAuth(Encrypted User Id) token for the user.',
                            'values' => ' ',
                        ],
                        [
                            'param' => 'g-recaptcha-response',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The v3 reCAPTCHA response token',
                            'values' => ' ',
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Enable Two-Factor Authentication',
                'category_id' => 3,
                'endpoint' => '/2fa/enable',
                'method' => 'POST',
                'description' => 'Enables two-factor authentication for the user.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Generate 2FA Recovery Code',
                'category_id' => 3,
                'endpoint' => '/2fa-recovery-code',
                'method' => 'POST',
                'description' => 'Generates a new recovery code for two-factor authentication.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Setup Validate Token',
                'category_id' => 3,
                'endpoint' => '/2fa/setupValidate',
                'method' => 'POST',
                'description' => 'Validates the setup token for two-factor authentication.',
                'parameters' => json_encode([
                        [
                            'param' => 'totp',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The Authenticator OTP provided by the user.',
                            'values' => ' ',
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Disable Two-Factor Authentication',
                'category_id' => 3,
                'endpoint' => '/2fa/disable',
                'method' => 'POST',
                'description' => 'Disables two-factor authentication for the user.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Show Verify Password Popup',
                'category_id' => 3,
                'endpoint' => '/show/verify-password',
                'method' => 'GET',
                'description' => 'Displays a popup for verifying the user’s password.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Download 2FA Recovery Codes',
                'category_id' => 3,
                'endpoint' => '/2fa/downloadRecoveryCode',
                'method' => 'GET',
                'description' => 'Downloads the recovery codes for two-factor authentication.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Verify Password',
                'category_id' => 3,
                'endpoint' => '/verify/password',
                'method' => 'POST',
                'description' => 'Verifies the user’s password for two-factor authentication.',
                'parameters' => json_encode([
                        [
                            'param' => 'password',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The password provided by the user.',
                            'values' => ' ',
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Profile Info',
                'category_id' => 4,
                'endpoint' => '/profile/info',
                'method' => 'GET',
                'description' => 'Retrieves the user’s profile information.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Update Profile',
                'category_id' => 4,
                'endpoint' => '/profile',
                'method' => 'PATCH',
                'description' => 'Updates the user’s profile information.',
                'parameters' => json_encode([
                [
                    'param' => 'client_fname',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The first name of the client.',
                    'values' => ''
                ],
                [
                    'param' => 'client_lname',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The last name of the client.',
                    'values' => ''
                ],
                [
                    'param' => 'client_username',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The username of the client, must be unique.',
                    'values' => ''
                ],
                [
                    'param' => 'client_email',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The email address of the client, must be unique and in a valid email format.',
                    'values' => ''
                ],
                [
                    'param' => 'client_mobile',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The mobile number of the client.',
                    'values' => ''
                ],
                [
                    'param' => 'client_mobile_code',
                    'type' => 'String',
                    'opt_or_req' => 'Optional',
                    'description' => 'The mobile code for the client\'s mobile number.',
                    'values' => ''
                ],
                [
                    'param' => 'client_timezone_id',
                    'type' => 'String',
                    'opt_or_req' => 'Required',
                    'description' => 'The timezone ID for the client.',
                    'values' => ''
                ],
                [
                    'param' => 'client_profile_pic',
                    'type' => 'File',
                    'opt_or_req' => 'Optional',
                    'description' => 'The profile picture of the client. Allowed file types: png, jpeg, jpg.',
                    'values' => ''
                ],
            ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Update Password',
                'category_id' => 4,
                'endpoint' => '/password',
                'method' => 'PATCH',
                'description' => 'Updates the user’s password.',
                'parameters' => json_encode([
                        [
                            'param' => 'old_password',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The current password of the user.',
                            'values' => ''
                        ],
                        [
                            'param' => 'new_password',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The new password that the user wants to set.',
                            'values' => ''
                        ],
                        [
                            'param' => 'confirm_password',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The confirmation of the new password.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Country Code',
                'category_id' => 4,
                'endpoint' => '/countryCode',
                'method' => 'GET',
                'description' => 'Retrieves the All country code.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Add Product',
                'category_id' => 10,
                'endpoint' => '/products/add',
                'method' => 'POST',
                'description' => 'Adds a new product.',
                'parameters' => json_encode([
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The API key secret used for authentication.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_title',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The title of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_sku',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The SKU (Stock Keeping Unit) of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_status',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The status of the product (integer value between 0 and 2).',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_description',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'A description of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_url_homepage',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The URL of the product homepage.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_url_download',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The URL for downloading the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_version',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The version of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_envato_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The Envato ID of the product (should be an integer if provided).',
                        'values' => ''
                    ],
                    [
                        'param' => 'ip_address',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The IP address of the requestor. If not provided, it will be fetched from the server.',
                        'values' => ''
                    ]
                ]),

        'is_active' => 1,
            ],
            [
                'name' => 'View Products',
                'category_id' => 10,
                'endpoint' => '/viewproducts',
                'method' => 'GET',
                'description' => 'Displays the list of products.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Product',
                'category_id' => 10,
                'endpoint' => '/products/delete',
                'method' => 'POST',
                'description' => 'Deletes a product.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the product to be deleted.',
                        'values' => ''
                    ],
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The API key secret used for authentication.',
                        'values' => ''
                    ],
                    [
                        'param' => 'ip_address',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The IP address of the requestor. If not provided, it will be fetched from the server.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Product',
                'category_id' => 10,
                'endpoint' => '/products/edit',
                'method' => 'POST',
                'description' => 'Updates product details.',
                'parameters' => json_encode([
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The API key secret used for authentication.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the product to be updated.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_title',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The title of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_sku',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The SKU (Stock Keeping Unit) of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_status',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The status of the product (integer value between 0 and 2).',
                        'values' => '0, 1, 2'
                    ],
                    [
                        'param' => 'product_description',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'A description of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_url_homepage',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The URL of the product homepage.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_url_download',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The URL for downloading the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_version',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The version of the product.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_envato_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The Envato ID of the product (should be an integer if provided).',
                        'values' => ''
                    ],
                    [
                        'param' => 'ip_address',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The IP address of the requestor. If not provided, it will be fetched from the server.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Product for Editing',
                'category_id' => 10,
                'endpoint' => '/product/{product_id}',
                'method' => 'GET',
                'description' => 'Fetches product details for editing.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the product to retrieve.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Product Details',
                'category_id' => 10,
                'endpoint' => '/productView/{product_id}',
                'method' => 'GET',
                'description' => 'Displays detailed information about a product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product to retrieve details for.',
                            'values' => ''
                        ]
                    ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Product Installations',
                'category_id' => 10,
                'endpoint' => '/productInstallations/{product_id}',
                'method' => 'GET',
                'description' => 'Displays the installations associated with a product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product to retrieve Product Installations.',
                            'values' => ''
                        ]
                    ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Product Licenses',
                'category_id' => 10,
                'endpoint' => '/productLicenses/{product_id}',
                'method' => 'GET',
                'description' => 'Displays the licenses associated with a product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product to retrieve Product Licenses.',
                            'values' => ''
                        ]
                    ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Product Versions',
                'category_id' => 10,
                'endpoint' => '/productVersions/{product_id}',
                'method' => 'GET',
                'description' => 'Displays the versions associated with a product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product to retrieve Product Versions.',
                            'values' => ''
                        ]
                    ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Versions',
                'category_id' => 16,
                'endpoint' => '/viewVersions',
                'method' => 'GET',
                'description' => 'Displays the list of versions.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'View Version Info',
                'category_id' => 16,
                'endpoint' => '/versionView/{version_id}',
                'method' => 'GET',
                'description' => 'Displays detailed information about a specific version.',
                'parameters' =>  json_encode([
                    [
                        'param' => 'version_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the version whose details you want to retrieve.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Version Callbacks',
                'category_id' => 16,
                'endpoint' => '/versionCallbacks/{version_id}',
                'method' => 'GET',
                'description' => 'Displays the callbacks associated with a specific version.',
                'parameters' => json_encode([
                    'param' => 'version_id',
                    'type' => 'Integer',
                    'opt_or_req' => 'Required',
                    'description' => 'The ID of the version for which callbacks are to be retrieved.',
                    'values' => ''
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Add Client',
                'category_id' => 11,
                'endpoint' => '/clients/add',
                'method' => 'POST',
                'description' => 'Adds a new client.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'API key for authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_fname',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'First name of the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_lname',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'Last name of the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_email',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'Email address of the client. Must be a valid email format.',
                            'values' => 'example@example.com'
                        ],
                        [
                            'param' => 'client_username',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Username for the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'Status of the client. Must be an integer between 0 and 2.',
                            'values' => '0, 1, 2'
                        ],
                        [
                            'param' => 'client_role',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Role of the client. Defaults to "client". If set to 0, role is "admin".',
                            'values' => 'admin, client'
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View Client',
                'category_id' => 11,
                'endpoint' => '/viewClients/{client_id}',
                'method' => 'GET',
                'description' => 'Displays the details of a specific client.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'client_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The client ID to exclude from the results.',
                            'values' => 'integer (e.g., 1, 2, 3)'
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Client',
                'category_id' => 11,
                'endpoint' => '/clients/delete',
                'method' => 'POST',
                'description' => 'Deletes a client.',
                'parameters' => json_encode([
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'ID of the client to be deleted.',
                        'values' => ''
                    ],
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'API key for authentication.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Client',
                'category_id' => 11,
                'endpoint' => '/clients/edit',
                'method' => 'POST',
                'description' => 'Updates client details.',
                'parameters' => json_encode([
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'API key for authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'ID of the client to be updated.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_fname',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'First name of the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_lname',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Last name of the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_email',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Email address of the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_username',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Username of the client.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Status of the client (0 for inactive, 1 for active).',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_role',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Role of the client (0 for admin, 1 for client).',
                            'values' => ''
                        ]
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Client for Editing',
                'category_id' => 11,
                'endpoint' => '/client/{client_id}',
                'method' => 'GET',
                'description' => 'Fetches client details for editing.',
                'parameters' => json_encode([
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the client to be edited.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Client Info',
                'category_id' => 11,
                'endpoint' => '/clientView/{client_id}',
                'method' => 'GET',
                'description' => 'Displays detailed information about a client.',
                'parameters' => json_encode([
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the client whose information is being retrieved.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Client Installations',
                'category_id' => 11,
                'endpoint' => '/clientInstallations/{client_id}',
                'method' => 'GET',
                'description' => 'Displays the installations associated with a client.',
                'parameters' => json_encode([
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the client whose installations are being retrieved.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Client Licenses',
                'category_id' => 11,
                'endpoint' => '/clientLicenses/{client_id}',
                'method' => 'GET',
                'description' => 'Displays the licenses associated with a client.',
                'parameters' => json_encode([
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the client whose licenses are being retrieved.',
                        'values' => ''
                    ],

                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Add License',
                'category_id' => 12,
                'endpoint' => '/license/add',
                'method' => 'POST',
                'description' => 'Adds a new license.',
                'parameters' => json_encode([
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'API key for authentication.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the product for which the license is being added.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The unique code for the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_require_domain',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'Indicates whether the license requires a domain (1 for yes, 0 for no).',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_status',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The status of the license (0 for inactive, 1 for active, 2 for expired).',
                        'values' => ''
                    ],
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The ID of the client to whom the license is assigned. If not provided, it will be set to NULL.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_order_number',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The order number associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_ip',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The IP address associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_domain',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The domain associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_limit',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The limit associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_expire_date',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The expiration date of the license in YYYY-MM-DD format.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_updates_date',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The date of the last update for the license in YYYY-MM-DD format.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_support_date',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The support date for the license in YYYY-MM-DD format.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_comments',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'Additional comments related to the license.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Licenses',
                'category_id' => 12,
                'endpoint' => '/viewLicenses',
                'method' => 'GET',
                'description' => 'Displays the list of licenses.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Delete License',
                'category_id' => 12,
                'endpoint' => '/license/delete',
                'method' => 'POST',
                'description' => 'Deletes a license.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license to be deleted.',
                        'values' => ''
                    ],
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'API key for authentication.',
                        'values' => ''
                    ]

                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit License',
                'category_id' => 12,
                'endpoint' => '/license/edit',
                'method' => 'POST',
                'description' => 'Updates license details.',
                'parameters' => json_encode([
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'API key for authentication.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license to be updated.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the product associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_require_domain',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'Whether the license requires a domain.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_status',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The status of the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'client_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The ID of the client associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The code of the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_order_number',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The order number associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_ip',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The IP address associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_domain',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The domain associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_limit',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The limit associated with the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_expire_date',
                        'type' => 'Date',
                        'opt_or_req' => 'Optional',
                        'description' => 'The expiration date of the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_updates_date',
                        'type' => 'Date',
                        'opt_or_req' => 'Optional',
                        'description' => 'The date of the last update to the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_support_date',
                        'type' => 'Date',
                        'opt_or_req' => 'Optional',
                        'description' => 'The date of the last support for the license.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_comments',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'Comments associated with the license.',
                        'values' => ''
                    ]

                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get License for Editing',
                'category_id' => 12,
                'endpoint' => '/license/{license_id}',
                'method' => 'GET',
                'description' => 'Fetches license details for editing.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license to be retrieved.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Deactivate License',
                'category_id' => 12,
                'endpoint' => '/license/deactivate',
                'method' => 'POST',
                'description' => 'Deactivates a license.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The license code of the license to be deactivated.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Update License Code',
                'category_id' => 12,
                'endpoint' => '/license/updateLicenseCode',
                'method' => 'POST',
                'description' => 'Updates the license code.',
                'parameters' => json_encode([
                    [
                        'param' => 'old_license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The current license code that needs to be updated.',
                        'values' => ''
                    ],
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The new license code to replace the old one.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View License Details',
                'category_id' => 12,
                'endpoint' => '/licenseView/{license_id}',
                'method' => 'GET',
                'description' => 'Displays detailed information about a license.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license to be retrieved.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View License Installations',
                'category_id' => 12,
                'endpoint' => '/licenseInstallation/{license_id}',
                'method' => 'GET',
                'description' => 'Displays the installations associated with a license.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license for which installations are being retrieved.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View License Callbacks',
                'category_id' => 12,
                'endpoint' => '/licenseCallbacks/{license_id}',
                'method' => 'GET',
                'description' => 'Displays the callbacks associated with a license.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license for which callbacks are being retrieved.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get License Columns',
                'category_id' => 12,
                'endpoint' => '/getLicenseColumn',
                'method' => 'GET',
                'description' => 'Retrieves the user specific license columns.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Save License Columns',
                'category_id' => 12,
                'endpoint' => '/saveLicenseColumn',
                'method' => 'POST',
                'description' => 'Saves the user specific license columns.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'View License Installation Logs',
                'category_id' => 12,
                'endpoint' => '/installationLogs/{id}',
                'method' => 'GET',
                'description' => 'Displays the installation logs associated with a license.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the license for which installation logs are being retrieved.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Installations',
                'category_id' => 13,
                'endpoint' => '/installations/delete',
                'method' => 'POST',
                'description' => 'Deletes specific installations.',
                'parameters' => json_encode([
                    [
                        'param' => 'installation_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the installation record to be deleted.',
                        'values' => 'integer (e.g., 123)'
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Installation',
                'category_id' => 13,
                'endpoint' => '/installations/edit',
                'method' => 'POST',
                'description' => 'Updates installation details.',
                'parameters' => json_encode([
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The API key secret for authentication.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the installation to be updated.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_ip',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The IP address of the installation.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_status',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'The status of the installation.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_disable_ip',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'Flag to disable IP verification.',
                        'values' => ''
                    ],
                    [
                        'param' => 'delete_record',
                        'type' => 'Integer',
                        'opt_or_req' => 'Optional',
                        'description' => 'Flag to indicate if the record should be deleted.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'View Installations',
                'category_id' => 13,
                'endpoint' => '/viewInstallations',
                'method' => 'GET',
                'description' => 'Displays the list of installations.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Add Installation',
                'category_id' => 13,
                'endpoint' => '/addInstallation',
                'method' => 'POST',
                'description' => 'Adds a new installation.',
                'parameters' => json_encode([
                    [
                        'param' => 'license_code',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The license code associated with the installation.',
                        'values' => ''
                    ],
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the product being installed.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_domain',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain where the installation is taking place.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_date',
                        'type' => 'Date',
                        'opt_or_req' => 'Required',
                        'description' => 'The date of the installation.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_status',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The status of the installation.',
                        'values' => ''
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'A hash associated with the installation for verification.',
                        'values' => ''
                    ],
                    [
                        'param' => 'api_key_secret',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The API key secret for authenticating the request.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Installation for Editing',
                'category_id' => 13,
                'endpoint' => '/installation/{installation_id}',
                'method' => 'GET',
                'description' => 'Fetches installation details for editing.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'installation_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the installation to be retrieved.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Reissue Installation',
                'category_id' => 13,
                'endpoint' => '/installation/reissue',
                'method' => 'POST',
                'description' => 'Removes unwanted installations.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'installation_path',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The domain path of the installations to be removed.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Update Installation License Code',
                'category_id' => 13,
                'endpoint' => '/installation/updateLicenseCode',
                'method' => 'POST',
                'description' => 'Updates the license code for an installation.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'old_license_code',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The old license code that needs to be deleted.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View Installation Details',
                'category_id' => 13,
                'endpoint' => '/installationView/{installation_id}',
                'method' => 'GET',
                'description' => 'Displays detailed information about an installation.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'installation_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the installation to retrieve.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View Installation Callbacks',
                'category_id' => 13,
                'endpoint' => '/installationCallbacks/{installation_id}',
                'method' => 'GET',
                'description' => 'Displays the callbacks associated with an installation.',
                'parameters' => json_encode([
                    [
                        'param' => 'installation_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the installation whose callbacks are to be retrieved.',
                        'values' => ''
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Add Banned Host',
                'category_id' => 14,
                'endpoint' => '/bannedHosts/add',
                'method' => 'POST',
                'description' => 'Adds a new banned host.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used for authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The IP address to be banned.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_comments',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Comments or notes related to the banned IP.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_blocks',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Number of times the IP has been blocked.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_last_block_date',
                            'type' => 'DateTime',
                            'opt_or_req' => 'Optional',
                            'description' => 'The date and time of the last block for the IP.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Banned Host',
                'category_id' => 14,
                'endpoint' => '/bannedHosts/delete',
                'method' => 'POST',
                'description' => 'Deletes a banned host.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used for authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the banned host to be removed.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Banned Host',
                'category_id' => 14,
                'endpoint' => '/bannedHosts/edit',
                'method' => 'POST',
                'description' => 'Updates details of a banned host.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'banned_host_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the banned host to be updated.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used for authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The IP address of the banned host.',
                            'values' => ''
                        ],
                        [
                            'param' => 'banned_host_comments',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Additional comments related to the banned host.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View Banned Hosts',
                'category_id' => 14,
                'endpoint' => '/viewBannedHost',
                'method' => 'GET',
                'description' => 'Displays the list of banned hosts.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'View Banned Host Details',
                'category_id' => 14,
                'endpoint' => '/viewBannedHost/{banned_host_id}',
                'method' => 'GET',
                'description' => 'Displays details of a specific banned host.',
                'parameters' => json_encode([
                    [
                        'param' => 'banned_host_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The ID of the banned host to retrieve.',
                        'values' => ''
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Update or Create Whitelist IP',
                'category_id' => 15,
                'endpoint' => '/whitelist/updateOrCreate',
                'method' => 'POST',
                'description' => 'Adds or updates a whitelist IP.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'whitelist_host_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The IP address to be added to the whitelist.',
                            'values' => ''
                        ],
                        [
                            'param' => 'whitelist_host_comments',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Additional comments or notes about the whitelisted IP.',
                            'values' => ''
                        ],
                        [
                            'param' => 'id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The ID of the whitelist entry to update. If not provided, a new entry will be created.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Whitelist IP',
                'category_id' => 15,
                'endpoint' => '/whitelist-edit/{id}',
                'method' => 'GET',
                'description' => 'Fetches details for editing a whitelist IP.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'whitelist_host_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the whitelist entry to be retrieved for editing.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Whitelist IP',
                'category_id' => 15,
                'endpoint' => '/delete-whitelist-ip',
                'method' => 'POST',
                'description' => 'Deletes a whitelist IP.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'whitelist_host_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the whitelist entry to be deleted.',
                            'values' => 'integer (e.g., 1)'
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View Whitelist IPs',
                'category_id' => 15,
                'endpoint' => '/view-Whitelist',
                'method' => 'GET',
                'description' => 'Displays the list of whitelist IPs.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Create or Update Common Setting',
                'category_id' => 8,
                'endpoint' => '/common-setting',
                'method' => 'POST',
                'description' => 'Creates or updates a common setting.',
                'parameters' => json_encode([
                    [
                        [
                            'param' => 'google_site_key',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The public site key for Google v3 reCAPTCHA.',
                            'values' => ''
                        ],
                        [
                            'param' => 'google_secret_key',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The secret key for Google v3 reCAPTCHA',
                            'values' => 'string'
                        ],
                        [
                            'param' => 'g-recaptcha-response',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The response token from Google v3 reCAPTCHA.',
                            'values' => 'string'
                        ],
                        [
                            'param' => 'recaptcha_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The status of reCAPTCHA (e.g., 1 for enabled, 0 for disabled).',
                            'values' => ''
                        ],
                        [
                            'param' => 'agora_invoicing_url',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'URL for Agora invoicing; must be a valid URL.',
                            'values' => ''
                        ],
                        [
                            'param' => 'timezone',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Timezone identifier; must be an integer.',
                            'values' => ''
                        ],
                        [
                            'param' => 'time_format',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Time format identifier; must be an integer.',
                            'values' => ''
                        ],
                        [
                            'param' => 'date_format',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Date format identifier; must be an integer.',
                            'values' => ''
                        ],
                        [
                            'param' => 'icon',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'Image file for the icon; must be a PNG, JPG, JPEG, or GIF and no larger than 2 MB.',
                            'values' => ''
                        ],
                        [
                            'param' => 'admin_logo',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'Image file for the admin logo; must be a PNG, JPG, JPEG, or GIF and no larger than 2 MB.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_logo',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'Image file for the client logo; must be a PNG, JPG, JPEG, or GIF and no larger than 2 MB.',
                            'values' => ''
                        ],
                        [
                            'param' => 'icon_default',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Indicates if the default icon should be used.',
                            'values' => ''
                        ],
                        [
                            'param' => 'admin_logo_default',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Indicates if the default admin logo should be used.',
                            'values' => ''
                        ],
                        [
                            'param' => 'client_logo_default',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Indicates if the default client logo should be used.',
                            'values' => ''
                        ]
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Common Setting',
                'category_id' => 8,
                'endpoint' => '/common-setting/get',
                'method' => 'GET',
                'description' => 'Retrieves the current common setting.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Reset Common Setting',
                'category_id' => 8,
                'endpoint' => '/common-setting/reset',
                'method' => 'POST',
                'description' => 'Clears the common setting.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Timezones',
                'category_id' => 8,
                'endpoint' => '/timezones',
                'method' => 'GET',
                'description' => 'Retrieves a dropdown list of timezones.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Date Formats',
                'category_id' => 8,
                'endpoint' => '/date-formats',
                'method' => 'GET',
                'description' => 'Retrieves a dropdown list of date formats.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Time Formats',
                'category_id' => 8,
                'endpoint' => '/time-formats',
                'method' => 'GET',
                'description' => 'Retrieves a dropdown list of time formats.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Cleanup Settings',
                'category_id' => 9,
                'endpoint' => '/cleanupSettings',
                'method' => 'GET',
                'description' => 'Retrieves dropdown options for cleanup settings.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Clean Settings',
                'category_id' => 9,
                'endpoint' => '/cleanSettings',
                'method' => 'GET',
                'description' => 'Retrieves options for clean settings.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Save Interval Settings',
                'category_id' => 9,
                'endpoint' => '/saveintervalSettings',
                'method' => 'POST',
                'description' => 'Saves the interval settings.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'DATABASE_CLEANUP_CALLBACKS',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The interval for database cleanup related to callbacks in days.',
                            'values' => ''
                        ],
                        [
                            'param' => 'DATABASE_CLEANUP_REPORTS_MAIN',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The interval for database cleanup related to main reports in days.',
                            'values' => ''
                        ],
                        [
                            'param' => 'DATABASE_CLEANUP_REPORTS_SYSTEM',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The interval for database cleanup related to system reports in days.',
                            'values' => ''
                        ],
                        [
                            'param' => 'DATABASE_CLEANUP_REPORTS_LICENSES',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The interval for database cleanup related to license reports in days.',
                            'values' => ''
                        ],
                        [
                            'param' => 'DATABASE_CLEANUP_VERSIONS',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The interval for database cleanup related to version records in days.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Save License Expire Range',
                'category_id' => 9,
                'endpoint' => '/saveLicenseExpireRange',
                'method' => 'POST',
                'description' => 'Saves the license expiration range.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'count',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The number of days from today to determine the end date for the license expiration range.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Updates Expirings',
                'category_id' => 9,
                'endpoint' => '/getUpdatesExpirings',
                'method' => 'GET',
                'description' => 'Retrieves information about expiring updates.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Save Support Expire Range',
                'category_id' => 9,
                'endpoint' => '/saveSupportExpireRange',
                'method' => 'POST',
                'description' => 'Saves the support expiration range.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'count',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The number of days from today to determine the end date for the support expiration range.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Support Expirings',
                'category_id' => 9,
                'endpoint' => '/getSupportExpirings',
                'method' => 'GET',
                'description' => 'Retrieves information about expiring support.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Debugger',
                'category_id' => 9,
                'endpoint' => '/getDebugger',
                'method' => 'GET',
                'description' => 'Retrieves debugger settings.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Get Cron Time Commands',
                'category_id' => 9,
                'endpoint' => '/cronTimeCommands',
                'method' => 'GET',
                'description' => 'Retrieves commands for cron time settings.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Verify PHP Path',
                'category_id' => 9,
                'endpoint' => '/verify-php-path',
                'method' => 'POST',
                'description' => 'Verifies the PHP executable path.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'path',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The file path to the PHP executable that needs to be checked.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Handle Notification',
                'category_id' => 7,
                'endpoint' => '/notifications/{notification_id}',
                'method' => 'POST',
                'description' => 'Handles the specified notification.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'notification_product_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the product is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_product_inactive',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the product is inactive.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_license_ok',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the license is valid.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_license_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the license is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_invalid_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when an invalid IP is detected.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_invalid_domain',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when an invalid domain is detected.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_domain_required',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when a domain is required but not provided.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_domain_in_use',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the domain is already in use.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_license_suspended',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the license is suspended.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_license_expired',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the license has expired.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_updates_expired',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when updates have expired.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_support_expired',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when support has expired.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_license_cancelled',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the license is cancelled.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_license_limit',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the license limit is reached.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_installation_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the installation is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_invalid_signature',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when an invalid signature is detected.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_host_banned',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when the host is banned.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_unknown_error',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The notification message displayed when an unknown error occurs.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Send Emails',
                'category_id' => 7,
                'endpoint' => '/emails',
                'method' => 'POST',
                'description' => 'Sends emails based on the request.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'email_expiring_license_subject',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The subject of the email notification for an expiring license.',
                            'values' => ''
                        ],
                        [
                            'param' => 'email_expiring_license_text',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The body text of the email notification for an expiring license.',
                            'values' => ''
                        ],
                        [
                            'param' => 'email_expiring_updates_subject',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The subject of the email notification for expiring updates.',
                            'values' => ''
                        ],
                        [
                            'param' => 'email_expiring_updates_text',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The body text of the email notification for expiring updates.',
                            'values' => ''
                        ],
                        [
                            'param' => 'email_expiring_support_subject',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The subject of the email notification for expiring support.',
                            'values' => ''
                        ],
                        [
                            'param' => 'email_expiring_support_text',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The body text of the email notification for expiring support.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View Notifications',
                'category_id' => 7,
                'endpoint' => '/viewNotifications',
                'method' => 'GET',
                'description' => 'Retrieves a list of notifications.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'View Emails',
                'category_id' => 7,
                'endpoint' => '/viewEmails',
                'method' => 'GET',
                'description' => 'Retrieves a list of emails.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Generate Config',
                'category_id' => 22,
                'endpoint' => '/config',
                'method' => 'POST',
                'description' => 'Generates configuration settings.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'product_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product for which the configuration is being generated.',
                            'values' => ''
                        ],
                        [
                            'param' => 'License_Verification_Period',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The number of days for the license verification period. Must be between 1 and 365.',
                            'values' => ''
                        ],
                        [
                            'param' => 'License_Storage_type',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The type of storage for the license. Must be either "DATABASE" or "FILE".',
                            'values' => ''
                        ],
                        [
                            'param' => 'MySQL_Table_Name',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The name of the MySQL table to store license information.',
                            'values' => ''
                        ],
                        [
                            'param' => 'Database_License_File_Location',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The location of the license file in the database.',
                            'values' => ''
                        ],
                        [
                            'param' => 'Delete_Cancelled_License',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Whether to delete cancelled licenses. Can be "true" or "false".',
                            'values' => ''
                        ],
                        [
                            'param' => 'Delete_Cracked_License',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Whether to delete cracked licenses. Can be "true" or "false".',
                            'values' => ''
                        ],
                        [
                            'param' => 'God_Mode',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Whether to enable God Mode. Can be "true" or "false".',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Exception Logs',
                'category_id' => 20,
                'endpoint' => '/logs/exception',
                'method' => 'GET',
                'description' => 'Retrieves the exception logs.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Search',
                'category_id' => 23,
                'endpoint' => '/search',
                'method' => 'POST',
                'description' => 'Performs a search based on the request.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used for authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'search_type',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The type of search to perform. Determines which data will be searched.(e.g., "banned_host", "callback", "client", "installation", "license", "product", "report", "version")',
                            'values' => ''
                        ],
                        [
                            'param' => 'search_keyword',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The keyword to search for within the specified type.',
                            'values' => ''
                        ],
                        [
                            'param' => 'date_from',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The start date for the search period in YYYY-MM-DD format. Default is the system’s default start date.',
                            'values' => ''
                        ],
                        [
                            'param' => 'date_to',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The end date for the search period in YYYY-MM-DD format. Default is to include all records without an end date.',
                            'values' => ''
                        ],
                        [
                            'param' => 'isLicenseSearchApi',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Indicates whether the search is for license data. A flag for determining the type of API request.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Add New API Key',
                'category_id' => 17,
                'endpoint' => '/addnewapi',
                'method' => 'POST',
                'description' => 'Adds a new API key.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The secret key for the API.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Comma-separated list of IP addresses that are allowed to use the API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_clients_add',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to add clients using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_clients_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to edit clients using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_licenses_add',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to add licenses using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_licenses_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to edit licenses using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_products_add',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to add products using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_products_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to edit products using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_installations_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to edit installations using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_search',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Required',
                            'description' => 'Permission to perform searches using this API key.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_status',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'Status of the API key (e.g., "active", "inactive").',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_description',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Description of the API key.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit API Key',
                'category_id' => 17,
                'endpoint' => '/editnewapi/{api_key_id}',
                'method' => 'POST',
                'description' => 'Updates an existing API key.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The secret key for the API. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Comma-separated list of IP addresses that are allowed to use the API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_clients_add',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to add clients using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_clients_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to edit clients using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_licenses_add',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to add licenses using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_licenses_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to edit licenses using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_products_add',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to add products using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_products_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to edit products using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_installations_edit',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to edit installations using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_search',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'Permission to perform searches using this API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_status',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Status of the API key (e.g., "active", "inactive"). Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_description',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Description of the API key. Leave empty if you do not want to change it.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the API key to update.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete API Key',
                'category_id' => 17,
                'endpoint' => '/deleteapi/{api_key_id}',
                'method' => 'POST',
                'description' => 'Deletes the specified API key.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the API key to delete.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View API Key',
                'category_id' => 17,
                'endpoint' => '/viewApiKeys/{api_key_id}',
                'method' => 'GET',
                'description' => 'Retrieves details of the specified API key.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the API key to retrieve.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Report',
                'category_id' => 21,
                'endpoint' => '/reports/delete',
                'method' => 'POST',
                'description' => 'Deletes a specified report.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'arr',
                            'type' => 'Array of Integers',
                            'opt_or_req' => 'Required',
                            'description' => 'An array of report IDs to be deleted.',
                            'values' => ''
                        ],
                        [
                            'param' => 'which_report',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'A string indicating which report type is being deleted.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'System Report',
                'category_id' => 21,
                'endpoint' => '/reportSystem',
                'method' => 'GET',
                'description' => 'Retrieves the system report array.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'License Report',
                'category_id' => 21,
                'endpoint' => '/reportLicense',
                'method' => 'GET',
                'description' => 'Retrieves the license report array.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Cracking Report',
                'category_id' => 21,
                'endpoint' => '/reportCracking',
                'method' => 'GET',
                'description' => 'Retrieves the cracking report array.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Update Report',
                'category_id' => 21,
                'endpoint' => '/reportUpdate',
                'method' => 'GET',
                'description' => 'Retrieves the update report array.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Add Afu Product',
                'category_id' => 10,
                'endpoint' => '/products/UpdateAdd',
                'method' => 'POST',
                'description' => 'Adds a new Afu product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The secret key for API authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The ID of the product (used for updates).',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_title',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The title of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_sku',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The SKU (Stock Keeping Unit) of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_short_description',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'A short description of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_full_description',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'A detailed description of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_key',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'A key associated with the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The status of the product. Valid values are 0, 1, or 2.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_url_homepage',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The URL of the product homepage.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_url_order',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The URL where the product can be ordered.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_price',
                            'type' => 'Decimal',
                            'opt_or_req' => 'Optional',
                            'description' => 'The price of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_max_active_versions',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The maximum number of active versions allowed for the product.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Afu Product',
                'category_id' => 10,
                'endpoint' => '/products/UpdateDelete',
                'method' => 'POST',
                'description' => 'Deletes or updates a product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'product_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product to be deleted.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The secret key for API authentication.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Update Afu Product',
                'category_id' => 10,
                'endpoint' => '/products/UpdateEdit',
                'method' => 'POST',
                'description' => 'Updates an existing product.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The secret key for API authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The ID of the product (used for updates).',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_title',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The title of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_sku',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The SKU (Stock Keeping Unit) of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_short_description',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'A short description of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_full_description',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'A detailed description of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_key',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'A key associated with the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The status of the product. Valid values are 0, 1, or 2.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_url_homepage',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The URL of the product homepage.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_url_order',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The URL where the product can be ordered.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_price',
                            'type' => 'Decimal',
                            'opt_or_req' => 'Optional',
                            'description' => 'The price of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'product_max_active_versions',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The maximum number of active versions allowed for the product.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Products',
                'category_id' => 10,
                'endpoint' => '/afuProducts',
                'method' => 'GET',
                'description' => 'Retrieves a list of products.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Add Version',
                'category_id' => 16,
                'endpoint' => '/versions/add',
                'method' => 'POST',
                'description' => 'Adds a new version.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'product_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product for which the version is being added.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The secret key for API authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_number',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The version number of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The status of the version (e.g., 0 for inactive, 1 for active).',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_install_file',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The installation archive file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_install_query',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The installation query file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_raw_install_query',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The raw installation query for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_upgrade_file',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The upgrade archive file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_upgrade_query',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The upgrade query file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_raw_upgrade_query',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The raw upgrade query for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_install_limit',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The limit on the number of installations for this version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_upgrade_limit',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The limit on the number of upgrades for this version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_changelog',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The changelog for this version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_expire_date',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The expiration date of the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_comments',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Additional comments about the version.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Version',
                'category_id' => 16,
                'endpoint' => '/versions/edit',
                'method' => 'POST',
                'description' => 'Updates an existing version.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'product_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the product for which the version is being Updated.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The secret key for API authentication.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_number',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The version number of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The status of the version (e.g., 0 for inactive, 1 for active).',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_install_file',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The installation archive file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_install_query',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The installation query file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_raw_install_query',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The raw installation query for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_upgrade_file',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The upgrade archive file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_upgrade_query',
                            'type' => 'File',
                            'opt_or_req' => 'Optional',
                            'description' => 'The upgrade query file for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_raw_upgrade_query',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The raw upgrade query for the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_install_limit',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The limit on the number of installations for this version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_upgrade_limit',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The limit on the number of upgrades for this version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_changelog',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The changelog for this version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_expire_date',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The expiration date of the version.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_comments',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Additional comments about the version.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Version',
                'category_id' => 16,
                'endpoint' => '/versions/delete',
                'method' => 'POST',
                'description' => 'Deletes a specified version.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'version_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the version to be deleted.',
                            'values' => ''
                        ],
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key used to authenticate the request.',
                            'values' => ''
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Set Directory Path',
                'category_id' => 18,
                'endpoint' => '/setPath',
                'method' => 'POST',
                'description' => 'Sets the directory path.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'archives_path',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The path to the archives directory.',
                            'values' => ''
                        ],
                        [
                            'param' => 'query_path',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The path to the queries directory.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Update Notification Fields',
                'category_id' => 7,
                'endpoint' => '/updateNotifications/{notification_id}',
                'method' => 'POST',
                'description' => 'Updates the fields of a specific notification.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'notification_operation_ok',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message for successful operation.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_product_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the product is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_product_inactive',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the product is inactive.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_product_no_versions',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when there are no versions of the product.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_version_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the version is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_version_inactive',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the version is inactive.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_version_expired',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the version has expired.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_install_limit_reached',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the installation limit is reached.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_upgrade_limit_reached',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the upgrade limit is reached.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_install_archive_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the installation archive is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_install_query_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the installation query is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_upgrade_archive_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the upgrade archive is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_upgrade_query_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the upgrade query is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_raw_install_query_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the raw installation query is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_raw_upgrade_query_not_found',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the raw upgrade query is not found.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_installation_not_verified',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the installation is not verified.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_invalid_parameter',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message for invalid parameters.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_invalid_signature',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message for invalid signatures.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_host_banned',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message when the host is banned.',
                            'values' => ''
                        ],
                        [
                            'param' => 'notification_unknown_error',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'Notification message for unknown errors.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Show Update Notifications',
                'category_id' => 7,
                'endpoint' => '/showUpdateNotifications',
                'method' => 'GET',
                'description' => 'Retrieves a list of updated notifications.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Show License Callbacks',
                'category_id' => 19,
                'endpoint' => '/showLicenseCallbacks',
                'method' => 'GET',
                'description' => 'Retrieves the list of license callbacks.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Show Update Callbacks',
                'category_id' => 19,
                'endpoint' => '/showUpdateCallbacks',
                'method' => 'GET',
                'description' => 'Retrieves the list of update callbacks.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Delete Callback',
                'category_id' => 19,
                'endpoint' => '/callbackdelete',
                'method' => 'POST',
                'description' => 'Deletes a specific callback.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'call',
                            'type' => 'Array of Integers',
                            'opt_or_req' => 'Required',
                            'description' => 'An array of callback IDs to be deleted.',
                            'values' => ''
                        ],
                        [
                            'param' => 'isLicense',
                            'type' => 'Boolean',
                            'opt_or_req' => 'Optional',
                            'description' => 'A flag indicating whether the operation involves license-related callbacks.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Edit Updated Installation',
                'category_id' => 13,
                'endpoint' => '/updatedInstallation/edit',
                'method' => 'POST',
                'description' => 'Edits an updated installation.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used to authenticate the request.',
                            'values' => ''
                        ],
                        [
                            'param' => 'installation_id',
                            'type' => 'Integer',
                            'opt_or_req' => 'Required',
                            'description' => 'The ID of the installation to be updated.',
                            'values' => ''
                        ],
                        [
                            'param' => 'installation_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The IP address associated with the installation.',
                            'values' => ''
                        ],
                        [
                            'param' => 'installation_status',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'The status of the installation. Valid values are 0, 1, or 2.',
                            'values' => ''
                        ],
                        [
                            'param' => 'delete_record',
                            'type' => 'Integer',
                            'opt_or_req' => 'Optional',
                            'description' => 'Flag indicating whether the record should be deleted. Set to 1 to delete the record.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Show Updated Installations',
                'category_id' => 13,
                'endpoint' => '/showUpdateInstall',
                'method' => 'GET',
                'description' => 'Retrieves a list of updated installations.',
                'parameters' => null,
                'is_active' => 1,
            ],
            [
                'name' => 'Update Installation Logs',
                'category_id' => 12,
                'endpoint' => '/updateInstallationLogs',
                'method' => 'POST',
                'description' => 'Updates the installation logs.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used to authenticate the request.',
                            'values' => ''
                        ],
                        [
                            'param' => 'root_url',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The root URL of the installation for domain extraction.',
                            'values' => ''
                        ],
                        [
                            'param' => 'version_number',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The version number of the installation.',
                            'values' => ''
                        ],
                        [
                            'param' => 'installation_ip',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The IP address associated with the installation.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'Get Installation Logs',
                'category_id' => 12,
                'endpoint' => '/getInstallationLogs',
                'method' => 'POST',
                'description' => 'Retrieves the installation logs.',
                'parameters' => json_encode(
                    [
                        [
                            'param' => 'api_key_secret',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The API key secret used to authenticate the request.',
                            'values' => ''
                        ],
                        [
                            'param' => 'license_code',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The license code to retrieve installation logs for.',
                            'values' => ''
                        ]
                    ]
                ),
                'is_active' => 1,
            ],
            [
                'name' => 'View API Keys',
                'category_id' => 17,
                'endpoint' => '/admin/viewApiKeys',
                'method' => 'GET',
                'description' => 'Retrieves a list of API keys.',
                'parameters' => null,
                'is_active' => 1,
            ],
        ];

        ApiInfo::insert($api);
    }
    public function category()
    {
        $categories = [
            ['category_id' => 1, 'category' => 'A Product to License Manager', 'description' => 'APIs for handling license management, verification, and related processes.'],
            ['category_id' => 2, 'category' => 'User Login and Password Reset', 'description' => 'APIs for user authentication, including login, password recovery, and reset.'],
            ['category_id' => 3, 'category' => 'Two-Factor Authentication', 'description' => 'APIs for managing two-factor authentication settings and processes.'],
            ['category_id' => 4, 'category' => 'Profile', 'description' => 'APIs for managing user profiles, including updates and viewing profile information.'],
            ['category_id' => 5, 'category' => 'Security Settings', 'description' => 'APIs for managing security configurations and settings.'],
            ['category_id' => 6, 'category' => 'Email Settings', 'description' => 'APIs for configuring and managing email settings and notifications.'],
            ['category_id' => 7, 'category' => 'Notification', 'description' => 'APIs for managing notifications and related settings.'],
            ['category_id' => 8, 'category' => 'General Settings', 'description' => 'APIs for managing general application settings and configurations.'],
            ['category_id' => 9, 'category' => 'Cleanup Settings', 'description' => 'APIs for managing application cleanup and maintenance tasks.'],
            ['category_id' => 10, 'category' => 'Products', 'description' => 'APIs for managing products, including creation, updates, and deletion.'],
            ['category_id' => 11, 'category' => 'Clients', 'description' => 'APIs for managing client information and operations.'],
            ['category_id' => 12, 'category' => 'Licenses', 'description' => 'APIs for managing licenses, including issuance, updates, and verification.'],
            ['category_id' => 13, 'category' => 'Installations', 'description' => 'APIs for managing installation processes and related data.'],
            ['category_id' => 14, 'category' => 'Banned Hosts', 'description' => 'APIs for managing and monitoring banned hosts.'],
            ['category_id' => 15, 'category' => 'Whitelist', 'description' => 'APIs for managing IP whitelist settings.'],
            ['category_id' => 16, 'category' => 'Versions', 'description' => 'APIs for retrieving and managing version information.'],
            ['category_id' => 17, 'category' => 'API Keys', 'description' => 'APIs for creating, updating, and deleting API keys.'],
            ['category_id' => 18, 'category' => 'Directory', 'description' => 'APIs for setting and managing directory paths for archives and queries.'],
            ['category_id' => 19, 'category' => 'Callback', 'description' => 'APIs for handling and managing callbacks related to updates and licenses.'],
            ['category_id' => 20, 'category' => 'Exception Logs', 'description' => 'APIs for accessing and managing exception logs.'],
            ['category_id' => 21, 'category' => 'Report', 'description' => 'APIs for generating and managing reports on licenses, updates, and other activities.'],
            ['category_id' => 22, 'category' => 'Config Generator', 'description' => 'APIs for generating config.'],
            ['category_id' => 23, 'category' => 'Search', 'description' => 'Performs a search based on the request.'],
        ];

        foreach ($categories as $category) {
           ApiCategories::updateOrInsert(
                ['category_id' => $category['category_id']],
                ['category' => $category['category'], 'description' => $category['description']]
            );
        }
    }
}
