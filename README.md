# **Microweber Adminbolt Plugin**

**BoltStarter** is an example module designed to help you get started with module development for the **AdminBolt** Linux shared hosting control panel. It provides a simple template and framework to build your own custom modules by demonstrating essential integration steps, configuration examples, and basic functionalities.

## Requirements
- AdminBolt Linux Control Panel
- PHP 8.2+ (for module compatibility)
- Laravel framework (as AdminBolt is Laravel-based)

## Installation

To install **Microweber** into your AdminBolt environment, follow these steps:

1. Clone the repository into the `plugins` directory:
    ```bash
    git clone https://github.com/microweber-dev/bolt-plugin.git /usr/local/bolt/plugins/microweber
    ```

2. Open your adminbolt control panel and navigate to the **Modules** section.

3. After installation, **Microweber** should now appear as a module in the AdminBolt control panel.


## Usage

Once installed, you can interact with the module using AdminBolt's command-line tools.


## Directory Structure
```bash
/usr/local/bolt/apps/
├── boltstarter/                   # Module name
│   ├── bin/                       # Executables or core logic
│   ├── config/                    # Configuration files
│   ├── logs/                      # Logs (optional)
│   ├── public/                    # Public assets (icons, screenshots, etc.)
│   │   ├── icons/                 # Icons used by the module
│   │   │   ├── logo.png           # Logo icon
│   │   │   └── banner.png         # Banner or other icons
│   │   └── screenshots/           # Screenshots of the module
│   │       ├── screenshot1.png    # A screenshot of the module in use
│   │       └── screenshot2.png    # Another screenshot
│   ├── provision/                 # Provisioning tasks (install, uninstall, update, repair)
│   │   ├── install.sh             # Install script
│   │   ├── uninstall.sh           # Uninstall script
│   │   ├── update.sh              # Update script
│   │   └── repair.sh              # Repair script
│   ├── module.json                # Module metadata
│   ├── README.md                  # Documentation
│   └── LICENSE                    # License
```

## Contributing

Feel free to fork the repository and create pull requests with improvements. This is an open-source template module, and contributions are always welcome!

## License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.
