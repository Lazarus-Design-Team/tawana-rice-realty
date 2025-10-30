# GitHub Actions Workflows

This repository uses GitHub Actions for theme validation and deployment to SpinupWP.

## Workflows

### 1. Theme Quality Checks (`ci.yml`)

**Triggers:**
- Pull requests to `main` or `develop` branches
- Pushes to `develop` branch

**What it does:**
- Validates ACF JSON syntax (if ACF is used)
- Checks for required theme files
- Lints PHP files for syntax errors

---

### 2. Theme Deployment (`deploy.yml`)

**Triggers:**
- Pushes to `main` branch
- Manual trigger via workflow_dispatch

**What it does:**
1. Deploys theme files to SpinupWP server via rsync
2. Flushes WordPress cache

**Excludes from deployment:**
- `.git/` and `.github/` directories
- `CLAUDE.md` and `README.md`
- `node_modules/`, `vendor/`
- System files

---

## Required GitHub Secrets

| Secret Name | Description | Example |
|-------------|-------------|---------|
| `SPINUPWP_SSH_KEY` | Private SSH key for server access | `-----BEGIN OPENSSH PRIVATE KEY-----...` |
| `SPINUPWP_HOST` | Server hostname or IP address | `123.45.67.89` |
| `SPINUPWP_USER` | SSH username | `spinupwp` |
| `SPINUPWP_THEME_PATH` | Full path to theme directory | `/sites/tawana.staging.lazarushost.com/files/wp-content/themes/tawana-rice-realty` |
| `SPINUPWP_SITE` | Site name/domain | `tawana.staging.lazarushost.com` |

---

## Manual Deployment

1. Go to **Actions** tab in GitHub
2. Select **Deploy Theme to SpinupWP**
3. Click **Run workflow**

---

## Setup

This CI/CD configuration was generated using setup-wordpress-cicd.sh
