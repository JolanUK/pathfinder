import preset from './vendor/filament/filament/tailwind.config.preset';

export default {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    presets: [preset],
};