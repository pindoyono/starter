const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: {
        content: [
          './vendor/wire-elements/modal/resources/views/*.blade.php',
          './storage/framework/views/*.php',
          './resources/views/**/*.blade.php',

          './app/Http/Livewire/**/*Table.php',
          './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
          './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
        ],
        options: {
          safelist: [
            'sm:max-w-2xl'
          ]
        }
      },

    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',

        // tailwind-elemend

        "./resources/**/*.blade.php",
        "./node_modules/tw-elements/dist/js/**/*.js",

    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require("tw-elements/dist/plugin"),
        require("@tailwindcss/forms")({
            strategy: 'class',
          }),
    ],
}
