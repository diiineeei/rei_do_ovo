**Tutorial**
In order for you to easily be able to use the Paper Dashboard 2, we have created a tutorial page in our documentation. It shows the structure for the files inside the archive and how to import them. It then features every components with a description and example how to use it. You can see the details [here](https://creativetimofficial.github.io/paper-dashboard-2/docs/1.0/getting-started/introduction.html).


### What's included

Within the download you'll find the following directories and files:

```
Paper Dashboard 2
.
├── CHANGELOG.md
├── README.md
├── assets
│   ├── css/
│   ├── demo/
│   ├── fonts/
│   ├── img/
│   ├── js
│   │   ├── core/
│   │   ├── paper-dashboard.js
│   │   ├── paper-dashboard.js.map
│   │   ├── paper-dashboard.min.js
│   │   └── plugins
│   │       ├── bootstrap-notify.js
│   │       ├── chartjs.min.js
│   │       └── perfect-scrollbar.jquery.min.js
│   └── scss/
│       ├── paper-dashboard/
│       │   ├── cards/
│       │   ├── mixins/
│       │   └── plugins/
│       └── paper-dashboard.scss
├── docs/
│   └── documentation.html
├── examples/
│   ├── dashboard.html
│   ├── icons.html
│   ├── map.html
│   ├── notifications.html
│   ├── tables.html
│   ├── typography.html
│   ├── upgrade.html
│   └── user.html
├── gulpfile.js
├── nucleo-icons.html
└── package.json
```

## Getting started
- Download the project’s zip
- Make sure you have node.js (https://nodejs.org/en/) installed
- Type `npm install` in terminal/console in the source folder where `package.json` is located
- You will find all the branding colors inside `assets/scss/core/variables/_brand.scss`. You can change them with a HEX value or with other predefined variables from `assets/scss/core/variables/_colors.scss`
- Run in terminal `gulp compile-scss` for a single compilation or gulp watch for continous compilation of the changes that you make in `*.scss` files. This command should be run in the same folder where `gulpfile.js` and `package.json` are located
- Run in terminal `gulp open-app` for opening the Presentation Page (default) of the product. You can set in `gulpfile.js` from your downloaded archive any page you want to open in browser, `at line 30: gulp.src('./examples/dashboard.html')`
