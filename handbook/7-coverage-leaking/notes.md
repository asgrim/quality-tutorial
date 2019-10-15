# Coverage leaking

 * `BookingTest`
   - `vendor/bin/phpunit --coverage-html coverage`
 * Run it, note the coverage leaking `BookingId` and `DateSelection`
   - file:///home/james/workspace/quality-tutorial/coverage/index.html
 * Enable `@covers` annotation
 * Note, phpunit settings:
    - `forceCoversAnnotation="true"` - does not generate coverage unless @covers specified
