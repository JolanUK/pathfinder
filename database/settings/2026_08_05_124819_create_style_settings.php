<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('style.logoLight', '/public/images/logo-light.png');
        $this->migrator->add('style.logoDark', '/public/images/logo-dark.png');
        $this->migrator->add('style.primaryLight', '');
        $this->migrator->add('style.secondaryLight', '');
        $this->migrator->add('style.tertiaryLight', '');
        $this->migrator->add('style.quaternaryLight', '');
        $this->migrator->add('style.primaryDark', '');
        $this->migrator->add('style.secondaryDark', '');
        $this->migrator->add('style.tertiaryDark', '');
        $this->migrator->add('style.quaternaryDark', '');
    }
};
