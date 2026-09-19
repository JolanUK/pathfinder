<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('global.appName', 'Pathfinder');
        $this->migrator->add('global.currentTerm', 1);
    }
};
