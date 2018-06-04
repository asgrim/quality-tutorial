# Background knowledge

 - `HttpClient` is just a placeholder for guzzle or something
 - https://williamdurand.fr/2013/06/03/object-calisthenics/
 - PHP context: https://www.youtube.com/watch?v=I0y5jU61pS4

# The Exercises

 - One level of indentation per method
   - Readability
   - Allows better naming!
 - Avoid ELSE
   - Simply cut out else (return early)
   - Be defensive (invalid scenarios are the return early)
 - Wrap primitives / strings
   - Use value objects, basically
 - First class collections
   - No arrays: use an object with types
 - One arrow per line
   - Law of demeter - principle of least knowledge
 - Don't abbreviate
   - Goes back to naming
 - Keep entities small
 - No classes with more than two instance variables
   - Customer > Name, CustomerId
   - Name > First, Last
   - CustomerId > int
   - First > string
   - Last > string
 - No getters/setters
   - Tell, don't ask

# Things to improve

 - Return-early for error conditions
 - `float` for money - BAD! - definitely wrap that up
 - Naming: what is `tid`? - don't abbreviate
 - `setIsPaid` - hidden away inside: ASK don't tell
 - getters / setters: TELL don't ASK
 - Consider inverting call stack; `PaymentDetails` calls `MyFunPaymentGateway`
