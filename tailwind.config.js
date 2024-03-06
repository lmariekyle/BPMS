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
                railway: "'Railway', sans-serif",
                poppin: "'Poppins', sans-serif",
                playfair: "'Playfair Display', serif",
                rozha: "'Rozha One', serif",
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
            boxShadow:{
                inner: 'inset 0 5px 7px 0 rgba(0, 0, 0, 0.06)',
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
            screens: {
                'tablet': '640px',
                // => @media (min-width: 640px) { ... }

                'laptop': '1024px',
                // => @media (min-width: 1024px) { ... }

                'desktop': '1280px',
                // => @media (min-width: 1280px) { ... }
            },
            textShadow: {
                'custom': '2px 2px 4px rgba(0, 0, 0, 0.5)',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('tailwind-clip-path'),
    ],
};