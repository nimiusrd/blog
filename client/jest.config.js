module.exports = {
    moduleFileExtensions: ["js", "json", "vue", "ts"],
    transform: {
        "^.+\\.vue$": "vue-jest",
        "^.+\\.ts$": "ts-jest"
    },
    transformIgnorePatterns: ["/node_modules/"],
    moduleNameMapper: {
        "^@/(.*)$": "<rootDir>/src/$1"
    },
    testMatch: [
        "**/__tests__/*.test.ts"
    ]
}
