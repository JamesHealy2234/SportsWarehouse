"use strict";

$(function(){
    /**
        * Matches Australian phone number format (landline & mobile).

        *  Valid types of phone numbers:
        * -Emergency: 000, 112, 106
        * -"Special" number prefixes (freecall, local rate & premium): 13, 1300, 180, 1800, 190
        * -Area codes (inc. mobiles): 02, 03, 04, 07, 08
        * -Country code prefix: +61 2, +61 (2)
        * -Optional formatting characters: area code parentheses, hyphens & spaces

        * Valid Australian phone numbers:
        * 000 112 106, 13::14::05 131::405 , 1300::123::123, 1300123123, 1800::123::123, 1900123123 , 02::9988::7766, 0299887766, 0403::098::123
        * 0403::098::123, 0403098123, +61403098123, +61::403::098::123, 0::4::0::3::0::9::8::1::2::3, 04::12::34::12::34, +61::490::123::123

        * Invalid Australian phone numbers:
        * 1::111::001::1234::123::12345::131::23::1912341234::1500::123::123::01::9988::7766
        * 0599887766::299887766::432123123::432-123-123::99887766::9988::7766::+61::9988::7766::+64::2::9988::7766

         */

        $.validator.addMethod("phoneAU", function(phone_number, element)
        {
     	       // phone_number = phone_number.replace( /\s+/g, "" );
     	       return this.optional( element ) || phone_number.match( /^((000|112|106)|(((\+61 ?\(?0?[- ]?)|(\(?0[- ]?))[23478]\)?([- ]?[0-9]){8})|((13|18)([- ]?[0-9]){4}|(1300|1800|1900)([- ]?[0-9]){6}))$/ );
        }, "Please specify a valid Austrlian phone number" );

        //get reference to the checkoutForm
    $("#contactFrom").validate({

            rules: {
                firstName:{
                    required:true,
                    minlength: 2
                },
                lastName: {
                    required: true,
                    minlength: 2
                },

                mobile:{
                    required: true,
                    phoneAU: true
                },

                email: {
                    required: true,
                    email: true
                },

                areaComments: {
                    required: true,
                    minlength: 20
                }


            },

        messages: {
            firstName: {
                required: "you must supply a Firstname!",
                minlength: "2 or more characters, Please"
            },
            lastName: {
                required: "you must supply a lastname!",
                minlength: "2 or more characters, Please"
            },


            mobile:{
                required: "you must supply a mobile number",
                phoneAU: "A valid Australian mobile number, please"
            },

            email: {
                required: "you must supply an Email...",
                email: "A Valid Email please"
            },

            areaComments: {
                required: "You need to supply a comment",
                minlength: "at least 20 characters"
            }

        }

    });

});
