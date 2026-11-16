# Firefly Nova2 skin

A military sci-fi themed skin for Nova 2, built from the Firefly Nova2 design
handoff. Sharp edges, no border-radius, Special Elite + EB Garamond
typography, animated starfield header.

## Changing the ship header image

Drop an image named `ship-header.webp`, `ship-header.jpg`, or
`ship-header.png` into `dist/images/`. The skin looks for it in that order
and falls back to a CSS gradient if none exist.

## Changing the tagline / subtitle

Open `_global/config.php` and edit the `$skin_tagline` and `$skin_subtitle`
values. These are skin-level defaults, not tied to any one sim, and are
shared by `template_main.php`, `template_wiki.php`, and `template_admin.php`.

## Changing the skin colors

Open `dist/css/colors.css` and edit the `--color-*` custom properties under
the `:root` block at the bottom of the file (the 9-shade `--primary-*` /
`--success-*` / etc. variables above them are part of Nova's core Tailwind
utilities and should not be removed).

## Credits

Fill in author/license details in `skin.yml` before distributing this skin
publicly.
