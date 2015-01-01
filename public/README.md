# Structure of directory listing

- assets
- css
- images
- js

All 3rd party libraries should be places under `assets`
E.g `assets/bootstrap/` and all bootstrap dependencies should be in that folder (img, css, js)

- Any files that is our own (css img, js) should be placed in the respective folders.
- our own css in `master` branch is compiled and minified
- our own css in other branch should be uncompiled (`sass` or `less` depending on implementation).
- Images are not committed into the repo to save space.
- **Locally, images may exist but never committed**

