# SpeechCraft Developer Setup Guide

Welcome to the SpeechCraft development team! This guide is designed to ensure a smooth onboarding process, helping you set up the project on your local machine regardless of your experience level with Laravel or PHP.

## Prerequisites

Before starting, ensure you have the following software installed:

1. **PHP 8.2.8**: This project requires PHP version 8.2.8. You can check your version by running:

   ```bash
   php -v
   ```

   If you don't have PHP installed or need to update, visit the [official PHP website](https://www.php.net/downloads.php).

2. **Composer**: Laravel and many other PHP projects rely on Composer for dependency management. If you haven't installed Composer yet, [download and install it from here](https://getcomposer.org/download/).

3. **Node.js & NPM**: Some frontend assets in this project might require Node.js and NPM. If you don't have these installed or need to update, [download Node.js, which comes with NPM](https://nodejs.org/).

4. **PostgreSQL**: SpeechCraft uses PostgreSQL as its primary database. Make sure you have it installed and running. [Download and set up PostgreSQL here](https://www.postgresql.org/download/).

5. **Git**: Git is essential for version control and cloning the repository. If you haven't installed Git yet, [download and install it from here](https://git-scm.com/downloads).

## Automated Setup

1. **Clone the Repository**:

   Clone the SpeechCraft repository to your local machine:

   ```bash
   git clone https://github.com/abenteuerzeit/SpeechCraftAI.git
   cd SpeechCraftAI
   ```

2. **Ensure the `setup.php` Script is Executable**:

   Before running the `setup.php` script, ensure it's executable. If you're on a Unix-like system (Linux or MacOS), you can do:

   ```bash
   chmod +x setup.php
   ```

   If you're on Windows and using Git Bash or a similar terminal, the script should be executable without this step.

3. **Run the Setup Script**:

   Now, execute the setup script. This script will automate the environment setup, install dependencies, and initialize the database:

   ```bash
   php setup.php
   ```

This automated process is intended to streamline the onboarding experience, making the setup nearly effortless.

## Troubleshooting

Should you encounter any issues during the setup:

1. Revisit the **Prerequisites** section and confirm all software is correctly installed and updated.
2. Check the project's `README.md` or `CONTRIBUTING.md` for additional guidelines or known issues.
3. If problems persist, don't hesitate to reach out to the team lead or open an issue in the GitHub repository for assistance.
