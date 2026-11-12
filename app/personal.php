<section class="wrap after-hours-hero">
  <div class="night-heading">
    <p class="eyebrow"><span class="night-dot"></span> JEFFREY DYER / OFF THE CLOCK, STILL CURIOUS</p>
    <h1>Curiosity,<br><em>after hours.</em></h1>
    <p class="night-intro">Code, cameras, circuits, and the long way home.<br>A personal notebook from British Columbia.</p>
    <div class="hero-actions"><a class="button" href="#photography">Follow the light <span>↓</span></a><a class="text-link" href="#maker">Visit the maker bench <span class="arrow" aria-hidden="true"></span></a></div>
  </div>
  <figure class="night-window">
    <img src="<?= asset_url('night-study.svg') ?>" alt="An illustrated empty passage with a distant amber doorway and a blue reflection" width="900" height="1000">
    <span class="viewfinder-corner corner-a" aria-hidden="true"></span><span class="viewfinder-corner corner-b" aria-hidden="true"></span>
    <figcaption><span>STUDY 001 / THE LIGHT AT THE END</span><span>ILLUSTRATION</span></figcaption>
  </figure>
  <div class="night-index"><span>01 / LOOK CLOSER</span><span>02 / MAKE SOMETHING</span><span>03 / TAKE A DETOUR</span></div>
</section>
<section class="wrap section photo-section" id="photography">
  <div class="section-heading">
    <div><p class="eyebrow">01 / THE CONTACT SHEET</p><h2>Light worth<br><em>stopping for.</em></h2></div>
    <p>Reflections, empty spaces, and small scenes with an unusual atmosphere. These illustrated studies mark three photography collections I’d like to build.</p>
  </div>
  <div class="contact-sheet">
    <?php foreach ($data['collections'] as $index => $collection): ?>
    <figure class="collection collection-<?= $index ?>">
      <button type="button" class="photo-open" aria-label="View <?= escape($collection['title']) ?> study" data-src="<?= asset_url($collection['image']) ?>" data-title="<?= escape($collection['title']) ?>" data-caption="<?= escape($collection['description']) ?>" data-alt="<?= escape($collection['alt']) ?>">
        <img src="<?= asset_url($collection['image']) ?>" alt="<?= escape($collection['alt']) ?>" width="900" height="1000" loading="lazy">
        <span class="collection-label"><span><?= sprintf('%02d', $index + 1) ?> / <?= escape($collection['label']) ?></span><span aria-hidden="true">+</span></span>
      </button>
      <figcaption><h3><?= escape($collection['title']) ?></h3><span>ILLUSTRATED STUDY · COLLECTION PLANNED</span></figcaption>
    </figure>
    <?php endforeach ?>
  </div>
  <p class="photo-note">A place for phone photography, Polaroids, in-camera illusions, and the frames that deserve a second look.</p>
  <noscript><p>These are illustrated collection studies; the photographs will come later.</p></noscript>
</section>
<dialog id="photo-dialog" aria-labelledby="photo-title">
  <div class="lightbox-top"><span>CONTACT SHEET / ILLUSTRATED STUDY</span><button class="lightbox-close" type="button" aria-label="Close study">Close ×</button></div>
  <img id="photo-image" alt="">
  <div class="lightbox-copy"><div><h2 id="photo-title"></h2><p id="photo-caption"></p></div><div class="lightbox-controls"><button type="button" id="photo-prev" aria-label="Previous study">←</button><span id="photo-position" aria-live="polite"></span><button type="button" id="photo-next" aria-label="Next study">→</button></div></div>
