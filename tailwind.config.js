module.exports = {
    content: ["./resources/js/**/*.{vue,js}"],
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {},
    },
    variants: {
        extend: {
            backgroundColor: ['disabled'],
        }
    },
    plugins: [
        require('@tailwindcss/forms')
    ],
}
