const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                dancingscript: "'Dancing Script', cursive",
                libre: "'Libre Baskerville', serif",
                lora: "'Lora, serif",
                roboto: "'Roboto', sans-serif",
                robotocondensed: "'Roboto Condensed', sans-serif",
            },
            fontSize: {
                sm: '14px',
                base: '16px',
                xl: '20px',
                '2xl': '24px',
                '3xl': '30px',
                '4xl': '32px',
                '5xl': '40px',
                '6xl': '60px',
                '7xl': '80px',
                '8xl': '96px',
            },
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

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-clip-path'),
    ],
};