<?php

use App\Settings\StyleSettings;
use Livewire\Component;

new class extends Component
{

}
?>

<img src="{{ !empty(app(StyleSettings::class)->logoLight) ? asset(app(StyleSettings::class)->logoLight) : asset('images/logo-light.png') }}" class="block dark:hidden"  />
<img src="{{ !empty(app(StyleSettings::class)->logoDark) ? asset(app(StyleSettings::class)->logoDark) : asset('images/logo-dark.png') }}" class="hidden dark:block"  />