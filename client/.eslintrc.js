module.exports = {
    root: true,
    env: {
        node: true
    },
    extends: [
        'eslint:recommended',
        'plugin:vue/essential'
    ],
    rules: {
        'comma-dangle': ['error', 'never'],
        'semi': ['error', 'never'],
        'sort-keys': 'error',
        'sort-imports': 'error',
        'space-in-parens': ['error', 'never'],
        'quotes': ['error', 'single'],
        'newline-before-return': 'error',
        'newline-after-var': ['error', 'always'],
        'no-console': 'error',
        'no-debugger': 'error'
    },
    parserOptions: {
        parser: "@typescript-eslint/parser"
    },
    overrides: [
        {
            files: ["**/__tests__/*.{j,t}s"],
            env: {
                jest: true
            }
        }
    ]
};
