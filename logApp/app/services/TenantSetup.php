<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TenantSetup
{
    public static function listTenants()
    {
        return tenancy()->all();
    }

    public function createAndReturnUser($domain, $requestFields)
    {
        config()->set('tenancy.migrate_after_creation', true);
        config()->set('tenancy.seed_after_migration', true);
        config()->set('tenancy.seeder_parameters', ['--class' => 'DatabaseSeeder']);

        $tenant = \Stancl\Tenancy\Tenant::create($domain, ['id' => $requestFields['domain']]);

        return $tenant->run(
            function ($tenant) use ($requestFields) {
                [$first] = explode(' ', $requestFields['name']);
                $last = substr($requestFields['name'], strlen($first));
                $user = \App\User::create([
                    'first' => $first,
                    'last' => $last,
                    'username' => $requestFields['email'],
                    'email' => $requestFields['email'],
                    'password' => Hash::make($requestFields['password']),
                    // OPTIONAL: 'primary_domain' => \strtoupper($requestFields['domain']),
                ]);

                // @TODO: if assigning roles/permissions, do that here too

                return $user;
            }
        );
    }
}