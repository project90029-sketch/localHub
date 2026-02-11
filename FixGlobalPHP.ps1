# Run this script as Administrator to permanently fix your PHP version
$phpPath = "C:\php81"
$currentPath = [Environment]::GetEnvironmentVariable("Path", "Machine")

if ($currentPath -notlike "*$phpPath*") {
    $newPath = "$phpPath;" + $currentPath
    [Environment]::SetEnvironmentVariable("Path", $newPath, "Machine")
    Write-Host "Success! PHP 8.1 is now the priority. Please restart your terminal." -ForegroundColor Green
} else {
    Write-Host "PHP 8.1 is already in your System PATH." -ForegroundColor Yellow
}
