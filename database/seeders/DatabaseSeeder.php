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
                'name' => 'Get Version Information',
                'endpoint' => '/api/getVersions',
                'method' => 'POST',
                'description' => 'This API retrieves version information for a specified product, validates the data, and generates a report or notification based on the outcome.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The unique identifier of the product',
                        'values' => '1',
                    ],
                    [
                        'param' => 'product_key',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The key associated with the product for validation',
                        'values' => '',
                    ],
                    [
                        'param' => 'version_number',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The specific version number to retrieve, if not provided the latest active version will be fetched',
                        'values' => '',
                    ],
                    [
                        'param' => 'user_local_path',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The local path of the user accessing the version information',
                        'values' => '',
                    ],
                    [
                        'param' => 'script_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'A signature to verify the script making the request',
                        'values' => '',
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Get All Versions',
                'endpoint' => '/api/getAllVersions',
                'method' => 'POST',
                'description' => 'This API retrieves all available versions for a specified product, validates the data, and generates a report or notification based on the outcome.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The unique identifier of the product',
                        'values' => '1',
                    ],
                    [
                        'param' => 'product_key',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The key associated with the product for validation',
                        'values' => '',
                    ],
                    [
                        'param' => 'version_number',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The specific version number to retrieve, if not provided, the latest active version will be fetched',
                        'values' => '',
                    ],
                    [
                        'param' => 'user_local_path',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The local path of the user accessing the version information',
                        'values' => '',
                    ],
                    [
                        'param' => 'script_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'A signature to verify the script making the request',
                        'values' => '',
                    ],
                ]),
                'is_active' => 1,
            ],
            [
                'name' => 'Fetch Query',
                'endpoint' => '/api/fetchQuery',
                'method' => 'POST',
                'description' => 'This API handles the installation or upgrade of a specified product version by validating the request data and returning the appropriate response or error details.',
                'parameters' => json_encode([
                    [
                        'param' => 'product_id',
                        'type' => 'Integer',
                        'opt_or_req' => 'Required',
                        'description' => 'The unique identifier of the product',
                        'values' => '1',
                    ],
                    [
                        'param' => 'product_key',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The key associated with the product for validation',
                        'values' => '',
                    ],
                    [
                        'param' => 'version_number',
                        'type' => 'String',
                        'opt_or_req' => 'Optional',
                        'description' => 'The specific version number to fetch or upgrade, if not provided, the latest active version will be used',
                        'values' => '',
                    ],
                    [
                        'param' => 'user_local_path',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The local path of the user where the version will be installed or upgraded',
                        'values' => '',
                    ],
                    [
                        'param' => 'script_signature',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'A signature to verify the authenticity of the request',
                        'values' => '',
                    ],
                    [
                        'param' => 'query_type',
                        'type' => 'String',
                        'opt_or_req' => 'Required',
                        'description' => 'The type of query to execute, either "install" or "upgrade"',
                        'values' => 'upgrade',
                    ],
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
                            'description' => 'The unique identifier of the product',
                            'values' => '1',
                        ],
                        [
                            'param' => 'product_key',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The key associated with the product for validation',
                            'values' => '',
                        ],
                        [
                            'param' => 'version_number',
                            'type' => 'String',
                            'opt_or_req' => 'Optional',
                            'description' => 'The specific version number to retrieve, if not provided, the latest active version will be fetched',
                            'values' => '',
                        ],
                        [
                            'param' => 'user_local_path',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The local path of the user accessing the version information',
                            'values' => '',
                        ],
                        [
                            'param' => 'script_signature',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'A signature to verify the script making the request',
                            'values' => '',
                        ],
                        [
                            'param' => 'file_type',
                            'type' => 'String',
                            'opt_or_req' => 'Required',
                            'description' => 'The type of file to download. Valid values are version_install_file, version_install_query, version_upgrade_file, and version_upgrade_query',
                            'values' => 'version_upgrade_file',
                        ],
                    ]
                ),
                'is_active' => 1,
            ],
        ];

        ApiInfo::insert($api);
    }
}
