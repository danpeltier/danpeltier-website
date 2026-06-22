<?php
// origin story
?>
<!doctype html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Origin Story | Dan Peltier</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&amp;family=DM+Sans:wght@300;400;500&amp;display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --bg:      #0d0d0d;
      --surface: #141414;
      --card:    #1a1a1a;
      --border:  #2a2a2a;
      --accent:  #4ecdc4;
      --accent2: #a8e6cf;
      --text:    #e8e8e8;
      --muted:   #888;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      font-weight: 300;
      line-height: 1.85;
      font-size: 1.05rem;
    }

    .profile-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(45deg, #000066, #a00);
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: white;
        font-weight: bold;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    .profile-image:hover {
        transform: scale(1.05);
    }

    /* ── NAV ── */
    nav {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(13,13,13,0.85);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.9rem 2rem;
    }
    .nav-logo {
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--text);
      text-decoration: none;
      letter-spacing: 0.02em;
    }
    .nav-logo span {
      color: var(--accent);
    }
    .nav-back {
      display: flex;
      align-items: center;
      gap: 0.4rem;
      font-size: 0.82rem;
      font-weight: 500;
      color: var(--muted);
      text-decoration: none;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      transition: color 0.2s;
    }
    .nav-back:hover {
      color: var(--accent);
    }
    .nav-back svg {
      width: 14px;
      height: 14px;
    }

    /* ── HERO ── */
    .hero {
      position: relative;
      padding: 5rem 2rem 3.5rem;
      text-align: center;
      overflow: hidden;
    }
    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(78,205,196,0.12) 0%, transparent 70%);
      pointer-events: none;
    }
    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.75rem;
      font-weight: 500;
      color: var(--accent);
      letter-spacing: 0.15em;
      text-transform: uppercase;
      border: 1px solid rgba(78,205,196,0.3);
      border-radius: 999px;
      padding: 0.35rem 1rem;
      margin-bottom: 1.8rem;
    }
    .hero-eyebrow::before {
      content: '✍️';
      font-size: 2.5re
      ;
    padding: 0 2rem;
  }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.4rem, 6vw, 4.2rem);
      font-weight: 700;
      line-height: 1.15;
      letter-spacing: -0.01em;
      margin-bottom: 1rem;
    }
    .hero-meta {
      color: var(--muted);
      font-size: 0.85rem;
      letter-spacing: 0.06em;
    }
    .hero-meta span {
      display: inline-block;
      margin: 0 0.5rem;
    }
    .hero-meta .dot {
      color: var(--accent);
    }
    .divider {
      width: 60px;
      height: 2px;
      background: linear-gradient(90deg, var(--accent), transparent);
      margin: 2.5rem auto;
    }

    /* ── ARTICLE ── */
    article {
      max-width: 760px;
      margin: 0 auto;
      padding: 0 2rem 6rem;
    }

    p {
      margin-bottom: 1.6rem;
    }
    a {
      color: inherit;
      text-decoration: none;
    }

    /* Drop cap */
    .drop-cap::first-letter {
      float: left;
      font-family: 'Playfair Display', serif;
      font-size: 5.2rem;
      line-height: 0.78;
      color: var(--accent);
      margin-right: 0.12em;
      margin-top: 0.08em;
      font-weight: 700;
    }

    /* Dialogue */
    .dialogue {
      background: var(--card);
      border-left: 3px solid var(--accent);
      border-radius: 0 8px 8px 0;
      padding: 0.9rem 1.4rem;
      margin: 1.6rem 0 0.4rem;
      font-style: italic;
      color: var(--accent2);
    }
    .dialogue-response {
      padding: 0.2rem 1.4rem 1.4rem;
      color: var(--text);
    }

    /* Callout */
    .callout {
      background: linear-gradient(135deg, rgba(78,205,196,0.06), rgba(168,230,207,0.04));
      border: 1px solid rgba(78,205,196,0.2);
      border-radius: 10px;
      padding: 1.3rem 1.6rem;
      margin: 2rem 0;
      font-size: 0.95rem;
      color: var(--accent2);
      line-height: 1.7;
    }

    /* Aside / intermission */
    .aside {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 1.1rem 1.5rem;
      margin: 2rem 0;
      font-size: 0.9rem;
      color: var(--muted);
      line-height: 1.7;
    }
    .aside strong {
      color: var(--accent);
      font-weight: 500;
      display: block;
      margin-bottom: 0.3rem;
      font-size: 0.75rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }

    /* Section labels */
    .section-label {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      margin: 3rem 0 1.5rem;
      font-size: 1.125rem;
      font-weight: 500;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      color: var(--muted);
    }
    .section-label::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--border);
    }

    /* Centred image blocks */
    .img-block {
      margin: 2rem 0;
      text-align: center;
    }
    .img-block img {
      width: 24rem;
      height: auto;
      border-radius: 8px;
      border: 1px solid var(--border);
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
      display: block;
      margin: 0 auto;
    }
    .img-block figcaption {
      margin-top: 0.7rem;
      font-size: 0.78rem;
      color: var(--muted);
      letter-spacing: 0.04em;
    }

    /* Side-by-side pair */
    .img-pair {
      display: flex;
      gap: 1.2rem;
      margin: 2rem 0;
      justify-content: center;
      align-items: flex-start;
    }
    .img-pair figure {
      flex: 1;
      text-align: center;
      max-width: 240px;
    }
    .img-pair img {
      width: 100%;
      border-radius: 8px;
      border: 1px solid var(--border);
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
      height: 10rem;
      object-fit: contain;
      background-color: white;
    }
    .img-pair figcaption {
      margin-top: 0.5rem;
      font-size: 0.75rem;
      color: var(--muted);
    }

    /* Floating images */
    .img-float-right {
      float: right;
      margin: 4rem 0 1.2rem 1.6rem;
      width: 54%;
    }
    .img-float-left {
      float: left;
      margin: 0 1.6rem .25rem 0;
      width: 35%;
    }
    .img-float-right img,
    .img-float-left img {
      width: 100%;
      border-radius: 8px;
      border: 1px solid var(--border);
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
    }
    .img-float-right figcaption,
    .img-float-left figcaption {
      margin-top: 0.4rem;
      font-size: 0.73rem;
      color: var(--muted);
      text-align: center;
    }
    .clearfix::after {
      content: '';
      display: table;
      clear: both;
    }

    /* Footer */
    footer {
      border-top: 1px solid var(--border);
      padding: 2.5rem 2rem;
      text-align: center;
      color: var(--muted);
      font-size: 0.82rem;
      letter-spacing: 0.06em;
    }
    footer a {
      color: var(--accent);
      text-decoration: none;
    }

    /* Animations */
    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(18px);
      }
      to   {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .hero {
      animation: fadeUp 0.7s ease both;
    }
    article {
      animation: fadeUp 0.7s ease 0.15s both;
    }

    @media (max-width: 600px) {
      .img-pair {
        flex-direction: column;
        align-items: center;
      }
      .img-pair figure {
        width: 90%;
      }
      .img-float-right, .img-float-left {
        float: none;
        width: 100%;
        margin: 1.2rem 0;
      }
      .drop-cap::first-letter {
        font-size: 3.8rem;
      }
    }
  </style>
</head>
<body>

  <nav>
    <div class="profile-image" onclick="window.location='/';">DP</div>
    <a class="nav-back" href="https://danpeltier.ca">
      <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M10 3L5 8l5 5"></path>
      </svg>
      Back to Home
    </a>
  </nav>

  <header class="hero">
    <div class="hero-eyebrow"></div>
    <h1>My Origin Story</h1>
    <div class="hero-meta">
      <span>Dan Peltier</span>
      <span class="dot">·</span>
      <span>Personal Essay</span>
      <span class="dot">·</span>
      <span>~12 min read</span>
    </div>
    <div class="divider"></div>
  </header>

  <article>

    <p>In this day and age, many of you are under the impression that computers are evolving at a mind-boggling rate, but really, you have no idea. Back in my day, new types of computers were being created almost DAILY. It was 1985, and I was only 10 years old, which was an exciting time, as companies all raced to be the new "standard". Amazingly, and sadly, the computers they sold were often obsolete the SECOND they hit the shelves. At that time, places like Radio Shack were offering the latest and greatest, and it was there that my parents purchased my first PC. Today's post is all about my experience with that wonderful machine: The Tandy 1000-HX.</p>

    <div class="img-block">
      <figure>
        <img src="./tandy.jpg" alt="The Tandy 1000-HX">
        <figcaption>The Tandy 1000-HX - with far more accessories than I had</figcaption>
      </figure>
    </div>

    <div class="dialogue">"How many Gigs of RAM did it have?"</div>
    <p class="dialogue-response">It didn't.</p>

    <div class="dialogue">"OK. How many MEGS of RAM did it have?"</div>
    <p class="dialogue-response">It didn't.</p>

    <p>No, my hopefully-sympathetic readers, it had Kilobytes of RAM. To be more precise, it had a whopping 256KB of memory. By today's standards, that is enough memory to store about 7% of the average MP3, which, if you're lucky, MIGHT not cut out before the first chorus. Believe it or not, this was impressive for that particular week. Like I said, computers were getting better at an insane rate, and anything purchased the week after was almost-definitely better than mine, coming out with new wonders like HARD DRIVES, whereas mine only came with a 3.5" floppy drive. That's it. Oh, and my monitor had TWO colours: black and green. These were the days of monochrome monitors, and it was a very scary time, indeed.</p>

    <div class="section-label">The Creative Spark</div>

    <p>It came with a couple of games, which had to be run from the floppy disks, but I showed very little excitement over those. My interest was peaked when I saw a book that arrived with it. I scanned the title: BASIC Programming User's Guide and Glossary.</p>

    <div class="callout">
      I was intrigued! I was mesmerized! What did it MEAN? Was this book the secret to creating my own computer programs? I was determined to find out. I read it from beginning to end. I was fascinated by the description of these WORDS that had the power to manipulate text in any way I wanted. As I tested out more and more of the topics, I figured out how to make everything on the screen do my bidding. It was like magic.
    </div>

    <p>Now remember, everyone: the Internet was at its infancy back then, and the very first domains were being created and registered that very year. I couldn't do a quick Google search and find out how to do all of this because, well, Google didn't even EXIST. I had to figure it all out by myself. And yes, I really was only 10 years old. I spent much of my spare time on this supernatural contraption, and as I learned more about programming, I would also learn just how much I DIDN'T know about programming. This made me crave more. I kept at it, creating increasingly more complex code. I could make text do whatever I wanted, and it wasn't before long that I created what I thought was an impressive video game, using what would eventually be called Text or ASCII Art.</p>

    <div class="img-pair">
      <figure>
        <img src="./ascii-enterprise.png" alt="Starship Enterprise in ASCII Art">
        <figcaption>The Starship Enterprise in ASCII Art</figcaption>
      </figure>
      <figure>
        <img src="./ascii-spock.png" alt="Spock in ASCII Art">
        <figcaption>Spock in ASCII Art</figcaption>
      </figure>
    </div>

    <div class="section-label">Boldly Going Further</div>

    <p>At this time, it was 1989, and I was just finishing grade 8. A few years had passed since I received that first computer, and given that we weren't a wealthy family, I was still using the same one. This game that I created was naturally based on one of my true loves: Star Trek. It was even more exciting to me, because their new series, Star Trek: The Next Generation, was well into its second season, and I just HAD TO make my game about that. This masterpiece of mine used keyboard characters to "draw" the main bridge of the Enterprise, ships in space, and even crew members.</p>

    <div class="img-block">
      <figure>
        <img src="./donkey-kong.png" alt="Donkey Kong on the Atari 7800">
        <figcaption>Donkey Kong on the Atari 7800 - pixelated characters that required imagination</figcaption>
      </figure>
    </div>

    <p>Yes, the people I created for this game looked quite silly, but back then imagination was a true necessity. People were still buying games on the Atari 7800, and its tiny, pixelated characters required plenty of imagination, therefore, in my humble opinion, my characters were pretty good. So my game took the player through a story that involved ships shooting at each other, "scenes" on the main bridge, and even the Away Team beaming down. Yes folks, I was rather impressed with myself.</p>

    <div class="callout">
      But something was missing. I wanted TRUE graphics. I wanted to actually DRAW on the computer, and I wanted those drawings to come to life in a video game. As before, Star Trek: TNG would be my inspiration, but it would take another year before this dream was realized.
    </div>

    <div class="section-label">The Coordinate Breakthrough</div>

    <p>For months, I spent much of my time learning more functions, with the singular hope of figuring out how to make my programs DRAW on the screen. As it turned out, the concept itself eluded me during those first couple of programming years because of one problem: I hadn't even learned about the Cartesian Plane in school.</p>

    <div class="clearfix">
      <figure class="img-float-left">
        <img src="./draw-by-numbers.png" style="background-color: white;" alt="Draw By Numbers">
        <figcaption>Draw By Numbers</figcaption>
      </figure>
      <p>There I was. It was still 1989. Math was one of my favourite subjects and I was doing VERY well. Eventually they taught me all about coordinates, equations, and the algebra used to make lines of various types. So inevitably, I went back to reread that BASIC programming glossary, and as soon as I did, it clicked. I began to understand more of the functions. Some actually dealt with creating a point on the screen, as well as things like the start and end coordinates for drawing a line, the centre point and radius for drawing a circle, and so much more. I was one step closer to achieving my dream of creating a video game with actual graphics! But how do I use these strange functions to my advantage? The answer came to me when I saw my friend's younger brother solving a "draw by numbers" puzzle. It made me realize that almost any picture can be drawn using a series of straight lines. So to keep things simple, that's exactly how I would create my "masterpiece" of gaming technology.</p>
    </div>

    <p>Immediately following this epiphany, I realized the next major hurdle: my complete and total lack of artistic talent. At the time, I could not draw well AT ALL. Even my stick people looked weird. I did eventually learn how (in the far distant future), but at the time, I needed another solution.</p>

    <div class="aside">
      <strong>⏸ Intermission</strong>
      I feel it is once again necessary to point out that this was the early stages of the Internet. I couldn't simply go to Google Images or startrek.com to find and download pictures of ships, planets or the crew. As before, I had to use my imagination to make this work.
    </div>

    <div class="clearfix">
      <figure class="img-float-right">
        <img src="./enterprise.jpg" alt="Enterprise D - Side View" style="margin-top: .5rem;">
        <figcaption>Enterprise D - Side View</figcaption>
      </figure>
      <p>As luck would have it, I was a member of the Star Trek fan club back then. With this membership I received many amazing perks, including a monthly magazine. Having about half a dozen issues by that time gave me plenty of pictures to trace, which is exactly what I proceeded to do. I searched them all looking for the perfect side view of the Enterprise D. After all, I needed it facing left or right if I were to make it "fly" across the screen. A local craft store in my home town sold me some thin paper, which made it easier to see through and trace when placed over any photo. It would also prove helpful in the next step of this time-consuming-but-totally-worth-it project.</p>
    </div>

    <p>Once I had finalized my facsimile of NCC-1701-D, I could already envision the series of straight lines that would make it possible, so I drew dots all over it to make them easier to see. My next challenge was to translate those dots into coordinates on my screen. I placed the drawing on top of a sheet of graph paper, thus showing all of them on a grid. This led me to figure out a scale. Through trial and error, I determined that my monitor had 320 pixels across and 200 pixels vertically.</p>

    <div class="aside">
      <strong>📐 FYI</strong>
      By comparison, that resolution would cover about 3% of today's 1920x1080 monitors! Believe it or not, that wasn't bad for the times, and I was determined to make it work!
    </div>

    <p>My starship could not take up the entire 320 pixels across, otherwise there would be no room for anything to happen in the game, so I decided to make it about 1/4 the size of the screen. To accomplish this, I simply went to the top left of the graph paper and marked it as (0,0). I then marked the very next grid line to the RIGHT of the ship as 80, with the line at the BOTTOM of the ship being somewhere around 40. Based on that, I counted the number of grid lines between the far left and far right lines, and divided that into 80, which told me how many pixels would be between each grid line. I of course had to do the same for the lines between the top and bottom, dividing that number into 40. Then the REAL fun began. <em>*SARCASM INTENDED*</em></p>

    <p>OK. This next part was extremely monotonous, and it took forever, but was still totally worth it. For each series of lines, I had to approximate where each dot was on the graph, and write down the pair, while noting which coordinates were the beginning of a line, and which were the end. I then began the data entry portion of the project. I had to enter all of these numbers into my program as pairs of numbers in an array. This part took me the longest, since I wasn't the incredibly fast typist that I am today (another thing I learned the following year).</p>

    <div class="section-label">The Eureka Moment</div>

    <div class="clearfix">
      <figure class="img-float-left">
        <img src="./drawing-of-enterprise.jpg" alt="Enterprise in ASCII Art">
        <figcaption>Enterprise "drawn" by the computer</figcaption>
      </figure>
      <p>With the boring segment out of the way, I could finally get back to business. It was time to make use of that awesome line-drawing function, which I added to a "loop" that would simply go through each set of coordinates in the array, completing a line and starting a new one when needed. I saved my program, and was super excited to watch the computer create each line until it completed an exact copy of my traced Enterprise D. It was BEAUTIFUL, but the pride I felt was short-lived. It occurred to me that, as amazing as this powerhouse of circuitry was, my computer was slow enough to be a problem. The fact that I was watching it SLOWLY draw the ship meant that I couldn't instantly make it redraw the ship two pixels away to give it the illusion of movement. That's how I did it in my old ASCII Art based game, but it was apparent that I needed to rethink that part.</p>
    </div>

    <p>So once again, I went back to consult the programming guide. This time, I had no idea what I was even looking for. I just hoped that I would find a solution. I double and triple checked over any function that I hadn't really used or even tried thus far. The answer was found in two of them: PUT and GET. I distinctly remember the descriptions of these two commands originally being very confusing. When I had first read these pages, I had no idea how I would ever use them, or why, so I immediately ignored it all. This time, however, I had an "A-ha" moment. GET would store the contents of a rectangle that I would define myself, consisting of everything from its top-left to its bottom-right coordinates. PUT would INSTANTLY place that image anywhere on the screen. Yes, <strong>instantly</strong>. My ship could move!</p>

    <div class="section-label">The Light at the End of the Tunnel</div>

    <div class="clearfix">
      <figure class="img-float-left">
        <img src="./warbird.jpg" alt="Romulan Warbird">
        <figcaption>Romulan Warbird</figcaption>
      </figure>
      <figure class="img-float-right">
        <img src="./borg-cube.jpg" alt="Borg Cube">
        <figcaption>Borg Cube</figcaption>
      </figure>
      <p>Finally! The hard part was over. All I had left to do was... the exact same process for pictures of asteroids, Romulan warbirds, the Enterprise Bridge (with people at their stations), and a Borg cube, make the ships "fly" by making random pixels (stars) move across the screen, actually break up the ship into pieces so that the stars that were flying past wouldn't disappear behind the huge rectangle that I used with the PUT command (a consequence of the command itself), make it possible to "steer" the Enterprise with the arrow keys, make it possible to turn on shields, shoot phasers, fire torpedoes, and, oh ya, show each level and scene to progress the game. That's all. As it turned out, I couldn't find a decent picture of the Borg cube, which was CRITICAL to my game's plot. I was rescued by my older sister. Being quite the talented artist, she agreed to draw one for me, and it looked really impressive. It was the one aspect of my game that looked cool BECAUSE OF (not despite) my monochrome monitor. Its green glow was just PERFECT.</p>
    </div>

    <p>All of this took me just shy of year. I had a true passion for programming, and was rarely torn away from it, but don't worry! I eventually broke out of my shell sometime in 1991.</p>

    <div class="section-label">Grade 10 &amp; Colour Monitors</div>

    <p>In the meantime, however, my masterpiece was still evolving. When I hit grade 10, our school had a Computer Science class, which I OBVIOUSLY joined. EVERYTHING taught in that course was stuff I already knew, so, in addition to helping other students, I spent much of class time tweaking my video game. The computers they provided contained 80386 processors. Despite their maximum speed being 40MHz (which is actually 1.4% of the speed of my current PHONE), it was still 8 times faster than my old Tandy. So my next challenge was to slow the game down a bit, otherwise the asteroids would fly by so quickly, you would have no time to react, the ship would be destroyed, and you would immediately lose the game. This was a small price to pay, and I took the extra time needed, because these machines had (wait for it) COLOUR MONITORS! That's right folks. With a few edits, my phasers and torpedoes would be RED! My asteroids would be BROWN! I all of a sudden had 16 distinct colours in my arsenal, and I was determined to use them.</p>

    <div class="img-block">
      <figure>
        <img src="./bridge.jpg" alt="Bridge of the Enterprise D">
        <figcaption>Bridge of the Enterprise D</figcaption>
      </figure>
    </div>

    <p>So in the end, I was quite impressed with myself. The game started with a scene on the Bridge, where the Captain gave his famous "Captain's Log" to describe how the mission would start in an asteroid field. Then Level 1 would load, and the player had to navigate past and/or shoot the asteroids without getting destroyed. The next scene indicated that you made it to a planet, where you had to beam up a Romulan defector/scientist, who would give you further instructions. AFTER that, you needed to escape through the asteroid field again, but this time with Romulan warbirds chasing and shooting at you. That's Level 2. The next scene involved the defector explaining that the Borg were nearby, needed to be stopped, and only she knew how. So a course is set, and you encounter the Borg cube, to which Riker transports over in order to destroy it. The Borg drones resist, so Level 3 involves getting past them to blow up the critical console described by the defector. If you make it this far, and you manage to destroy it, you are beamed away, the Cube blows up, and you win the game!</p>

    <div class="callout">
      It was accomplishments like this that made me think (at the time) that I knew it all. But as computers continued to evolve, so did programming. Soon I would discover that BASIC was becoming an extinct language (it wouldn't be the first), and I would need to get with the times. Since then, I have learned several DOZEN programming languages, many of which I still use to this day, but the most important thing I learned was resilience.
    </div>

  </article>

  <footer>
    <p>© 2026 Dan Peltier &nbsp;·&nbsp; <a href="https://danpeltier.ca">danpeltier.ca</a></p>
  </footer>

</body></html>
