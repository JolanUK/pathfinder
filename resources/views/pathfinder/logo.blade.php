<?php

use App\Settings\StyleSettings;
use Livewire\Component;

new class extends Component
{

};
?>

<img src="{{ asset(app(StyleSettings::class)->logoLight) }}" class="block dark:hidden"  />
<img src="{{ asset(app(StyleSettings::class)->logoDark) }}" class="hidden dark:block"  />