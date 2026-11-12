# Jeffrey Dyer — the personal corner

A small PHP site for **jeffreydyer.ca**: a now page, introductory field notes, links to real projects, and an RSS feed. Warm, illustrated, and personal, with room for cycling, exploration, photography, digital archives, and the indie web. The landscape is an illustration, not a photograph or a record of a specific trip.

This repository stands on its own. [jsdyer/jsd-technologies](https://github.com/jsdyer/jsd-technologies) holds the client website and technical workshop. A shared visual navigation connects the three, without a runtime dependency between repositories. The small rendering foundation is intentionally copied rather than introducing a package or framework.

## Run

Requires PHP 8.2+. No Composer, Node, or build step.

```sh
php -S localhost:8080 -t public
php tests/smoke.php
```

Open http://localhost:8080. `public/index.php` fixes the site to `personal`. The navigation links use the production domains. The current now section is explicitly a November 2026 snapshot, not a live location or activity feed.

## Deploy

Clone into `/srv/jeffrey-dyer` and adapt `deploy/apache.conf.example`. Serve **only `public/`**, add your existing PHP handler, configure HTTPS certificates, and redirect HTTP to HTTPS. Point the canonical domain to your server when ready. Additional personal domains should redirect to `https://jeffreydyer.ca/` rather than hosting duplicate copies. DNS and production hosting have not been changed.

The public email is currently `jeffdyer@gmail.com`; change it in `app/layout.php` and `app/personal.php` if desired. Review the introductory first-person editorial draft before wider publication. No invented client stories, photos, live activity, or telemetry are included. There are no third-party assets, trackers, or cookies set by this application.

## Edit

- `app/personal.php`: the homepage, now snapshot, and about copy.
- `content/personal.json`: project links and field notes. Each note has a slug, title, summary, category, date, and paragraph array. All content is escaped when rendered.
- `app/layout.php`: shared header, footer, and metadata.
- `public/assets/landscape.svg`: original vector landscape illustration.
- `public/assets/style.css`: responsive site styles; the common CSS is self-contained.

The site's default content store is readable, version-controlled JSON. For SQLite, enable the PHP PDO SQLite extension, run `php bin/content.php import`, then start the site with `CONTENT_STORE=database`. The default database is `var/content.sqlite`, outside the public root. Use `php bin/content.php export` to write database content back to JSON (overwrites files; commit or back up edits first).

Optional MariaDB uses the same portable table through PDO. Supply `DB_DSN=mysql:host=localhost;dbname=jeffrey_dyer;charset=utf8mb4`, `DB_USER`, and `DB_PASSWORD` through your server's environment, run the CLI import with a deployment account, and use a read-only account for serving. A `.env` file is not loaded automatically. PHP-FPM requires explicit environment configuration. SQLite has been integration-tested; MariaDB has not been run in the build environment.

There is no public administration panel. Editing versioned content and importing it when needed keeps this small and maintainable.

## Static review export

```sh
php bin/export.php personal /tmp/jsd-preview/personal
```

The combined review preview uses the business site at `/`, workshop at `/workshop/`, and this site at `/personal/`. Exports contain `noindex` and keep the real domains in canonical and RSS item URLs. Production runs the PHP source directly. No static export or Node tool is necessary on the web server.
