<?php

use Livewire\Component;

new class extends Component
{

};
?>

@php
    $logoLight = config('style.logoLight') ?? ''; 
    $logoDark = config('style.logoDark') ?? ''; 
@endphp

<div>
    <nav aria-label="Topbar" class="fi-topbar">
        

        <!--[if BLOCK]><![endif]-->            <button class="fi-icon-btn fi-size-md fi-topbar-open-sidebar-btn" title="Expand sidebar" aria-label="Expand sidebar" type="button" wire:loading.attr="disabled" x-data="{}" aria-controls="fi-main-sidebar" x-bind:aria-expanded="$store.sidebar.isOpen" x-on:click="$store.sidebar.open()" x-show="! $store.sidebar.isOpen" aria-expanded="false">
    <svg class="fi-icon fi-size-lg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
</svg>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></button>

            <button class="fi-icon-btn fi-size-md fi-topbar-close-sidebar-btn" title="Collapse sidebar" aria-label="Collapse sidebar" type="button" wire:loading.attr="disabled" x-data="{}" aria-controls="fi-main-sidebar" x-bind:aria-expanded="$store.sidebar.isOpen" x-on:click="$store.sidebar.close()" x-show="$store.sidebar.isOpen" aria-expanded="false" style="display: none;">
    <svg class="fi-icon fi-size-lg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
</svg>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></button>
        <!--[if ENDBLOCK]><![endif]-->
        <div class="fi-topbar-start">
            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            

            <!--[if BLOCK]><![endif]-->                <a href="https://pathfinder.test/admin">
                    <!--[if BLOCK]><![endif]-->        <div style="height: 1.5rem;" class="fi-logo">
            <img src="https://pathfinder.test/01M32SB6VBWTF7ZA83W9RST5X7.png" class="block dark:hidden">
<img src="https://pathfinder.test/01M32SB6VEZWFT3KE6AS2HRQGQ.png" class="hidden dark:block">
        </div>
    <!--[if ENDBLOCK]><![endif]-->
            

<!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->                </a>
            <!--[if ENDBLOCK]><![endif]-->
            
        </div>

        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]-->                
                <ul class="fi-topbar-nav-groups">
                    <!--[if BLOCK]><![endif]-->                        
                        <!--[if BLOCK]><![endif]-->                            <!--[if BLOCK]><![endif]-->                                
                                <li class="fi-topbar-item">
    <a href="https://pathfinder.test/admin" class="fi-topbar-item-btn">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Dashboard
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->    </a>
</li>
                            <!--[if ENDBLOCK]><![endif]-->                        <!--[if ENDBLOCK]><![endif]-->                                            
                        <!--[if BLOCK]><![endif]-->                            <div x-data="filamentDropdown" class="fi-dropdown">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <li class="fi-topbar-item">
    <button type="button" class="fi-topbar-item-btn" aria-haspopup="true" aria-controls="fi-dropdown-panel-duebzlll" aria-expanded="false">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Content
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]-->            <svg class="fi-topbar-group-toggle-icon fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg>
        <!--[if ENDBLOCK]><![endif]-->    </button>
</li>
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-start.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-duebzlll">
            <!--[if BLOCK]><![endif]-->                                    <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                                            
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/pages" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Pages
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                        <!--[if ENDBLOCK]><![endif]-->
</div>
                                <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>
                        <!--[if ENDBLOCK]><![endif]-->                                            
                        <!--[if BLOCK]><![endif]-->                            <div x-data="filamentDropdown" class="fi-dropdown">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <li class="fi-topbar-item fi-active">
    <button type="button" class="fi-topbar-item-btn" aria-haspopup="true" aria-controls="fi-dropdown-panel-5ndk1kdn" aria-expanded="false">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Courses
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]-->            <svg class="fi-topbar-group-toggle-icon fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg>
        <!--[if ENDBLOCK]><![endif]-->    </button>
</li>
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-start.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-5ndk1kdn">
            <!--[if BLOCK]><![endif]-->                                    <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                                            
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/locations" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Locations
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/terms" class="fi-color fi-color-primary fi-text-color-700 hover:fi-text-color-700 dark:fi-text-color-400 dark:hover:fi-text-color-400 fi-dropdown-list-item" aria-current="page">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-color fi-color-primary fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Terms
    </span>

    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <span class="fi-color fi-color-info fi-text-color-600 dark:fi-text-color-200 fi-badge">
                5
            </span>
        <!--[if ENDBLOCK]><![endif]-->    <!--[if ENDBLOCK]><![endif]--></a>


                                        <!--[if ENDBLOCK]><![endif]-->
</div>
                                <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>
                        <!--[if ENDBLOCK]><![endif]-->                                            
                        <!--[if BLOCK]><![endif]-->                            <div x-data="filamentDropdown" class="fi-dropdown">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <li class="fi-topbar-item">
    <button type="button" class="fi-topbar-item-btn" aria-haspopup="true" aria-controls="fi-dropdown-panel-4iffy1v1" aria-expanded="false">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Organisational
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]-->            <svg class="fi-topbar-group-toggle-icon fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg>
        <!--[if ENDBLOCK]><![endif]-->    </button>
