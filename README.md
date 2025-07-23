# Waltz Creative WordPress Theme

Custom WordPress theme for Waltz Creative, a full-service marketing and creative agency.

## Overview

Modern WordPress theme featuring custom post types, Advanced Custom Fields integration, and Gulp-based build system.

## Build System

### Requirements
- Node.js and npm
- Gulp 4.0+

### Setup
```bash
npm install
gulp
```

### Build Process
- **SCSS**: `assets/scss/` → `style.css` + `style.min.css`
- **JavaScript**: `assets/js/src/` → `all.min.js`
- **File Watching**: Automatic compilation on changes

### Asset Structure
```
assets/
├── scss/
│   ├── core/              # Base styles (loaded in order)
│   ├── layout/            # Global layout components
│   ├── elements/          # Reusable components
│   └── pages/             # Page-specific styles
├── js/src/                # Source JavaScript files
└── img/                   # Images and SVG assets
```

## Theme Architecture

### Init Directory (`/init/`)
Core theme initialization and configuration files:

- **`constants.php`** - Theme setup, image sizes, nav menus, Gutenberg support
- **`cpt.php`** - Custom post types (Work, Clients, Team, Services) and taxonomies
- **`scripts.php`** - Asset enqueuing with cache busting and conditional loading
- **`helpers.php`** - Utility functions, custom login, Gravity Forms integration, ACF customizations
- **`custom.php`** - Additional functionality, breadcrumbs, custom fonts, FacetWP integration
- **`shortcodes.php`** - Custom shortcodes (button, year, award tags)

#### Elements (`/partials/elements/`)
- **`client-popup.php`** - Modal popup for client information display
- **`campaign--countdown.php`** - Countdown timer for campaign pages
- **`campaign--homepage.php`** - Campaign-specific homepage content
- **`campaign--services-grid.php`** - Services grid layout for campaigns
- **`social-icons.php`** - Social media icon display
- **`team-entry-loop.php`** - Team member listing loop

#### Navigation (`/partials/navs/`)
- **`primary-nav.php`** - Main navigation with mobile menu and info blocks
- **`nav-desktop.php`** - Desktop navigation component
- **`nav-footer.php`** - Footer navigation component

### Required Plugins

 - **Advanced Custom Fields Pro**
 - **Beaver Builder**
 - **Gravity Forms**
 - **FacetWP**

---

Developed by [Chee Studio](https://chee.studio) for Waltz Creative.




