## Overview ##
This PHP application demonstrates how to receive inbound messages with Trumpia's API. Trumpia’s inbound API will send an XML string via HTTP `GET` to a URL of your choice. The code sample will retrieve the XML string and parse the tags. Each record is logged into a CSV file with its tag and content of the tag. A secure(HTTPS) callback URL can be supported, but will require Trumpia to configure the servers with your information.

If you wish to have a secure API endpoint please email [apisupport@mytrum.com](mailto:apisupport@mytrum.com) with the following information.
 1. Username
 2. Public Key
 3. Callback URL

The following tags should be expected:
 * Time_stamp
 * Push_id
 * Inbound_id
 * Subscription_uid
 * Phone_number
 * Keyword
 * Data_capture
 * Contents
 * Attachment
 * Dataset_id
 * Dataset_name

## Application Workflow ##
Once the data has been received, a CSV file is created. The Trumpia object allows the user to log any designated tag to the file. For this sample code and purpose the following are logged.
 1. Subscription_uid
 2. Phone_number
 3. Keyword
 4. Contents

XML string example (STOP REQUEST):
>?xml=%3C%3Fxml+version%3D%221.0%22+encoding%3D%22UTF-8%22+%3F%3E%3CTRUMPIA%3E%3CPUSH_ID%3E132278804%3C%2FPUSH_ID%3E%3CINBOUND_ID%3E57676488%3C%2FINBOUND_ID%3E%3CSUBSCRIPTION_UID+%2F%3E%3CPHONENUMBER%3E7141234567%3C%2FPHONENUMBER%3E%3CKEYWORD%3ESTOP+ALL%3C%2FKEYWORD%3E%3CDATA_CAPTURE+%2F%3E%3CCONTENTS+%2F%3E%3CATTACHMENT+%2F%3E%3C%2FTRUMPIA%3E


#### Get more information on [how to receive inbound messages here](http://trumpia.com/api/inbound-push.php). #####