</li>
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-start.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-4iffy1v1">
            <!--[if BLOCK]><![endif]-->                                    <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                                            
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/events" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Events
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/users" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Users
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                        <!--[if ENDBLOCK]><![endif]-->
</div>
                                <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>
                        <!--[if ENDBLOCK]><![endif]-->                                            
                        <!--[if BLOCK]><![endif]-->                            <div x-data="filamentDropdown" class="fi-dropdown">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <li class="fi-topbar-item">
    <button type="button" class="fi-topbar-item-btn" aria-haspopup="true" aria-controls="fi-dropdown-panel-nrqng13p" aria-expanded="false">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Participation
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]-->            <svg class="fi-topbar-group-toggle-icon fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg>
        <!--[if ENDBLOCK]><![endif]-->    </button>
</li>
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-start.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-nrqng13p">
            <!--[if BLOCK]><![endif]-->                                    <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                                            
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/attendances" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Attendances
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/participants" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Participants
    </span>

    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <span class="fi-color fi-color-info fi-text-color-600 dark:fi-text-color-200 fi-badge">
                20
            </span>
        <!--[if ENDBLOCK]><![endif]-->    <!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/enrolments" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Enrolments
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                        <!--[if ENDBLOCK]><![endif]-->
</div>
                                <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>
                        <!--[if ENDBLOCK]><![endif]-->                                            
                        <!--[if BLOCK]><![endif]-->                            <div x-data="filamentDropdown" class="fi-dropdown">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <li class="fi-topbar-item">
    <button type="button" class="fi-topbar-item-btn" aria-haspopup="true" aria-controls="fi-dropdown-panel-4d85ekcv" aria-expanded="false">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Settings
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]-->            <svg class="fi-topbar-group-toggle-icon fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg>
        <!--[if ENDBLOCK]><![endif]-->    </button>
</li>
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-start.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-4d85ekcv">
            <!--[if BLOCK]><![endif]-->                                    <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                                            
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/settings/course" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Manage Course Settings
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/settings/global" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Manage Global Settings
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/settings/participant" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Manage Participant Settings
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                                                                    
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/settings/style" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Manage Style Settings
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                        <!--[if ENDBLOCK]><![endif]-->
</div>
                                <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>
                        <!--[if ENDBLOCK]><![endif]-->                                            
                        <!--[if BLOCK]><![endif]-->                            <div x-data="filamentDropdown" class="fi-dropdown">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <li class="fi-topbar-item">
    <button type="button" class="fi-topbar-item-btn" aria-haspopup="true" aria-controls="fi-dropdown-panel-aa0iisfc" aria-expanded="false">
        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <span class="fi-topbar-item-label">
            Workflow
        </span>

        <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]-->            <svg class="fi-topbar-group-toggle-icon fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg>
        <!--[if ENDBLOCK]><![endif]-->    </button>
</li>
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-start.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-aa0iisfc">
            <!--[if BLOCK]><![endif]-->                                    <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                                            
                                            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
<a href="https://pathfinder.test/admin/tasks" class="fi-dropdown-list-item">
    <!--[if BLOCK]><![endif]-->        <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"></path>
</svg>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <span class="fi-dropdown-list-item-label">
        Tasks
    </span>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]--></a>


                                        <!--[if ENDBLOCK]><![endif]-->
</div>
                                <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>
                        <!--[if ENDBLOCK]><![endif]-->                    <!--[if ENDBLOCK]><![endif]-->                </ul>
            <!--[if ENDBLOCK]><![endif]-->        <!--[if ENDBLOCK]><![endif]-->
        <div x-persist="topbar.end.panel-admin" class="fi-topbar-end">
            

            <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
            

            <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                <!--[if BLOCK]><![endif]-->                    <div class="flex flex-row gap-4 justify-between">
    <div class="flex items-center rounded-sm">
        <button class="relative w-fit text-on-surface dark:text-on-surface-dark" aria-label="notifications">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" class="size-8">
                <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">notifications</span>
            <span class="absolute left-1/2 -top-1 rounded-full bg-red-500 px-1 leading-4 text-xs font-medium text-white">99+</span>
        </button>
    </div>
</div>  

<div x-data="filamentDropdown" class="fi-dropdown fi-user-menu">
    <div x-on:keyup.enter="toggle($event)" x-on:keyup.space="toggle($event)" x-on:mousedown="if ($event.button === 0) toggle($event)" class="fi-dropdown-trigger">
        <!--[if BLOCK]><![endif]-->            <button aria-label="User menu" type="button" class="fi-user-menu-trigger" aria-haspopup="true" aria-controls="fi-dropdown-panel-685h60vw" aria-expanded="false">
                <img alt="Avatar of Example Technical Admin" class="fi-avatar fi-circular fi-size-md fi-user-avatar" src="https://ui-avatars.com/api/?name=E+T+A&amp;format=svg&amp;color=FFFFFF&amp;background=%2309090b" loading="lazy">
            </button>
        <!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]-->        <div x-float.placement.bottom-end.flip.teleport.offset="{ offset: 8,  }" x-ref="panel" x-transition:enter-start="fi-opacity-0" x-transition:leave-end="fi-opacity-0" class="fi-dropdown-panel " style="position: fixed; display: none;" id="fi-dropdown-panel-685h60vw">
            <!--[if BLOCK]><![endif]-->        
        

        <div class="fi-dropdown-header">
    <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd"></path>