</dialog>
<section class="maker-band" id="maker">
  <div class="wrap section">
    <div class="section-heading"><div><p class="eyebrow">02 / THE MAKER BENCH</p><h2>Sometimes it needs<br><em>a soldering iron.</em></h2></div><p>Hobby electronics, small physical interfaces, and the satisfying moment when a bit of code does something in the real world.</p></div>
    <div class="maker-intro"><div class="circuit-art" aria-hidden="true"><div class="circuit-chip"><span>MAKE<br>SOMETHING<br>SMALL.</span></div><i class="circuit-led"></i><span class="circuit-label">LOW VOLTAGE / HIGH CURIOSITY</span></div><div><p class="eyebrow">A NOTEBOOK FOR FUTURE BUILDS</p><h3>From a breadboard<br>to something useful.</h3><p>Microcontrollers, sensors, old hardware, and little displays. This is where I’ll keep the experiments, parts notes, photographs, and lessons learned.</p><a class="text-link" href="<?= note_url('personal', 'from-code-to-circuits') ?>">Why this belongs here <span class="arrow" aria-hidden="true"></span></a></div></div>
    <div class="maker-grid">
      <?php foreach ($data['maker_ideas'] as $index => $idea): ?>
      <article><div class="maker-number"><?= sprintf('%02d', $index + 1) ?> <span>IDEA TO EXPLORE</span></div><h3><?= escape($idea['title']) ?></h3><p><?= escape($idea['description']) ?></p><details><summary>Open the notebook <span aria-hidden="true">+</span></summary><p><?= escape($idea['first_step']) ?></p></details></article>
      <?php endforeach ?>
    </div>
  </div>
</section>
<section class="wrap now-section" id="now">
  <div><p class="eyebrow"><span class="night-dot"></span> NOW / NOVEMBER 2026</p><h2>On my mind<br><em>at the moment.</em></h2><p class="small-muted">An occasional snapshot of interests.</p></div>
  <ul><li><span>01</span><p><strong>A more personal internet.</strong> Small Canadian websites, useful tools, and a corner of the web that feels like someone lives here.</p></li><li><span>02</span><p><strong>Code meeting the physical world.</strong> Hobby electronics, sensors, and ideas for little things to make.</p></li><li><span>03</span><p><strong>Looking twice.</strong> Reflections, liminal places, Polaroids, and optical-illusion photography.</p></li><li><span>04</span><p><strong>The next interesting turn.</strong> Rail trails, coastal detours, old infrastructure, and things worth keeping.</p></li></ul>
</section>
<section class="journal-band"><div class="wrap section" id="journal">
  <div class="section-heading"><div><p class="eyebrow">03 / FIELD NOTES</p><h2>Some things<br><em>leave a trace.</em></h2></div><a class="text-link" href="<?= feed_url('personal') ?>">Follow at your own pace · RSS <span class="arrow" aria-hidden="true"></span></a></div>
  <div class="personal-note-list">
    <?php foreach ($data['notes'] as $index => $item): ?>
    <a href="<?= note_url('personal', $item['slug']) ?>"><span class="note-index"><?= sprintf('%02d', $index + 1) ?></span><div><p class="eyebrow"><?= escape($item['category']) ?></p><h3><?= escape($item['title']) ?></h3><p><?= escape($item['summary']) ?></p></div><span class="note-arrow"><span class="arrow" aria-hidden="true"></span></span></a>
    <?php endforeach ?>
  </div>
</div></section>
<section class="wrap section personal-projects" id="projects">
  <div class="section-heading"><div><p class="eyebrow">04 / THE DIGITAL SIDE</p><h2>Curiosity, with source code.</h2></div><p>The workshop is where the technical details live. A few threads from over there:</p></div>
  <div class="personal-project-list"><?php foreach ($data['projects'] as $project): ?><a href="<?= escape($project['url']) ?>"><span class="project-symbol"><?= escape($project['symbol']) ?></span><div><h3><?= escape($project['title']) ?></h3><p><?= escape($project['description']) ?></p></div><span class="note-arrow"><span class="arrow" aria-hidden="true"></span></span></a><?php endforeach ?></div>
  <a class="text-link" href="<?= page_url('workshop') ?>">More experiments at jsd.technology <span class="arrow" aria-hidden="true"></span></a>
</section>
<section class="wrap personal-about section"><div><p class="eyebrow">05 / THE PERSON BETWEEN THE PROJECTS</p><h2>Same curiosity.<br><em>Different scenery.</em></h2></div><div><p class="lead">A terminal window. A quiet street. A circuit that finally works. A photograph that feels a little strange.</p><p>I’m Jeffrey, an independent developer in British Columbia. The interests connect more than they might seem: understand how a thing works, follow an interesting path, and make something worth keeping.</p><p>This is my personal corner. The workshop holds the technical experiments; JSD Technologies is where that experience becomes work for clients.</p><div class="hero-actions"><a class="text-link" href="mailto:jeffdyer@gmail.com">Say hello <span class="arrow" aria-hidden="true"></span></a><a class="text-link" href="<?= page_url('studio') ?>">Looking for a technical partner? <span class="arrow" aria-hidden="true"></span></a></div></div></section>
