<?php

// SpeechCraft Setup Script

// Determine the current script's directory
$scriptDirectory = dirname(__FILE__);

// 0. Check for prerequisites
$prerequisites = ['php', 'composer', 'npm', 'git'];

foreach ($prerequisites as $command) {
    if (shell_exec("command -v $command 2>&1") === null) {
        echo "Error: $command is not installed." . PHP_EOL;
        exit(1);
    }
}

// 1. Clone the Repository
echo "Cloning the repository..." . PHP_EOL;
$cloneCommand = "git clone [repository-url] $scriptDirectory/[repository-name]";
shell_exec($cloneCommand);

if (!is_dir("$scriptDirectory/[repository-name]")) {
    echo "Error cloning the repository. Please check the repository URL and your internet connection." . PHP_EOL;
    exit(1);
} else {
    echo "Repository cloned successfully." . PHP_EOL;
}

chdir("$scriptDirectory/[repository-name]");

// 2. Install PHP Dependencies
echo "Installing PHP dependencies..." . PHP_EOL;
$composerInstallCommand = 'composer install';
shell_exec($composerInstallCommand);

if (!file_exists("$scriptDirectory/[repository-name]/vendor/autoload.php")) {
    echo "Error installing PHP dependencies. Ensure Composer is correctly installed and set up." . PHP_EOL;
    exit(1);
} else {
    echo "PHP dependencies installed successfully." . PHP_EOL;
}

// 3. Install JavaScript Dependencies
echo "Installing JavaScript dependencies..." . PHP_EOL;
$npmInstallCommand = 'npm install';
shell_exec($npmInstallCommand);

if (!is_dir("$scriptDirectory/[repository-name]/node_modules")) {
    echo "Error installing JavaScript dependencies. Ensure NPM is correctly installed and set up." . PHP_EOL;
    exit(1);
} else {
    echo "JavaScript dependencies installed successfully." . PHP_EOL;
}

// 4. Environment Configuration
echo "Setting up environment configuration..." . PHP_EOL;
if (!file_exists("$scriptDirectory/[repository-name]/.env")) {
    copy("$scriptDirectory/[repository-name]/.env.example", "$scriptDirectory/[repository-name]/.env");
} else {
    echo ".env file already exists!" . PHP_EOL;
}

// Manually instruct the user to update their .env file
echo "Please update your .env file with the appropriate database configuration, then press any key to continue..." . PHP_EOL;
fgets(STDIN);

// 5. Generate Application Key
echo "Generating application key..." . PHP_EOL;
$artisanKeyGenerateCommand = 'php artisan key:generate';
shell_exec($artisanKeyGenerateCommand);

if (empty(trim(shell_exec('php artisan key:show')))) {
    echo "Error generating application key. Ensure Laravel is correctly set up." . PHP_EOL;
    exit(1);
} else {
    echo "Application key generated successfully." . PHP_EOL;
}

// 6. Run Database Migrations and Seeders
echo "Running database migrations and seeders..." . PHP_EOL;
$migrateCommand = 'php artisan migrate --seed';
shell_exec($migrateCommand);

if (strpos(shell_exec('php artisan migrate:status'), 'Batch') === false) {
    echo "Error running migrations and seeders. Check your database configurations and ensure PostgreSQL is running." . PHP_EOL;
    exit(1);
} else {
    echo "Database migrations and seeders completed successfully." . PHP_EOL;
}

// 7. Run the Local Development Server
echo "Starting the local development server..." . PHP_EOL;
$serveCommand = 'php artisan serve';
shell_exec($serveCommand);

echo "Setup complete! You should now be able to access the project at http://localhost:8000" . PHP_EOL;
