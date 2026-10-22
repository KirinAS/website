<?php
// tests/test_dockerfile.php

$passed = 0;
$failed = 0;

function assert_true($condition, $message) {
    global $passed, $failed;
    if ($condition) {
        echo "PASS: $message\n";
        $passed++;
    } else {
        echo "FAIL: $message\n";
        $failed++;
    }
}

echo "--- Testing Dockerfile & VERSION ---\n";

$dockerfilePath = __DIR__ . '/../Dockerfile';
assert_true(file_exists($dockerfilePath), 'Dockerfile exists');

$dockerfile = file_get_contents($dockerfilePath);
assert_true(
    preg_match('/^FROM\s+faww\/waf-base-php:26\.42\.0\s*$/m', $dockerfile) === 1,
    'Dockerfile uses FROM faww/waf-base-php:26.42.0'
);

$versionPath = __DIR__ . '/../VERSION';
assert_true(file_exists($versionPath), 'VERSION exists');
$version = trim(file_get_contents($versionPath));
assert_true(
    preg_match('/^\d+\.\d+\.\d+$/', $version) === 1,
    "VERSION ($version) is valid x.y.z format"
);

echo "\n============================\n";
echo "Dockerfile Tests Passed: $passed, Failed: $failed\n";

if ($failed > 0) {
    exit(1);
}
exit(0);
