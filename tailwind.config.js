/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    50: '#EEF2F7',
                    100: '#DCE3ED',
                    200: '#B7C4D9',
                    300: '#8FA3C0',
                    400: '#5A7297',
                    500: '#33507A',
                    600: '#1D3A63',
                    700: '#13294B',
                    800: '#0D1E38',
                    900: '#0A1830',
                    950: '#060F20',
                },
                accent: {
                    50: '#FAF5E9',
                    100: '#F3E6C6',
                    200: '#E6CD8E',
                    300: '#D9B45E',
                    400: '#CFA84A',
                    500: '#C9A24A',
                    600: '#A9843A',
                    700: '#8A6D1F',
                    800: '#6B5218',
                    900: '#4D3B12',
                },
                jade: {
                    50: '#ecfdf5',
                    100: '#d1fae5',
                    400: '#34d399',
                    500: '#10b981',
                    600: '#059669',
                },
            },
            fontFamily: {
                sans: ['Public Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                display: ['Public Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 1px 2px rgb(15 23 42 / 0.04), 0 1px 3px rgb(15 23 42 / 0.06)',
            },
            keyframes: {
                'fade-up': {
                    '0%': { opacity: '0', transform: 'translateY(16px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.7s cubic-bezier(0.16, 1, 0.3, 1) both',
            },
        },
    },
    plugins: [],
};
