/**
 * WPGulp Configuration File
 *
 * 1. Edit the variables as per your project requirements.
 * 2. In paths you can add <<glob or array of globs>>.
 *
 * @package WPGulp
 */

// Project options.

// Local project URL of your already running WordPress site.
// > Could be something like "wpgulp.local" or "localhost"
// > depending upon your local WordPress setup.
const projectURL = 'https://projectname.test';
const projectSlug = 'projectname';

// Theme/Plugin URL. Leave it like it is; since our gulpfile.js lives in the root folder.
const productURL = './';
const browserAutoOpen = true;
const injectChanges = true;

// >>>>> Style options.
// Path to main .scss file.
const styleSRC = './source/sass/style.scss';
const adminStyleSRC = './source/sass/admin.scss';
const editorStyleSRC = './source/sass/editor.scss';

// Path to place the compiled CSS file. Default set to root folder.
const styleDestination = './';

// Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
const outputStyle = 'compressed';
const errLogToConsole = true;
const precision = 10;

// JS Vendor options.

// Path to JS vendor folder.
const jsVendorSRC = './source/scripts/vendor/*.js';

// Path to place the compiled JS vendors file.
const jsVendorDestination = './assets/js/';

// Compiled JS vendors file name. Default set to vendors i.e. vendors.js.
const jsVendorFile = 'vendor';

// JS Custom options.

// Path to JS custom scripts folder.
const jsCustomSRC = './source/scripts/theme/*.js';

// Path to place the compiled JS custom scripts file.
const jsCustomDestination = './assets/js/';

// Compiled JS custom file name. Default set to custom i.e. custom.js.
const jsCustomFile = 'theme';

// Path to JS admin scripts folder.
const jsAdminSRC = './source/scripts/admin/*.js';

// Compiled JS custom file name. Default set to admin i.e. admin.js.
const jsAdminFile = 'admin';

// Path to JS editor scripts folder.
const jsEditorSRC = './source/scripts/editor/*.js';

// Compiled JS custom file name. Default set to editor i.e. editor.js.
const jsEditorFile = 'editor';

// Path to JS customizer scripts folder.
const jsCustomizerSRC = './source/scripts/customizer/*.js';

// Compiled JS custom file name. Default set to customizer i.e. customizer.js.
const jsCustomizerFile = 'customizer';

// Images options.

// Source folder of images which should be optimized and watched.
// > You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
const imgSRC = './source/images/**/*';

// Destination folder of optimized images.
// > Must be different from the imagesSRC folder.
const imgDST = './assets/img/';

// >>>>> Watch files paths.
// Path to all *.scss files inside css folder and inside them.
const watchStyles = './source/sass/**/*.scss';

// Path to all vendor JS files.
const watchJsVendor = jsVendorSRC;

// Path to all custom JS files.
const watchJsCustom = jsCustomSRC;

// Path to all admin JS files.
const watchJsAdmin = jsAdminSRC;

// Path to all editor JS files.
const watchJsEditor = jsEditorSRC;

// Path to all customizer JS files.
const watchJsCustomizer = jsCustomizerSRC;

// Path to all PHP files.
const watchPhp = './**/*.php';

// >>>>> Zip file config.
// Must have.zip at the end.
const zipName = projectSlug + '.zip';

// Must be a folder outside of the zip folder.
const zipDestination = './../'; // Default: Parent folder.
const zipIncludeGlob = [ './**/*' ]; // Default: Include all files/folders in current directory.

// Default ignored files and folders for the zip file.
const zipIgnoreGlob = [
	'!./{node_modules,node_modules/**/*}',
	'!./.git',
	'!./.svn',
	'!./gulpfile.babel.js',
	'!./wpgulp.config.js',
	'!./.eslintrc.js',
	'!./.eslintignore',
	'!./.editorconfig',
	'!./phpcs.xml.dist',
	'!./vscode',
	'!./package.json',
	'!./package-lock.json',
	'!./source/**/*'
];

// >>>>> Translation options.
// Your text domain here.
const textDomain = projectSlug;

// Name of the translation file.
const translationFile = projectSlug + '.pot';

// Where to save the translation files.
const translationDestination = './languages';

// Package name.
const packageName = 'ProjectName';

// Where can users report bugs.
const bugReport = 'https://github.com/RelevanceDigital/wp-bs-starter-theme/issues';

// Last translator Email ID.
const lastTranslator = 'Relevance <sales@relevance.digital>';

// Team's Email ID.
const team = 'Relevance <sales@relevance.digital>';

// Browsers you care about for auto-prefixing. Browserlist https://github.com/ai/browserslist
// The following list is set as per WordPress requirements. Though; Feel free to change.
const BROWSERS_LIST = [ 'last 2 version', '> 1%' ];

// Export.
module.exports = {
	projectURL,
	productURL,
	browserAutoOpen,
	injectChanges,
	styleSRC,
	adminStyleSRC,
	editorStyleSRC,
	styleDestination,
	outputStyle,
	errLogToConsole,
	precision,
	jsVendorSRC,
	jsVendorDestination,
	jsVendorFile,
	jsCustomSRC,
	jsCustomDestination,
	jsCustomFile,
	jsAdminSRC,
	jsAdminFile,
	jsEditorSRC,
	jsEditorFile,
	jsCustomizerSRC,
	jsCustomizerFile,
	imgSRC,
	imgDST,
	watchStyles,
	watchJsVendor,
	watchJsCustom,
	watchJsAdmin,
	watchJsEditor,
	watchJsCustomizer,
	watchPhp,
	zipName,
	zipDestination,
	zipIncludeGlob,
	zipIgnoreGlob,
	textDomain,
	translationFile,
	translationDestination,
	packageName,
	bugReport,
	lastTranslator,
	team,
	BROWSERS_LIST
};
