# Background knowledge

 - `HttpClient` is just a placeholder for guzzle or something

# Things to improve

 - Return-early for error conditions
 - `float` for money - BAD! - definitely wrap that up
 - Naming: what is `tid`? - don't abbreviate
 - `setIsPaid` - hidden away inside: ASK don't tell
 - getters / setters: TELL don't ASK
 - Consider inverting call stack; `PaymentDetails` calls `MyFunPaymentGateway`
