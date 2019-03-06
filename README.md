# Kirby 2 Plugin: Robots

robots.txt for Kirby 2 websites.

> For **Kirby 3** you can use this SEO Kit: [Kirby 3 SEO Kit](https://github.com/ThePoddi/kirby3-seokit) 


## Installation

### Kirby CLI
`kirby plugin:install thepoddi/kirby-robots`

### Git
Include this repository as a submodule `git submodule add https://github.com/thepoddi/kirby-robots.git site/plugins/kirby-robots` or copy it manually to `/site/plugins/`. *Attention: Plugin directory must named like the plugin file (kirby-robots).*


## Usage
This plugin sets a robots file to `/robots.txt` as a kirby route. There is no actual file generated.


## Config

The robots file can be configured via Kirby’s config file `/site/config/config.php`.

### Ignore Pages
Ignore specific pages by URI - example: 'blog/my-article'. (array) *Default: error*
```
c::set( 'robots.ignore.pages', array('error') );
```

Ignore pages by intended templates. (array) *Default: error*
```
c::set( 'robots.ignore.templates', array('error') );
```

Ignore invisible pages. (boolean) *Default: true*
```
c::set( 'robots.ignore.invisible', true );
```

### Set Sitemap File
Set sitemap file in robots.txt. (string) *Default: sitemap.xml*
```
c::set( 'robots.sitemap', 'sitemap.xml' );
```

## Authors

**Patrick Schumacher** - [GitHub](https://github.com/thepoddi) [Website](https://www.thepoddi.com)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
