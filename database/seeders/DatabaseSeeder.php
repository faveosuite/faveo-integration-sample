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
    }
    public function apis()
    {
        $api = [
            [
                'name' => 'Connection Test',
                'endpoint' => '/api/ConnectionTest',
                'method' => 'POST',
                'description' => 'This API is used to test the connection between the Product and the Agora License Manager.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '1',
                    ],
                    [
                        'param' => 'connection_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The hash of the connection',
                        'values' => '',
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'License Install',
                'endpoint' => '/api/licenseInstall',
                'method' => 'POST',
                'description' => 'This is used by script on users machine to check if license is active and add installation details to Agora License Manager database during installation of protected script',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '1',
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
                        'values' => '',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => '',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => '',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'License Scheme',
                'endpoint' => '/api/licenseScheme',
                'method' => 'POST',
                'description' => 'This is used by script on users machine to check if license is active and get MySQL scheme for local license storage from Agora License Manager database during installation of protected script',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '1',
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
                        'values' => '',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => '',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => '',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'License Verify',
                'endpoint' => '/api/licenseVerify',
                'method' => 'POST',
                'description' => 'This is used by script on users machine to check if license is active and add callback details to Agora License Manager database during license check of protected script',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '1',
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
                        'values' => '',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => '',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => '',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Specific Version Details',
                'endpoint' => '/api/getVersions',
                'method' => 'POST',
                'description' => 'This API is used to get the specific version details.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The key of the product Id',
                        'values' => '1',
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
                        'values' => '',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => '',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => '',
                    ]
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get All Versions Details',
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
                        'values' => '',
                    ],
                    [
                        'param' => 'root_url',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The domain URL of the product',
                        'values' => '',
                    ],
                    [
                        'param' => 'installation_hash',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the installation',
                        'values' => '',
                    ],
                    [
                        'param' => 'license_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The random hash of the license',
                        'values' => '',
                    ]
                ]),
                'is_active' => 1,
            ],
        ];

        ApiInfo::insert($api);
    }
}
