# phpstan helps find bugs

 - vendor/bin/phpstan analyse --level 0 exercises/4-phpstan
   * duplicate array keys
 - vendor/bin/phpstan analyse --level 2 exercises/4-phpstan
   * extra params found
 - vendor/bin/phpstan analyse --level 5 exercises/4-phpstan
   * types mismatch (int/string)
 - vendor/bin/phpstan analyse --level 7 exercises/4-phpstan
   * possibly null

# Recommendations

 - PHP Inspections (EA Extended)
 - Add `phpstan` to CI (after fixing the issues!)
