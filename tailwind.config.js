module.exports = {
    purge: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    darkMode: "media", // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                "indigo-dye": "#003D5B",
                "lapis-lazuli": "#30638E",
                "metallic-seaweed": "#00798C",
                "brick-red": "#D1495B",
                "sun-ray": "#EDAE49",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
