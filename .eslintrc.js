module.exports = {
	env: {
		browser: true,
		commonjs: true,
		es6: true,
		node: true,
	},
	extends: [ 'eslint:recommended', 'plugin:@wordpress/eslint-plugin/recommended' ],
	parserOptions: {
		sourceType: 'module',
	},
	rules: {
		// Disable weird WP spacing rules.
		// 'space-before-function-paren': 'off',
		// 'space-in-parens': 'off',
		// 'array-bracket-spacing': 'off',
		indent: [ 'error', 'tab' ],
		semi: [ 'error', 'always' ],
		quotes: [ 'error', 'single' ],
		'linebreak-style': [ 'error', 'unix' ],
	},
};
