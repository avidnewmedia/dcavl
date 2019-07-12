# Drupal Theme Theme Documentation
This file will serve as the go to source for documentation regarding this theme configuration.

This theme is based built on ZURB Foundation 6.  For more information please see [ZURB Foundation Documentation](http://foundation.zurb.com/sites/docs/).

## Local Setup
#### Mac OS Installation:
**Install [Homebrew](https://brew.sh/) for managing packages on Mac:**
```bash
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```
**Install Package Dependencies via Homebrew CLI:**

```bash
brew install node
```

**Install Theme Dependencies and Compile Project from Source Code:**

```bash
cd /drupal_theme
npm install
```

## Theme Commands
Below are a list of common commands that can be used for themeing purposes.

- **Build / Watch Files** - `npm run build` will fire Gulp default tasks without the 'production' flag.  This is best used when developing code locally.
- **Minify Code for Production** - `npm run build-production` running this command will fire Gulp default tasks with the 'production' flag which includes image, css, and js minification in order to decrease file size on production.
- **Copy NPM Installed Fonts** - `npm run copy-fonts` will copy all font files defined in the config.yml font path from the node_modules folder to the `drupal_theme/src/fonts` directory for inclusion.
- **Install New Packages** - `npm install [package-name] --save-dev` - running this command will install the defined package and update the package.json file accordingly. 

*Note: See [NPM's Website](https://www.npmjs.com/) for additional packages that can be installed.*


## Managing Packages and Theme Assets
#### Distribution Files
Files stored in the `drupal_theme/dist` directory are generated when the theme is compiled via the theme commands above.  These files are served to the clients browser.  **DO NOT MODIFY THESE ASSETS** as they will be overridden when the theme is recompiled.

#### Source Files
Files stored in the `drupal_theme/src` directory are the source files for this  theme.  These files can be edited directly.
- __Fonts__ - All custom fonts should be placed in this folder. However if you are installing your fonts via an NPM package you will want to first run `npm install [package-name] --save-dev` to install your font and update package.json, add your new font's path to the config.yml file and run `npm run copy-fonts` to place your newly installed font into the `drupal_theme/src/fonts` directory
- __JavaScript__ - All custom JavaScript should be written in app.js. If there is a new library to be installed use the installation commands above, rebuild the project, and add packages via [ES6](http://es6-features.org/#ValueExportImport) to the app.js file.
- __SCSS__ - All custom SASS should be added in this directory. Folder organization should adhere to [SMACSS (Scalable and Modular Archetecture for CSS)](https://smacss.com/) guidelines while class naming should follow [BEM (Block Element Modifier)](http://getbem.com/) guidelines.
- __Images__ - All source images should be placed in the `drupal_theme/src/img` directory.  These images will be compressed and relocated to the dist path `drupal_theme/dist/img`.  Any markup or css that references an image should always use the dist path as this will improve performance.

