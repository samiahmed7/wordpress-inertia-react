import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './resources/js/**/*.jsx',
      './resources/js/**/*.{js,ts,jsx,tsx}'
  ],

  theme: {
      extend: {
          colors: {
              'primary': '#160647',
              'purple' : '#8224e37a',
              'purple-light' : '#8c6bdc',
              'purple-shaded' : '#7b50c030',
              'bright-yellow' : '#f7a400',
              'muted-yellow' : '#f7a564',
              'muted-yellow-2' : '#fa9240',
              'muted' : '#6E7E96',
              'muted-2' : '#6c757d',
              'muted-3' : '#f2f3f5',
              'subtitle' : '#8193AE',
              'regular' : '#4F5665',
              'green-custom' : '#19a580',
              'muted-back' : '#F3F3F4',
          },
          fontFamily: {
              sans: ['Figtree', ...defaultTheme.fontFamily.sans],
              inter: ['Inter','sans-serif'],
          },
      },
  },
};
