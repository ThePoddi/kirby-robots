<?php
/** KIRBY PLUGIN: Robots
 * -------------------------------------------------------------------
 * Plugin Name: Robots
 * Description: robots.txt for Kirby Websites.
 * @version    1.0.1
 * @author     Patrick Schumacher <hello@thepoddi.com>
 * @link       https://github.com/ThePoddi/kirby-robots
 * @license    MIT
 */

$ignorePages      = c::get( 'robots.ignore.pages', array('error') );
$ignoreTemplates  = c::get( 'robots.ignore.templates', array('error') );
$ignoreInvisible  = c::get( 'robots.ignore.invisible', true );
$sitemap          = c::get( 'robots.sitemap', 'sitemap.xml' );

// ROBOTS.txt
kirby()->routes(
  array(
    array(
      'pattern' => 'robots.txt',
      'method' => 'GET',
      'action' => function() use ( $ignorePages, $ignoreTemplates, $ignoreInvisible, $sitemap ) {
        $robots = '# robots.txt for ' . site()->url() . "\n";
        $robots .= 'User-agent: *' . "\n";

        // disallow crawling for some pages
        foreach( site()->index() as $p ) :
          if (
            in_array( $p->uri(), $ignorePages ) || // ignore pages defined in config
            in_array( $p->intendedTemplate(), $ignoreTemplates ) || // ignore templates defined in config
            ( $ignoreInvisible === true && $p->isInvisible() ) // ignore invisible pages
          ) $robots .= 'Disallow: /' . $p->uri() . "\n";
        endforeach;

        // sitemap location
        $robots .= 'Sitemap: ' . site()->url() . '/' . $sitemap . "\n";

        return new Response( $robots, 'text' );
      }
    )
  )
);
