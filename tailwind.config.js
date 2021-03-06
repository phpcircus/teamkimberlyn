module.exports = {
    theme: {
        colors: {
            transparent: 'transparent',
            'black-shade': 'rgba(0, 0, 0, .5)',
            'text-color': '#22292f',
            'light': '#9ba3aa',
            'lighter': '#cacfd4',
            'very-light': '#e9ecef',
            'contrast': '#ffffff',
            'primary': '#4040c8',
            'primary-dark': '#28287f',
            black: '#000',
            white: '#fff',
            gray: {
                100: '#f7fafc',
                200: '#edf2f7',
                300: '#e2e8f0',
                400: '#cbd5e0',
                500: '#a0aec0',
                600: '#718096',
                700: '#4a5568',
                800: '#2d3748',
                900: '#1a202c',
            },
            red: {
                100: '#fff5f5',
                200: '#fed7d7',
                300: '#feb2b2',
                400: '#fc8181',
                500: '#f56565',
                600: '#e53e3e',
                700: '#c53030',
                800: '#9b2c2c',
                900: '#742a2a',
            },
            orange: {
                100: '#fffaf0',
                200: '#feebc8',
                300: '#fbd38d',
                400: '#f6ad55',
                500: '#ed8936',
                600: '#dd6b20',
                700: '#c05621',
                800: '#9c4221',
                900: '#7b341e',
            },
            yellow: {
                100: '#fffff0',
                200: '#fefcbf',
                300: '#faf089',
                400: '#f6e05e',
                500: '#ecc94b',
                600: '#d69e2e',
                700: '#b7791f',
                800: '#975a16',
                900: '#744210',
            },
            green: {
                100: '#f0fff4',
                200: '#c6f6d5',
                300: '#9ae6b4',
                400: '#68d391',
                500: '#48bb78',
                600: '#38a169',
                700: '#2f855a',
                800: '#276749',
                900: '#22543d',
            },
            teal: {
                100: '#e6fffa',
                200: '#b2f5ea',
                300: '#81e6d9',
                400: '#4fd1c5',
                500: '#38b2ac',
                600: '#319795',
                700: '#2c7a7b',
                800: '#285e61',
                900: '#234e52',
            },
            blue: {
                100: '#ebf8ff',
                200: '#bee3f8',
                300: '#90cdf4',
                400: '#63b3ed',
                500: '#4299e1',
                600: '#3182ce',
                700: '#2b6cb0',
                800: '#2c5282',
                900: '#2a4365',
            },
            indigo: {
                100: '#ebf4ff',
                200: '#c3dafe',
                300: '#a3bffa',
                400: '#7f9cf5',
                500: '#667eea',
                600: '#5a67d8',
                700: '#4c51bf',
                800: '#434190',
                900: '#3c366b',
            },
            purple: {
                100: '#faf5ff',
                200: '#e9d8fd',
                300: '#d6bcfa',
                400: '#b794f4',
                500: '#9f7aea',
                600: '#805ad5',
                700: '#6b46c1',
                800: '#553c9a',
                900: '#44337a',
            },
            pink: {
                100: '#fff5f7',
                200: '#fed7e2',
                300: '#fbb6ce',
                400: '#f687b3',
                500: '#ed64a6',
                600: '#d53f8c',
                700: '#b83280',
                800: '#97266d',
                900: '#702459',
            },
        },
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
        },
        fill: theme => ({
            current: 'currentColor',
            'white': theme('colors.white'),
            'blue-100': theme('colors.blue.100'),
            'blue-200': theme('colors.blue.200'),
            'blue-300': theme('colors.blue.300'),
            'blue-400': theme('colors.blue.400'),
            'blue-500': theme('colors.blue.500'),
            'blue-600': theme('colors.blue.600'),
            'blue-700': theme('colors.blue.700'),
            'blue-800': theme('colors.blue.800'),
            'blue-900': theme('colors.blue.900'),
            'gray-100': theme('colors.gray.100'),
            'gray-200': theme('colors.gray.200'),
            'gray-300': theme('colors.gray.300'),
            'gray-400': theme('colors.gray.400'),
            'gray-500': theme('colors.gray.500'),
            'gray-600': theme('colors.gray.600'),
            'gray-700': theme('colors.gray.700'),
            'gray-800': theme('colors.gray.800'),
            'gray-900': theme('colors.gray.900'),
            'yellow-100': theme('colors.yellow.100'),
            'yellow-200': theme('colors.yellow.200'),
            'yellow-300': theme('colors.yellow.300'),
            'yellow-400': theme('colors.yellow.400'),
            'yellow-500': theme('colors.yellow.500'),
            'yellow-600': theme('colors.yellow.600'),
            'yellow-700': theme('colors.yellow.700'),
            'yellow-800': theme('colors.yellow.800'),
            'yellow-900': theme('colors.yellow.900'),
            'red-100': theme('colors.red.100'),
            'red-200': theme('colors.red.200'),
            'red-300': theme('colors.red.300'),
            'red-400': theme('colors.red.400'),
            'red-500': theme('colors.red.500'),
            'red-600': theme('colors.red.600'),
            'red-700': theme('colors.red.700'),
            'red-800': theme('colors.red.800'),
            'red-900': theme('colors.red.900'),
            'teal-100': theme('colors.teal.100'),
            'teal-200': theme('colors.teal.200'),
            'teal-300': theme('colors.teal.300'),
            'teal-400': theme('colors.teal.400'),
            'teal-500': theme('colors.teal.500'),
            'teal-600': theme('colors.teal.600'),
            'teal-700': theme('colors.teal.700'),
            'teal-800': theme('colors.teal.800'),
            'teal-900': theme('colors.teal.900'),
            'indigo-100': theme('colors.indigo.100'),
            'indigo-200': theme('colors.indigo.200'),
            'indigo-300': theme('colors.indigo.300'),
            'indigo-400': theme('colors.indigo.400'),
            'indigo-500': theme('colors.indigo.500'),
            'indigo-600': theme('colors.indigo.600'),
            'indigo-700': theme('colors.indigo.700'),
            'indigo-800': theme('colors.indigo.800'),
            'indigo-900': theme('colors.indigo.900'),
        }),
        stroke: theme => ({
            current: 'currentColor',
            'white': theme('colors.white'),
            'blue-100': theme('colors.blue.100'),
            'blue-200': theme('colors.blue.200'),
            'blue-300': theme('colors.blue.300'),
            'blue-400': theme('colors.blue.400'),
            'blue-500': theme('colors.blue.500'),
            'blue-600': theme('colors.blue.600'),
            'blue-700': theme('colors.blue.700'),
            'blue-800': theme('colors.blue.800'),
            'blue-900': theme('colors.blue.900'),
            'gray-100': theme('colors.gray.100'),
            'gray-200': theme('colors.gray.200'),
            'gray-300': theme('colors.gray.300'),
            'gray-400': theme('colors.gray.400'),
            'gray-500': theme('colors.gray.500'),
            'gray-600': theme('colors.gray.600'),
            'gray-700': theme('colors.gray.700'),
            'gray-800': theme('colors.gray.800'),
            'gray-900': theme('colors.gray.900'),
            'yellow-100': theme('colors.yellow.100'),
            'yellow-200': theme('colors.yellow.200'),
            'yellow-300': theme('colors.yellow.300'),
            'yellow-400': theme('colors.yellow.400'),
            'yellow-500': theme('colors.yellow.500'),
            'yellow-600': theme('colors.yellow.600'),
            'yellow-700': theme('colors.yellow.700'),
            'yellow-800': theme('colors.yellow.800'),
            'yellow-900': theme('colors.yellow.900'),
            'red-100': theme('colors.red.100'),
            'red-200': theme('colors.red.200'),
            'red-300': theme('colors.red.300'),
            'red-400': theme('colors.red.400'),
            'red-500': theme('colors.red.500'),
            'red-600': theme('colors.red.600'),
            'red-700': theme('colors.red.700'),
            'red-800': theme('colors.red.800'),
            'red-900': theme('colors.red.900'),
            'teal-100': theme('colors.teal.100'),
            'teal-200': theme('colors.teal.200'),
            'teal-300': theme('colors.teal.300'),
            'teal-400': theme('colors.teal.400'),
            'teal-500': theme('colors.teal.500'),
            'teal-600': theme('colors.teal.600'),
            'teal-700': theme('colors.teal.700'),
            'teal-800': theme('colors.teal.800'),
            'teal-900': theme('colors.teal.900'),
            'indigo-100': theme('colors.indigo.100'),
            'indigo-200': theme('colors.indigo.200'),
            'indigo-300': theme('colors.indigo.300'),
            'indigo-400': theme('colors.indigo.400'),
            'indigo-500': theme('colors.indigo.500'),
            'indigo-600': theme('colors.indigo.600'),
            'indigo-700': theme('colors.indigo.700'),
            'indigo-800': theme('colors.indigo.800'),
            'indigo-900': theme('colors.indigo.900'),
        }),
        minHeight: {
            '0': '0',
            full: '100%',
            screen: '100vh',
            '25': '25vh',
            '50': '50vh',
        },
        maxWidth: {
            'xs': '20rem',
            'sm': '24rem',
            'md': '28rem',
            'lg': '32rem',
            'xl': '36rem',
            '2xl': '42rem',
            '3xl': '48rem',
            '4xl': '56rem',
            '5xl': '64rem',
            '6xl': '72rem',
            '7xl': '80rem',
            'full': '100%',
            'screen-sm': '640px',
            'screen-md': '768px',
            'screen-lg': '1024px',
            'screen-xl': '1280px',
            'none': 'none',
        },
        extend: {
            inset: {
                '80': '80px',
                '90': '90px',
                '110': '110px',
                'half': 'calc(50% - 250px)',
            },
            rotate: {
                '30': '30deg',
                '-30': '-30deg',
            },
            borderWidth: {
                '12': '12px',
                '16': '16px',
            },
            fontFamily: {
                'lato': [
                    'lato',
                    'system-ui',
                    'BlinkMacSystemFont',
                    '-apple-system',
                    'Segoe UI',
                    'Roboto',
                    'Oxygen',
                    'Ubuntu',
                    'Cantarell',
                    'Fira Sans',
                    'Droid Sans',
                    'Helvetica Neue',
                    'sans-serif',
                ],
                'ptsans': [
                    'pt_sans',
                    'open_sans',
                ],
                'opensans': [
                    'open_sans',
                    'pt_sans',
                ],
                'sigmar': [
                    'sigmar_oneregular',
                ],
                'damion': [
                    'damionregular',
                ],
            },
            spacing: {
                '7': '1.75rem',
            },
            width: theme => ({
                auto: 'auto',
                ...theme('spacing'),
                '1/2': '50%',
                '1/3': '33.33333%',
                '2/3': '66.66667%',
                '1/4': '25%',
                '3/4': '75%',
                '1/5': '20%',
                '2/5': '40%',
                '3/5': '60%',
                '4/5': '80%',
                '1/6': '16.66667%',
                '5/6': '83.33333%',
                '1/7': '14.286%',
                '2/7': '28.572%',
                '3/7': '42.858%',
                '4/7': '57.144%',
                '5/7': '71.43%',
                '6/7': '85.716%',
                full: '100%',
                screen: '100vw',
            }),
        },
    },
    variants: {
        textColor: ['responsive', 'hover', 'focus', 'group-hover'],
        textWeight: ['responsive'],
        fill: ['hover', 'focus', 'group-hover'],
        stroke: ['hover', 'focus', 'group-hover'],
        width: ['responsive'],
        borderWidth: ['responsive', 'last'],
        margin: ['responsive', 'last'],
        backgroundColor: ['responsive', 'hover', 'focus', 'group-hover', 'odd'],
        display: ['logged-in', 'logged-out', 'responsive', 'hover'],
        borderRadius: ['responsive', 'last'],
    },
    plugins: [
        require('./resources/js/lib/tailwindcss/plugins/tables')(),
        require('./resources/js/lib/tailwindcss/plugins/variants'),
        require('@tailwindcss/ui'),
    ],
}
