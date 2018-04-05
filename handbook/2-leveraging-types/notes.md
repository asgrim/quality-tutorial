# Leveraging types

 - First: list what tests we need to write here
   * PaymentDetails
     - get/setTid - types: array, string, float, \stdClass, null, true/false, int
   * MyFunPaymentGateway
     - Successful payment
     - Failed to pre-auth payment (expect exception)
     - Failed setup transaction call
 - We can ELIMIATE a load of tests on PaymentDeteails
 - Refactor to add param & return types: what benefits do we have?
   - No mixed expectations: return true/false/throw Exception
 - Add an interface
