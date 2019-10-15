# phpstan helps find bugs

 - `git checkout -- exercises/3-static-analysis`
 - `vendor/bin/phpstan analyse --level 0 exercises/3-static-analysis`
 - ...
 - `vendor/bin/phpstan analyse --level 7 exercises/3-static-analysis`

# Psalm also, my preferred tool

 - `git checkout -- exercises/3-static-analysis`
 - vendor/bin/psalm
   * fix all the issues
   * recommendation: start with strictest, but with a baseline
     - `errorBaseline="psalm-baseline.xml"` to XML
     - `vendor/bin/psalm --set-baseline=psalm-baseline.xml`
     - `vendor/bin/psalm --update-baseline` each time you improve the codebase
   * HTML output - <https://github.com/Roave/psalm-html-output>
     - `vendor/bin/psalm --output-format=xml | docker run --rm -i psalm-html-output:latest > psalm-report.html`
     - <file:///home/james/workspace/quality-tutorial/psalm-report.html>

# Recommendations

 - PHP Inspections (EA Extended)
 - Add `phpstan` or Psalm to CI (after fixing the issues!)
 - Baselining (e.g. with Psalm)