</svg>

    <span>
        Example Technical Admin
    </span>
</div>

        
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]-->        <div class="fi-dropdown-list">
    <div x-data="{ theme: null }" x-init="
        $watch('theme', () =&gt; {
            $dispatch('theme-changed', theme)
        })

        theme = localStorage.getItem('theme') || 'system'    " role="group" aria-label="Theme" class="fi-theme-switcher">
    <button aria-label="Enable light theme" type="button" x-on:click="(theme = 'light') &amp;&amp; close()" x-tooltip="{
        content: 'Enable light theme',
        theme: $store.theme,
    }" x-bind:aria-pressed="theme === 'light' ? 'true' : 'false'" x-bind:class="{ 'fi-active': theme === 'light' }" class="fi-theme-switcher-btn fi-active" aria-pressed="true">
    <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path d="M10 2a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 2ZM10 15a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 15ZM10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6ZM15.657 5.404a.75.75 0 1 0-1.06-1.06l-1.061 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM6.464 14.596a.75.75 0 1 0-1.06-1.06l-1.06 1.06a.75.75 0 0 0 1.06 1.06l1.06-1.06ZM18 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 18 10ZM5 10a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5A.75.75 0 0 1 5 10ZM14.596 15.657a.75.75 0 0 0 1.06-1.06l-1.06-1.061a.75.75 0 1 0-1.06 1.06l1.06 1.06ZM5.404 6.464a.75.75 0 0 0 1.06-1.06l-1.06-1.06a.75.75 0 1 0-1.061 1.06l1.06 1.06Z"></path>
</svg>
</button>

    <button aria-label="Enable dark theme" type="button" x-on:click="(theme = 'dark') &amp;&amp; close()" x-tooltip="{
        content: 'Enable dark theme',
        theme: $store.theme,
    }" x-bind:aria-pressed="theme === 'dark' ? 'true' : 'false'" x-bind:class="{ 'fi-active': theme === 'dark' }" class="fi-theme-switcher-btn" aria-pressed="false">
    <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M7.455 2.004a.75.75 0 0 1 .26.77 7 7 0 0 0 9.958 7.967.75.75 0 0 1 1.067.853A8.5 8.5 0 1 1 6.647 1.921a.75.75 0 0 1 .808.083Z" clip-rule="evenodd"></path>
</svg>
</button>

    <button aria-label="Enable system theme" type="button" x-on:click="(theme = 'system') &amp;&amp; close()" x-tooltip="{
        content: 'Enable system theme',
        theme: $store.theme,
    }" x-bind:aria-pressed="theme === 'system' ? 'true' : 'false'" x-bind:class="{ 'fi-active': theme === 'system' }" class="fi-theme-switcher-btn" aria-pressed="false">
    <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M2 4.25A2.25 2.25 0 0 1 4.25 2h11.5A2.25 2.25 0 0 1 18 4.25v8.5A2.25 2.25 0 0 1 15.75 15h-3.105a3.501 3.501 0 0 0 1.1 1.677A.75.75 0 0 1 13.26 18H6.74a.75.75 0 0 1-.484-1.323A3.501 3.501 0 0 0 7.355 15H4.25A2.25 2.25 0 0 1 2 12.75v-8.5Zm1.5 0a.75.75 0 0 1 .75-.75h11.5a.75.75 0 0 1 .75.75v7.5a.75.75 0 0 1-.75.75H4.25a.75.75 0 0 1-.75-.75v-7.5Z" clip-rule="evenodd"></path>
</svg>
</button>
</div>
</div>
    <!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]-->        <div class="fi-dropdown-list">
    <!--[if BLOCK]><![endif]-->                <!--[if BLOCK]><![endif]-->                    
        <form action="https://pathfinder.test/admin/logout" method="post"><input type="hidden" name="_token" value="whBEaJKN7WP22lLwJCPcyAUbcpfiSsc98tiTajQU" autocomplete="off">
        <button type="submit" class="fi-dropdown-list-item">
            <svg class="fi-icon fi-size-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd"></path>
  <path fill-rule="evenodd" d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z" clip-rule="evenodd"></path>
</svg>            
            <span class="fi-dropdown-list-item-label">
                Sign out            </span>

                    </button>

        </form>
        
                <!--[if ENDBLOCK]><![endif]-->            <!--[if ENDBLOCK]><![endif]-->
</div>
    <!--[if ENDBLOCK]><![endif]-->
        </div>
    <!--[if ENDBLOCK]><![endif]--></div>


                <!--[if ENDBLOCK]><![endif]-->            <!--[if ENDBLOCK]><![endif]-->        </div>

        
    </nav>
</div>