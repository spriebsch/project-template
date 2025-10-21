<?php declare(strict_types=1);

updateAutoloader(__DIR__ . '/src');
updateAutoloader(__DIR__ . '/tests');

function updateAutoloader(string $srcDir): void
{
    $autoloadPhp = $srcDir . '/autoload.php';

    $autoloadMtime = is_file($autoloadPhp) ? filemtime($autoloadPhp) : 0;

    $needsDump = false;
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($srcDir, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }
        if ($file->getPathname() === $autoloadPhp) {
            continue;
        }
        if ($file->getMTime() > $autoloadMtime) {
            $needsDump = true;
            break;
        }
    }

    if ($needsDump || $autoloadMtime === 0) {
        passthru('composer dump > /dev/null 2>&1', $exitCode);
    }
}
