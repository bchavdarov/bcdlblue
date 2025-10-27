# BCDLblue 
BCDLblue is an extended version of BCDLpurple. It is a responsive, flexible and user-friendly theme for WordPress based on `underscores` and `Bootstrap 5`. 
BCDLblue is imroving and evolving constantly and updates are commited all the time. 

Installation
---------------

### Requirements

`BCDLblue` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `something-you-like`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'bcdlblue'` (inside single quotations) to capture the text domain and replace with: `'something-you-like'`.
2. Search for `_bcdlblue_` to capture all the functions names and replace with: `something_you_like`.
3. Search for `Text Domain: bcdlblue` in `style.css` and replace with: `Text Domain: something-you-like`.
4. Search for <code>&nbsp;bcdlblue</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Something_you_Like</code>.
5. Search for `bcdl-` to capture prefixed handles and replace with: `something-you-like-`.
6. Search for `_BCDL_` (in uppercase) to capture constants and replace with: `SOMETHING_YOU_LIKE_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `bcdlblue.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme. 

### Setup

To start using all the tools that come with `BCDLblue`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`BCDLblue` comes packed with CLI commands tailored for WordPress theme development:

- `npm run bcdlcss` : compiles SASS files to css.
- `npm run bcdlwatch` : watches SASS files and when changed compiles them to CSS. Can be used instead of `npm run bcdlcss`. Use `CTRL+C` to stop watching.
- `npm run bcdljs` : compiles JavaScript files to js.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
- `wp i18n make-pot . languages/bcdlblue.pot` : another way to make .pot file in `languages/` directory (requires [wp-cli](https://make.wordpress.org/cli/handbook/guides/installing/) installed).


### BCDLblue Theme Versioning

BCDLblue uses **Semantic Versioning (SemVer)** for version control. You can update the theme version with npm using the following commands:

```bash
npm version major -m "fixed issue (%s)"   # for breaking changes or major restructuring
npm version minor -m "fixed issue (%s)"   # for new features, backward-compatible
npm version patch -m "fixed issue (%s)"   # for bug fixes or small improvements
git push && git push --tags               # push commits and tags to GitHub
```
`%s` is automatically replaced with the new version number. Running any of these commands will:

1. Update the version in `package.json`
2. Run the version script to update style.css
3. Create a Git commit with the message and a corresponding tag
4. Push the commit and tag to GitHub

Now you're ready to go! The next step is easy to say, but harder to do: Make a beautiful WordPress theme. :blue_heart:
:thumbsup:

Good luck!
