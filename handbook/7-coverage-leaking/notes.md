# Coverage leaking

 * `BookingTest`
 * Run it, note the coverage leaking `BookingId` and `DateSelection`
 * Enable `@covers` annotation
 * Demonstrate coverage of `private` - extract ID creation into a
   `private` method for example sake
 * Note, phpunit settings:
    - `beStrictAboutTestsThatDoNotTestAnything`
    - `beStrictAboutCoversAnnotation`
