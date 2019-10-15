# phpstan helps find bugs

 - vendor/bin/phpstan analyse --level 0 exercises/4-phpstan
   * duplicate array keys
 - vendor/bin/phpstan analyse --level 2 exercises/4-phpstan
   * extra params found
 - vendor/bin/phpstan analyse --level 5 exercises/4-phpstan
   * types mismatch (int/string)
 - vendor/bin/phpstan analyse --level 7 exercises/4-phpstan
   * possibly null
   
# Psalm also, my preferred tool

 - 

# Recommendations

 - PHP Inspections (EA Extended)
 - Add `phpstan` or Psalm to CI (after fixing the issues!)
 - Baselining (e.g. with Psalm)
