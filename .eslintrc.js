/* eslint no-use-before-define: 0 */  // --> OFF
module.exports = {
  root: true,

  env: {
    "es6": true
  },
  
  parser: "babel-eslint",
  parserOptions: {
    sourceType: "module",
    allowImportExportEverywhere: false,
    ecmaFeatures: {
      globalReturn: false,
    },
  },

  // add your custom rules here
  rules: {
    "template-curly-spacing" : "off",
    indent : "off",
    'no-plusplus': 'off',
    'import/extensions': 'off',
    'no-param-reassign': [
      'error',
      {
        props: true,
        ignorePropertyModificationsFor: [
          'state',
          'acc',
          'e'
        ]
      }
    ],
    'import/no-extraneous-dependencies': [
      'error',
      {
        optionalDependencies: [
          'test/unit/index.js'
        ]
      }
    ],
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off',
    'max-len': [
      'off',
      {
        code: 160
      }
    ],
    'linebreak-style': 'off',
    'vue/order-in-components': 'off',
    'vue/require-prop-types': 'warn',
    'import/prefer-default-export': 'warn',
    'no-restricted-globals': 'warn',
    'no-loop-func': 'warn',
    'consistent-return': 'off',
    'no-shadow': 'warn',
    camelcase: 'warn',
    'no-mixed-operators': 'warn',
    'vue/require-default-prop': 'warn',
    'no-useless-escape': 'off',
    'global-require': 'warn',
    radix: 'warn',
    'no-use-before-define': 'warn',
    'object-curly-newline': 'off',
    'import/no-unresolved': 'off',
    'no-else-return': 'error',
    'arrow-body-style': 'off',
    'no-console': process.env.NODE_ENV === 'production' ? 'error' : 'off'
  },
  overrides: [
    {
      files: [
        '**/__tests__/*.{j,t}s?(x)',
        '**/tests/unit/**/*.spec.{j,t}s?(x)'
      ],
      env: {
        jest: true
      }
    }
  ]
}