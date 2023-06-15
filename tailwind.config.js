const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/*/.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                dancingscript: "'Dancing Script', cursive",
                libre: "'Libre Baskerville', serif",
                lora: "'Lora', serif",
                roboto: "'Roboto', sans-serif",
                robotocondensed: "'Roboto Condensed', sans-serif",
            },
            boxShadow: {
                '3xl': '0px 4px 4px rgba(0, 0, 0, 0.25);',
            }
        },
        fontFamily: {
            sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            dancingscript: "'Dancing Script', cursive",
            libre: "'Libre Baskerville', serif",
            lora: "'Lora', serif",
            roboto: "'Roboto', sans-serif",
            robotocondensed: "'Roboto Condensed', sans-serif",
        },
        colors: {
            'dirty-white': '#fdffee',
            'deep-green': '#414833',
            'olive-green': '#709775',
            'green': '#64965e',
        },
        backgroundColor: {
            'dirty-white': '#fdffee',
            'deep-green': '#414833',
            'olive-green': '#709775',
            'green': '#64965e',
        },
    },

    plugins: [require('@tailwindcss/forms')],
};